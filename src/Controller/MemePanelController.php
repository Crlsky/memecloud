<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Localization;
use App\Entity\Memes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MemePanelController extends AbstractController
{
    /**
     * @Route("/meme", name="meme_panel")
     */
    public function index() {
        $this->access();

        $paths = $this->getPaths();
        $checksum = $this->getMemeChecksum();

        return $this->render('meme_panel/index.html.twig', [
            'memes' => $checksum,
            'paths' => $paths,
            'pageName' => 'Meme',
            'brand' => 'MemeCloud',
            'pathTreeName' => 'Main directory'
        ]);
    }

    /**
     * @Route("/meme/{slug}", name="directory")
     */
    public function showDirectories(string $slug, Request $request) {
        $this->access();

        $parentId = $this->getDirectoryParent($slug);
        $checksum = $this->getMemeChecksum($parentId);
        $paths = $this->getPaths($parentId);
        $goBackPath = $this->goBack($slug);
        $pageName = $this->getDirectoryPageName($slug);
        $pathsTree = $this->getPathsTree();

        if (is_array($goBackPath)) {
            foreach ($goBackPath as $path) {
                $goBackPath = $path;
            }
            $mainPath = NULL;
        } else {
            $mainPath = 'main';
        }

        return $this->render('meme_panel/index.html.twig', [
            'memes' => $checksum,
            'mainPath' => $mainPath,
            'goBackPath' => $goBackPath,
            'paths' => $paths,
            'pageName' => $pageName,
            'pathsTree' => $pathsTree,
            'brand' => 'MemeCloud',
        ]);
    }
    
    // get all directories placed in current directory and paths to them.
    private function getPaths(array $slug = NULL) {      
        $localizationDb = $this->dbLocalizationClass();
        
        $checkUser = $localizationDb->findBy(array(
            'id' => $slug,
        ));

        foreach ($checkUser as $access) {
           if ($access->getIdUser() != $this->getUser()->getId()) {
                throw new NotFoundHttpException('Sorry not existing!');
           }
        }
    
        if ($this->getUrl() == '/meme') {
    
            $localization = $localizationDb->findBy(array(
                'id_parent' => $slug,
                'id_user' => $this->getUser()->getId()
            ));

            foreach ($localization as $key => $data) {
                $pathId[$key] = $data->getId();
                $paths[$key] = $data->getDirectoryName();
            }
        } else {        
            $localization = $localizationDb->findBy(array(
                'id_parent' => $slug,
                'id_user' => $this->getUser()->getId()
            ));
            foreach ($localization as $key => $data) {
                $pathId[$key] = $data->getId();
                $paths[$key] = $data->getDirectoryName();
            }            
        }
        if (empty($paths)) {
            $mappedArray = NULL;
        } else {
            $mappedArray = array_map(null, $pathId, $paths);
        }

        return $mappedArray;
    }

    // get all memes placed in current directory
    private function getMemeChecksum(array $slug = NULL) {
        if ($this->getUrl() == '/meme') {
            $memesDb = $this->dbMemesClass();

            $memes = $memesDb->findBy(array(
                'id_directory' => $slug,
                'id_user' => $this->getUser()->getId()
            ));

        } else {        
            $memesDb = $this->dbMemesClass();

            $memes = $memesDb->findBy(array(
                'id_directory' => $slug,
                'id_user' => $this->getUser()->getId()
            ));
        }

        if (empty($memes)) {
            $mappedArray = NULL;
        } else {
            foreach ($memes as $key => $data) {
                $memeId[$key] = $data->getId();
                $meme[$key] = $data->getMemeChecksum().".jpeg";
                $memeName[$key] = $data->getMemeName();
            }
            $mappedArray = array_map(null, $memeId, $meme, $memeName);
        }  
        return $mappedArray;
    }

    // get directory parent id.
    private function getDirectoryParent(string $slug){
        $localizationDb = $this->dbLocalizationClass();
            
        $directoryId = $localizationDb->findBy([
            'id' => $slug
        ]);

        foreach ($directoryId as $key => $data) {
            $id[$key] = $data->getId();
        }
        return $id;
    }

    // get path to directory parent. // do usunięcia
    private function goBack(string $slug) {
        $localizationDb = $this->dbLocalizationClass();

        $directoryId = $localizationDb->findBy(
            ['id' => $slug]
        );

        foreach ($directoryId as $key => $data) {
            if ($data->getIdParent() != NULL) {
                $id[$key] = $data->getIdParent();
            } else {
                $id = NULL;
            }   
        }

        if ($id == NULL) {
            return "/meme";
        } else {
            $parentDirectoryName = $localizationDb->findBy([
                'id' => $id
            ]);

            foreach ($parentDirectoryName as $key => $data) {
                $directoryId[$key] = [
                    'id' => $data->getId(),
                    'name' => $data->getDirectoryName(),
                ];
            }
            return $directoryId;
        }
    }

    // get directory name to set page title
    private function getDirectoryPageName(string $slug) {
        $localizationDb = $this->dbLocalizationClass();

        $directoryPageName = $localizationDb->findBy(array(
            'id' => $slug,
            'id_user' => $this->getUser()->getId(),
        ));

        foreach ($directoryPageName as $name) {
            $pageName = $name->getDirectoryName();
        }

        return $pageName;
    }

    // get current directory path tree.
    private function getPathsTree() {
        $localizationDb = $this->dbLocalizationClass();

        if (is_numeric($this->getUrl())) {
            $pathOne = $localizationDb->findBy(array(
                'id' => $this->getUrl(),
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

    // get current url and if its not /meme trim /meme/ from url.
    private function getUrl() {
        if ($_SERVER['REQUEST_URI'] == '/meme') {
            return $_SERVER['REQUEST_URI'];
        } else {
            preg_match('@\/meme\/([^<>]+$)@Usmi', $_SERVER['REQUEST_URI'], $directoryName);
            return $directoryName[1];
        }
    }
    
    // connecting do Localization Entity.
    private function dbLocalizationClass() {
        return $this->getDoctrine()->getRepository(Localization::class);
    }

    // connecting do Memes Entity.
    private function dbMemesClass() {
        return $this->getDoctrine()->getRepository(Memes::class);
    }

    // access if user is logged in.
    private function access() {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    }
}
