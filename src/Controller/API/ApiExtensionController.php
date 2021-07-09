<?php

namespace App\Controller\API;

use App\Entity\User;
use App\Entity\Localization;
use App\Entity\Memes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ApiExtensionController extends AbstractController
{
   /**
     * @Route("/api/extension/get_dirs", name="api_extension_dirs", methods={"POST"})
     */
    public function directoriesChilds(Request $request) {
        $clientName = $request->getContent();
        $decodedJson = json_decode($clientName);

        $localizationDb = $this->dbLocalizationClass();
        $localization = $localizationDb->findBy([
            'id_parent' => $decodedJson->id_parent,
            'id_user' => $this->getUser()->getId(), 
        ]);

        $memesDb = $this->dbMemesClass();
        $memes = $memesDb->findBy([
            'id_directory' => $decodedJson->id_parent,
            'id_user' => $this->getUser()->getId(),
        ]);

        foreach ($localization as $key => $pathChilds) {
            $childs[$key] = [
                'id' => $pathChilds->getId(),
                'name' => $pathChilds->getDirectoryName(),
            ];
        }

        foreach ($memes as $key => $memesChilds) {
            $meme[$key] = [
                'name' => $memesChilds->getMemeName(),
                'checksum' => $memesChilds->getMemeChecksum(),
            ];
        }

        $pathsTree = $this->getPathsTree($decodedJson->id_parent);
        
        $code = array(
            'code' => 200,
            'path' => (!empty($childs) ? $childs : ''),
            'meme' => (!empty($meme) ? $meme : ''),
            'paths_tree' => (!empty($pathsTree) ? $pathsTree : ''),
        );

        return new Response(json_encode($code));
    }

    /**
     * @Route("/api/extension/header", name="api_extension_child_dirs", methods={"POST"})
     */
    public function returnHeader() {
        $response = new Response();
        $response->setStatusCode(200);
        return $response;
    }

    /**
     * @Route("/api/extension/addmeme", name="api_extension_addmeme", methods={"POST"})
     */
    public function addMeme(Request $request) {
        $memesDb = $this->dbMemesClass();
        $entityManager = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $data = json_decode($data);

        $content = file_get_contents($data->url);
        $size = intval(strlen($content)/1024);
        $memeChecksum = md5($content);
        $name = $data->name;
        
        $target = $this->getParameter('kernel.project_dir') . '/public/imgs/' . $memeChecksum . '.png';

        if(!file_exists($target)) {
            $fp = fopen($this->getParameter('kernel.project_dir') . "/public/imgs/" . $memeChecksum . ".png", "w");
            $write = fwrite($fp, $content);
            $close = fclose($fp);
            
            if($write && $close)
                $response = array(
                    'code' => 200,
                    'log' => 'added_new' 
                );
        }       

        // does user have this meme already?
        $isUserHaveMeme = $memesDb->findBy([
            'meme_checksum' => $memeChecksum,
            'id_user' => $this->getUser()->getId()
        ]);
        $response = array(
            'code' => 200,
            'log' => 'u_have_meme_already' 
        );

        if(!$isUserHaveMeme) {
            $meme = new Memes();

            $meme->setMemeName($name);
            $meme->setMemeChecksum($memeChecksum);
            $meme->setIdDirectory(null);
            $meme->setIdUser($this->getUser()->getId());
            $meme->setSize($size);
            $entityManager->persist($meme);

            $response = array(
                'code' => 200,
                'log' => 'added_new' 
            );
        }
        $entityManager->flush();
        
        return new Response(json_encode($response));
    }

    /**
     * @Route("/api/search/content", name="api_extension_searchcontent", methods={"POST"})
     */
    public function searchMemes(Request $request) {    
        $data = $request->getContent();
        $data = json_decode($data);
        $memesDb = $this->dbMemesClass();
        $localizationDb = $this->dbLocalizationClass();
        $memeImagesTab = array();
        $directoriesTab = array();

        $memes = $memesDb->createQueryBuilder("m")
                ->where("m.meme_name LIKE :search_string")
                ->andWhere("m.id_user = :user_id")
                ->setParameter("search_string", $data->search_querry."%")
                ->setParameter("user_id", $this->getUser()->getId())
                ->getQuery()
                ->getResult();

        $directories = $localizationDb->createQueryBuilder("d")
                    ->where("d.directory_name LIKE :search_string")
                    ->andWhere("d.id_user = :user_id")
                    ->setParameter("search_string", $data->search_querry."%")
                    ->setParameter("user_id", $this->getUser()->getId())
                    ->getQuery()
                    ->getResult();

        foreach($memes as $meme) {
            array_push($memeImagesTab, array(
                'meme_path' => $meme->getMemeChecksum(),
                'meme_name' => $meme->getMemeName()
            ));
        }     
        
        foreach($directories as $directory) {
            array_push($directoriesTab, array(
                'directory_id' => $directory->getId(),
                'directory_name' => $directory->getDirectoryName(),
                'hidden' => $directory->getHidden(),
            ));
        }

        return new Response(json_encode(array(
            'memes' => $memeImagesTab,
            'directories' => $directoriesTab
        )));
    }


    // connecting do Localization Entity.
    private function dbLocalizationClass() {
        return $this->getDoctrine()->getRepository(Localization::class);
    }

    // connecting do Memes Entity.
    private function dbMemesClass() {
        return $this->getDoctrine()->getRepository(Memes::class);
    }

    public function getPathsTree(int $directory_id = NULL) {
        $localizationDb = $this->dbLocalizationClass();

        if ($directory_id != NULL) {
            $pathOne = $localizationDb->findBy(array(
                'id' => $directory_id,
            ));

            foreach ($pathOne as $key => $data) {
                if ($data->getIdParent() != NULL) {
                    $pathTwo = $localizationDb->findBy(array(
                        'id' => $data->getIdParent(),
                    ));
                } else {
                    $pathTwo = NULL;
                }
            
                $currentPathArray = [
                    'current_path_id' => $data->getId(),
                    'current_path_name' => $data->getDirectoryName(),
                ];   
            }

            if ($pathTwo != NULL) {
                foreach ($pathTwo as $key => $data) {
                    $previousPathArray = [
                        'previous_path_id' => $data->getId(),
                        'previous_path_name' => $data->getDirectoryName(),
                    ];
                }
            } else {
                $previousPathArray = [
                    'main_path' => 'main directory',
                ];
            }

            $mergedPathsArray = array_merge($currentPathArray, $previousPathArray);
            return $mergedPathsArray;
        }
    }

    private function compressImage($sourceUrl, $destinationUrl, $quality) {
        $imageInfo = getimagesize($sourceUrl);

        if ($imageInfo['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($sourceUrl);
        }
        elseif ($imageInfo['mime'] == 'image/gif') {
            $image = imagecreatefromgif($sourceUrl);
        }
        elseif ($imageInfo['mime'] == 'image/png') {
            $image = imagecreatefrompng($sourceUrl);
        }

        $destinationUrl = preg_replace('@\.(png|jpg|gif|bmp)@Usmi', '.png', $destinationUrl);

        imagejpeg($image, $destinationUrl, $quality);
        imagedestroy($image);
    }
}
