<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Localization;
use App\Entity\Memes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DirectoriesController extends AbstractController
{
    /**
     * @Route("/directories/add", name="directories_add")
     */
    public function addDirectory(Request $request) { // Request is needed to get response from js fetch.
        $clientName = $request->getContent();
        $decodedJson = json_decode($clientName);

        if ($decodedJson === NULL) { // redirect if json response is empty.
            return $this->redirectToMain();
        }

        if (isset($decodedJson->add) && $decodedJson->add === true) {
            $localization = new Localization();

            if ($decodedJson->parent_directory == NULL) {
                $localization->setIdUser($this->getUser()->getId());
                $localization->setDirectoryName($decodedJson->directory_name);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($localization);
                $entityManager->flush();

                $return = [
                    'id' => $localization->getId(), // added item id
                    'name' => $decodedJson->directory_name // added item name
                ];

                return new JsonResponse($return);
            } else {
                $localizationDb = $this->dbLocalizationClass();

                $localization->setIdUser($this->getUser()->getId());
                $localization->setIdParent($decodedJson->parent_directory);
                $localization->setDirectoryName($decodedJson->new_directory_name);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($localization);
                $entityManager->flush();

                $return = [
                    'id' => $localization->getId(), // added item id
                    'name' => $decodedJson->new_directory_name // added item name
                ];

                return new JsonResponse($return);
            }
        } else {
            return $this->redirectToMain();
        }
    }

    /**
     * @Route("/meme/add", name="memes_add")
     */
    public function addMeme(Request $request) {

        $memeInfoToFetch = array();
        $memeChecksum = basename(md5_file($_FILES['file']['tmp_name']));
        $imageInfo = getimagesize($_FILES['file']['tmp_name']);
        $imageExtension = image_type_to_extension($imageInfo[2]);

        if ($_POST['id_directory'] == 'null') {
            $_POST['id_directory'] = NULL;
        }
 
        $target = $this->getParameter('kernel.project_dir') . '/public/imgs/' . basename(md5_file($_FILES['file']['tmp_name'])) . $imageExtension;

        if (!file_exists($target) && ($_FILES['file']['type'] == "image/jpeg") || ($_FILES['file']['type'] == "image/png") || ($_FILES['file']['type'] == "image/pjpeg")) {
            $this->compressImage($_FILES['file']['tmp_name'], $target, 60);
        }

        if ($_FILES['file']['error'] == 0) {
            $meme = new Memes();

            $meme->setMemeName($_FILES['file']['name']);
            $meme->setMemeChecksum($memeChecksum);
            $meme->setIdDirectory($_POST['id_directory']);
            $meme->setIdUser($this->getUser()->getId());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($meme);
            $entityManager->flush();
            
            $memeInfoToFetch = [
                'id' => $meme->getId(),
                'name' => $_FILES['file']['name'],
                'url' => $memeChecksum.".jpeg",
            ];

            return new JsonResponse($memeInfoToFetch);
        } else {
            return new JsonResponse("Something went wrong");
        }
    }

    /**
     * @Route("/directories/rename", name="directories_rename")
     */
    public function renameDirOrImg(Request $request) { // function able to rename both directories and memes
        $clientName = $request->getContent();
        $decodedJson = json_decode($clientName);

        if ($decodedJson === NULL) { // redirect if json response is empty.
            return $this->redirectToMain();
        }

        $entityManager = $this->getDoctrine()->getManager();

        if (isset($decodedJson->rename) && $decodedJson->rename === true) { 
            
            if (empty($decodedJson->newDirectoryName)) {
                $error = array(
                    'check' => true,
                    'message' => 'Directory cannot be renamed because the name is empty!'
                );
                return new JsonResponse($error, 500); // if directory name is empty return error and message.
            }
    
            $localizationDb = $this->dbLocalizationClass();
            
            $directory = $localizationDb->findBy([
                'id' => $decodedJson->directoryId,
                'id_user' => $this->getUser()->getId()
            ]);

            foreach ($directory as $dir) {
                $singleDir = $dir;
                $dirId = $dir->getId();
            }
            
            $singleDir->setDirectoryName($decodedJson->newDirectoryName);
            $entityManager->flush();

            $dirNames = [
                'id' => $dirId, 
                'new_name' => $decodedJson->newDirectoryName
            ];

            return new JsonResponse($dirNames); // return renamed directory name
        } elseif (isset($decodedJson->renameImg) && $decodedJson->renameImg === true) { 

            if (empty($decodedJson->newImageName)) {
                $error = array(
                    'check' => true,
                    'message' => 'Image cannot be renamed because the name is empty!'
                );
                return new JsonResponse($error, 500); // if image name is empty return error and message.
            }

            $memeDb = $this->dbMemesClass();
            
            $meme = $memeDb->findBy([
                'id' => $decodedJson->imageId,
                'id_user' => $this->getUser()->getId(),
            ]);

            foreach ($meme as $memeName) {
                $newMemeName = $memeName;
            }

            $imgNames = [
                'id' => $decodedJson->imageId, 
                'new_name' => $decodedJson->newImageName
            ];

            $newMemeName->setMemeName($decodedJson->newImageName);
            $entityManager->flush();

            return new JsonResponse($imgNames); // return renamed meme name
        } else {
            return $this->redirectToMain();
        }
    }

    /**
     * @Route("/delete/meme", name="delete_meme")
     */
    public function deleteMeme(Request $request) {
        $clientName = $request->getContent();
        $decodedJson = json_decode($clientName);

        if ($decodedJson === NULL) { // redirect if json response is empty.
            return $this->redirectToMain();
        }

        if (isset($decodedJson->deleteMeme) && $decodedJson->deleteMeme === true) {
            $entityManager = $this->getDoctrine()->getManager();
            $memeDb = $this->dbMemesClass();

            $deletedMeme = $memeDb->findBy(array(
                'id' => $decodedJson->id_meme,
                'id_user' => $this->getUser()->getId(),
            ));

            foreach ($deletedMeme as $deletedName) {
                $meme = $deletedName;
                $name = $deletedName->getMemeName();
            }

            $entityManager->remove($meme);
            $entityManager->flush();

            return new JsonResponse($name); // return deleted meme name
        } else {
            return $this->redirectToMain();
        }
    }

    /**
     * @Route("/delete/dir", name="delete_dir")
     */
    public function deleteDirectory(Request $request) {
        $clientName = $request->getContent();
        $decodedJson = json_decode($clientName);

        if ($decodedJson === NULL) { // redirect if json response is empty.
            return $this->redirectToMain();
        }

        if (isset($decodedJson->deleteDir) && $decodedJson->deleteDir === true) {

            $localizationDb = $this->dbLocalizationClass();

            $deletedLocalization = $localizationDb->findBy(array(
                'id' => $decodedJson->id_path,
                'id_user' => $this->getUser()->getId(),
            ));

            foreach ($deletedLocalization as $deletedName) {
                $name = $deletedName->getDirectoryName();
            }

            $entityManager = $this->getDoctrine()->getManager();
            
            // calling the stored procedure responsible for deleting directories and memes fromd database.
            $statement = $entityManager
                        ->getConnection()
                        ->prepare('CALL DeleteDirAndMemes('.$decodedJson->id_path.', '.$this->getUser()->getId().')');

            $statement->execute();
            
            return new JsonResponse($name); // return name of deleted directory
        } else {
            return $this->redirectToMain();
        }
    }

    // copress uploaded image to lower quality (60).
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

        $destinationUrl = preg_replace('@\.(png|jpg|gif|bmp)@Usmi', '.jpeg', $destinationUrl);

        imagejpeg($image, $destinationUrl, $quality);
        imagedestroy($image);
    }

    // connect with Localization Entity
    private function dbLocalizationClass() { 
        return $this->getDoctrine()->getRepository(Localization::class);
    }

    // connect with Memes Entity
    private function dbMemesClass() {
        return $this->getDoctrine()->getRepository(Memes::class);
    }

    // redirect to main site function
    private function redirectToMain() {
        return $this->redirectToRoute('main', [], 301);
    }

}
