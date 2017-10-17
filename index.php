<?php
$dossier = 'upload/';
$scanned_directory = array_diff(scandir($dossier), array('..', '.'));

require "function.php";
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Upload</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>

<div>




    <div class="jumbotron">
        <div class="form-group container">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="exampleInputFile"><h1>UPLOAD</h1></label>
                <input name="fichier[]" multiple="multiple" type="file" id="exampleInputFile"><br/>
                <button type="submit" value="Send" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <?php if (!empty($file_errors)) {
        foreach ($file_errors as $error) {
            ?>
            <div class="error"><?= $error ?></div>
    <?php
        }
    } ?>


    <div class="row">
        <?php if(!empty($file_paths)) {
            for ($i = 0; $i < count($file_paths); $i++) : ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?= $file_paths[$i] ?>" alt="upload" class ="img-responsive">
                        <div class="caption">
                            <h3><?= $file_names[$i] ?></h3>
                            <form role="form" action="delete.php" method="post">
                                <input type="hidden" value="<?= $file_paths[$i] ?>" name="path_name">
                                <button type="submit" value="Delete" class="btn btn-default">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endfor;
        } ?>
    </div>

    <?php if (!empty($scanned_directory)) {?>


    <div class="row">
            <?php foreach ($scanned_directory as $file_name) : ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?= $dossier . $file_name ?>" alt="upload" class ="img-responsive">
                        <div class="caption">
                            <h3><?= $file_name ?></h3>
                            <form role="form" action="delete.php" method="post">
                                <input type="hidden" value="<?= $dossier . $file_name ?>" name="path_name">
                                <button type="submit" value="Delete" class="btn btn-default">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
   <?php }
    ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</>
</html>