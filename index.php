<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files to SUPABASE</title>

    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>
    <script type="text/javascript" src="upload-to-supabase.js"></script>
    <link rel="stylesheet"  href="index.css">
</head>
 
<body>
    <?php
    $path_folder="files/";

    if(isset($_POST['Send'])){
        if($_POST['Send']=='Send File'){
            if (!file_exists($path_folder)) {
                mkdir($path_folder);
            }
            $file=$_FILES["file-sent"]["tmp_name"];
            $name=$_FILES["file-sent"]["name"];
            move_uploaded_file($file, $path_folder.$name);

            echo "<script>insertFile('$path_folder', '$name');</script>";
        }

    }

    ?>
 
    <h2>Upload Indirectly</h2>
    <form method="post" enctype="multipart/form-data">
        Load File: <input type="file" name="file-sent"/>
        <input type="submit"  class="send" name="Send" value="Send File">
    </form>
</body>
</html>