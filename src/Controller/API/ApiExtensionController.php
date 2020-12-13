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
        $data = $request->getContent();
        $data = json_decode($data);

        $content = file_get_contents($data->url);
        
        $memeChecksum = md5($content);
        
        $target = $this->getParameter('kernel.project_dir') . '/public/imgs/CRLS.' . $memeChecksum;

        if(!file_exists($target . "jpeg") && !file_exists($target . "png") && !file_exists($target . "jpg")){
            $fp = fopen($this->getParameter('kernel.project_dir') . "/public/imgs/CRLS_" . $memeChecksum . ".jpeg", "w");
            $write = fwrite($fp, $content);
            $close = fclose($fp);

            if($write && $close){
                $code = 200;
                $log = 'added';
            }else{
                $code = 666;
                $log = 'nie zapisało';
            }
        }else {
            $code = 420;
            $log = 'jest juz taki mem';
        }

        $response = array(
            'code' => $code,
            'log' => $log 
        );
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
