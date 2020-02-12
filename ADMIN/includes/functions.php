<?php
session_start();

// Check to see if the type of file uploaded is a valid image type
function is_valid_type($file_typ)
{
    // This is an array that holds all the valid image MIME types
    $valid_types = array("image/jpg", "image/JPG", "image/jpeg", "image/png");
    if (in_array($file_typ, $valid_types))
        return 1;
    return 0;
}

function imgResizing($imgSrc,$imgWidth,$imgHeight,$NewImgWidth){
    $NewImgHeight = (($imgHeight/$imgWidth)*$NewImgWidth);
    $newImage = imagecreatetruecolor($NewImgWidth,$NewImgHeight);
    imagecopyresampled($newImage,$imgSrc,0,0,0,0,$NewImgWidth,$NewImgHeight,$imgWidth,$imgHeight);
    return $newImage;
}

function escape($string){
    global $con;
    return mysqli_real_escape_string($con,trim($string));
}


?>