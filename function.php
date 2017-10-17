<?php


if(!empty($_FILES['fichier'])) {

    $_FILES['fichier']['name'];
    $_FILES['fichier']['tmp_name'];
    $_FILES['fichier']['type'];
    $_FILES['fichier']['size'];
    $_FILES['fichier']['error'];

    $extensions = ['png', 'gif', 'jpg', 'jpeg'];

    $taillemax = 1000000;

    $file_paths = [];
    $file_names = [];
    $file_errors = [];

    // On vérifie qu'un upload est présent
    if (count($_FILES['fichier']['name']) > 0) {

        // On boucle sur chaques upload
        for ($i = 0; $i < count($_FILES['fichier']['name']); $i++) {
            $erreur = false;

            // On récupère le nom du fichier temporaire pour un upload
            $fileTempPath = $_FILES['fichier']['tmp_name'][$i];

            if ($fileTempPath != "") {

                $file_name = $_FILES['fichier']['name'][$i];

                $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                if (!in_array($extension, $extensions)) {
                    $file_errors[] = "Le fichier '$file_name' n'est pas une image!";
                    $erreur = true;
                }

                $taille = filesize($_FILES['fichier']['tmp_name'][$i]);

                if ($taillemax < $taille) {
                    $file_errors[] = "Le fichier '$file_name' doit faire 1 Mo MAX!";
                    $erreur = true;
                }


                $newName = 'image' . uniqid() . '.' . $extension;
                $path = $dossier . $newName;


                if (!$erreur) {
                    // On déplace le fichier dans le repertoire UPLOAD
                    if (move_uploaded_file($fileTempPath, $path)) {
                        $file_paths[] = $path;
                        $file_names[] = $newName;
                    }
                }
            }
        }

    }
}
//var_dump($_POST);
//var_dump($extension);