<!DOCTYPE html>
<html lang="cs">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="UTF-8">
      <title>example</title>
      <link href="css/main.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
      <script src="js/typewrite.js"></script>
   </head>
   <body>
      <div class="cont">
      <br>
      <br>
      <p>exampletitle</p>
      <p class="secondary"><span class="typewrite" data-period="2000" data-type='["Example1", "Example2", "Example3"]'></span> Uploader</p>
      <p></p>
      <br />
      </p>
      <?php
         $i = 0;
         $dir = 'uploads/';
         if ($handle = opendir($dir)) {
             while (($file = readdir($handle)) !== false){
                 if (!in_array($file, array('.', '..')) && !is_dir($dir.$file))
                     $i++;
             }
         }
         echo "$i files uploaded";
         ?>
      <p></p>
      <br />
      <form enctype="multipart/form-data" action="index.php" method="POST">
         <input type="file" name="uploaded_file" id="file" /><br />
         <br />
         <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
      </form>
   </body>
</html>
<br />
<br />
<br />
<?php
   if(!empty($_FILES['uploaded_file']))
   {
     $file = "uploads/";
     $file = $file . basename( $_FILES['uploaded_file']['name']);
   
     if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file)) {
       echo "http://example.eu/$file";
       echo "<a href='http://example.eu/".$file."'> - open</a>";
   
     } else{
         echo "Error.";
     }
   }
   ?>