<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Kolkata");

$shell = shell_exec('ipconfig/all');
$shell_arr = explode(':',$shell);
$macinfo = explode(" ",$shell_arr[9]);
$macAddress = $macinfo[1]; //storing mac address
// print_r($macAddress);

// query confirmation
function confirm_query($result){
    global $con;
    if(!$result) {
        die("QUERY FAILED :".mysqli_error($con));
    }
}

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

function is_product_valid($pId){
    global $con;

    $chk_product = mysqli_query($con,"select product_id from products where product_id='$pId'");
    $num = mysqli_num_rows($chk_product);
    return $num;

}

function get_ImageSize_path($dbImgName,$size,$pId,$imgNo){
    $img_main_arr = explode(".",$dbImgName);
    $ext = $img_main_arr[1];

    $imgName_arr = explode("_",$img_main_arr[0]);
    $imgName =  "".$imgName_arr[0]."_".$imgName_arr[1]."_".$size."_".$pId."_".$imgNo.".".$ext."";

    //electing the folder
    // $folder = ($size == 'thumb') ? 'thumbnail';
    // $folder = ($size == 'main') ? 'frontFace';
    // $folder = ($size == 'medium') ? 'medium';
    // $folder = ($size == 'shopCat') ? 'shop_category_img';
    $folder = '';

    if($size == 'thumb') 
        $folder = 'thumbnail';
    if($size == 'main')
        $folder = 'frontFace';
    if($size == 'medium')
        $folder = 'medium';
    if($size == 'shopCat')
        $folder = 'shop_category_img';
    
    //imgPath
    $imgPath = "./img/product_images/".$folder."/".$imgName;

    return $imgPath;
}

?>