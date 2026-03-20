<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>upload result</title>
    </head>
    <body>

    <h1>upload result</h1>

    <?php
    if(isset($_POST['submit'])){
        if(isset($_FILES['profileImage']) && $_FILES['profileImage']['error']===0){

            $fileName=$_FILES['profileImage']['name'];
            $tempName=$_FILES['profileImage']['tmp_name'];
            $fileSize=$_FILES['profileImage']['size'];

            $uploadFolder="uploads/";
            $targetFile=$uploadFolder.basename($fileName);

            $imageFileType=strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowedTypes=["jpg","jpeg","png","gif","webp"];

            if(in_array($imageFileType, $allowedTypes)){

                if(move_uploaded_file($tempName, $targetFile)){
                echo"<p> image uploaded successfully!</p>";
                echo"<p>file name:" .htmlspecialchars($fileName)."</p>";
                echo"<img src='$targetFile' alt='Uploaded Image' width='300'>";
            }else{
                echo"<p>sorry, there is the problem.</p>";
            }
            }else{
                echo"<p> only jpg, jpeg, png, Gif, and WEBP files are allowed.</p>;";
            }
            }else{
                echo"<p> no file uploaded or there is an error.</p>";
            }
            }else{
                echo"<p> please upload an image using form.</p>";
            }
          

    
    ?>
    <br><br>

    <a href="index.php">go back</a>

    </body>
</html>