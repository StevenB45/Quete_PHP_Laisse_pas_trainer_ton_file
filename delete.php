<?php

if (!empty($_POST["path_name"])) {
    if (file_exists($_POST["path_name"])) {
        unlink($_POST["path_name"]);
    }
}

header('Location: index.php');
