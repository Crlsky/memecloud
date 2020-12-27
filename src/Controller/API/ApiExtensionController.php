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
        
        $code = array(
            'code' => 200,
            'path' => (!empty($childs) ? $childs : ''),
            'meme' => (!empty($meme) ? $meme : ''),
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
        $memeChecksum = md5($content);
        $name = $data->name;
        
        $target = $this->getParameter('kernel.project_dir') . '/public/imgs/' . $memeChecksum . '.jpeg';

        if(!file_exists($target)) {
            $fp = fopen($this->getParameter('kernel.project_dir') . "/public/imgs/" . $memeChecksum . ".jpeg", "w");
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
            $meme->setDoubled(0);

            $entityManager->persist($meme);

            $response = array(
                'code' => 200,
                'log' => 'added_new' 
            );
        }
        $entityManager->flush();
        
        return new Response(json_encode($response));
    }

    // connecting do Localization Entity.
    private function dbLocalizationClass() {
        return $this->getDoctrine()->getRepository(Localization::class);
    }

    // connecting do Memes Entity.
    private function dbMemesClass() {
        return $this->getDoctrine()->getRepository(Memes::class);
    }   
}
