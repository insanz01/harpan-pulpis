<?php
    var_dump($_FILES);
    if (isset($_FILES["file"])) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $file_tmp = $_FILES['file']['tmp_name'];

        // Cek apakah file sudah ada
        if (file_exists($targetFile)) {
            echo "File already exists.";
            $uploadOk = 0;
        }

        // Batasi jenis file yang diizinkan
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "File was not uploaded.";
        } else {
            if (move_uploaded_file($file_tmp, $targetFile)) {
                echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
            } else {
                echo "There was an error uploading the file.";
            }
        }
    }
    ?>