<?php
/**
 * Created by PhpStorm.
 * User: chirayu kapoor
 * Date: 19-10-2018
 * Time: 01:34
 */

#include('include/config.php');
#include('include/sessioncheck.php');

if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
     if ($_FILES['fileToUpload']['type'] != "application/pdf") {
         echo "<p>File must be uploaded in PDF format.</p>";
     }
     elseif ($_FILES['fileToUpload']['size']>=5242880){
         echo "<p>File must be less than 5MB in size.".$_FILES['fileToUpload']['size']."</p>";
     }
     else {
         while (true) {
             $filename = uniqid("TeamName", true) . '.pdf';
             if (!file_exists(sys_get_temp_dir() . $filename)) break;
         }
         $result = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../upload/pdf/$filename");
         if ($result == 1) {
             echo "<p>File uploaded successfully!!.</p>";
         }
         else echo "<p>Sorry, Error happened while uploading. Please try again </p>";
     }
 }
?>