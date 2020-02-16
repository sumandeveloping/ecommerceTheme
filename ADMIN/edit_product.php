<?php include_once("./includes/header.php"); ?>

<?php
// ob_start();
    if(isset($_GET['p_id'],$_GET['action']) && !empty($_GET['p_id']) && !empty($_GET['action']) && $_GET['action']=='edit'){
        $product_id = $_GET['p_id'];
        if(is_product_valid($product_id)){
            $product_id = escape($_GET['p_id']);
            $getProduct_detail = mysqli_query($con,"select * from products where product_id='$product_id'");
            $r_product = mysqli_fetch_assoc($getProduct_detail);
            $pro_img1 = $r_product['product_img1'];
            $pro_img2 = $r_product['product_img2'];
            $pro_img3 = $r_product['product_img3'];

            //getting random number from database image
            $img_arr1=explode("_",$pro_img1);
            $img_randNo = $img_arr1[1];
          
            $error = 0;
            $err_arr = array();

            if(isset($_POST['submit'])){
                //it will be the product id to put into image name
                $maxID = $product_id; //it will be used in image name
                //random number from previous image
                $rand = $img_randNo;
                
                //fields
                $p_title = escape($_POST['title']);
                $p_price = escape($_POST['price']);
                $p_qty = escape($_POST['quantity']);
                $p_category = escape($_POST['category']); //gender category
                $p_pro_category = escape($_POST['product_category']); //product category
                $p_desc = escape($_POST['product_desc']);
                $p_keywords = ucfirst(escape($_POST['keywords']));
                
              
                //IMAGE 1
                $img1_name = $_FILES['img1']['name'];
                $img1_typ = $_FILES['img1']['type'];
                $img1_ext = pathinfo($img1_name, PATHINFO_EXTENSION);
                $img1_src = $_FILES['img1']['tmp_name'];
                $img1_properties = ($img1_name != "") ? getimagesize($img1_src) : "";
                // $img1_properties = getimagesize($img1_src);
              
                //IMAGE 2
                $img2_name = $_FILES['img2']['name'];
                $img2_typ = $_FILES['img2']['type'];
                $img2_ext = pathinfo($img2_name, PATHINFO_EXTENSION);
                $img2_src = $_FILES['img2']['tmp_name'];
                $img2_properties = ($img2_name != "") ? getimagesize($img2_src) : "";
                //$img2_properties = getimagesize($img2_src);
              
              
                //IMAGE 1
                $img3_name = $_FILES['img3']['name'];
                $img3_typ = $_FILES['img3']['type'];
                $img3_ext = pathinfo($img3_name, PATHINFO_EXTENSION);
                $img3_src = $_FILES['img3']['tmp_name'];
                $img3_properties = ($img3_name != "") ? getimagesize($img3_src) : "";
                //$img3_properties = getimagesize($img3_src);
              
              
                if(!file_exists("./img/product_images/")){
                  mkdir("./img/product_images/");
                }
                if(!file_exists("./img/product_images/large")){
                  mkdir("./img/product_images/large");
                }
                if(!file_exists("./img/product_images/frontFace")){
                  mkdir("./img/product_images/frontFace");
                }
                if(!file_exists("./img/product_images/thumbnail")){
                  mkdir("./img/product_images/thumbnail");
                }
                if(!file_exists("./img/product_images/medium")){
                  mkdir("./img/product_images/medium");
                }
                if(!file_exists("./img/product_images/shop_category_img")){
                  mkdir("./img/product_images/shop_category_img");
                }
              
                echo $_FILES['img1']['type'];
                echo "<br>";
                echo $_FILES['img1']['size'];
                echo "<br>";
                echo $_FILES['img1']['tmp_name'];
                // echo "<br>";
                // print_r($img1_properties);

                //if image is blank('')
                if($img1_name==''){
                    //dont delete old images from folder and also dont delete the image name from database

                }

              
                //validation of type & size of three images
                if($img1_name!=""){
                  if(!is_valid_type($img1_typ)){
                    $error=1;
                    $err_arr[] = "Image1 type is not valid.";
                    //exit();
                  }
                }
                if($img2_name!=""){
                  if (!is_valid_type($img2_typ)){
                    $error=1;
                    $err_arr[] = "Image2 type is not valid.";
                  }
                }
                if($img3_name!=""){
                  if (!is_valid_type($img3_typ)){
                    $error=1;
                    $err_arr[] = "Image3 type is not valid.";
                  }
                }
              
                if($img1_name!=""){
                  if($_FILES['img1']['size']>3000000 ){
                    $error=1;
                    $err_arr[] = "Image1 size should be less than 3 mb.";
                  }
                }
                if($img2_name!=""){
                  if($_FILES['img2']['size']>3000000 ){
                    $error=1;
                    $err_arr[] = "Image2 size should be less than 3 mb.";
                  }
                }
                if($img3_name!=""){
                  if($_FILES['img3']['size']>3000000 ){
                    $error=1;
                    $err_arr[] = "Image3 size should be less than 3 mb.";
                  }
                }
                
                
                
              
                //UPLOAD IMAGE
                if(!$error){
                  //storing image name into database
                  $img1_db_name=$img2_db_name=$img3_db_name="";
                  //IMAGE 1
                  if($img1_name != ""){

                    //delete the privous image1 from folder


                    //large img(original img1) ==> moving original image to folder
                    copy($img1_src,"./img/product_images/large/pImg_".$rand."_large_".$maxID."_01".".".$img1_ext);
                    $img1_db_name = "pImg_".$rand."_main_".$maxID."_01".".".$img1_ext;

                    //IMAGE CUTTING
                    switch($img1_typ){
                    
                      case "image/jpeg":
                        $newImgSrc = imagecreatefromjpeg($img1_src);
                        //front image
                        $tmp1 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],255);
                        //size for shop_category page
                        $tmp2 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],295);
                        //thumbnail size for product page
                        $tmp3 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],110);
                        //product page size for medium img
                        $tmp4 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],400);
            
                        imagejpeg($tmp1,"./img/product_images/frontFace/pImg_".$rand."_main_".$maxID."_01".".".$img1_ext);
                        imagejpeg($tmp2,"./img/product_images/shop_category_img/pImg_".$rand."_shopCat_".$maxID."_01".".".$img1_ext);
                        imagejpeg($tmp3,"./img/product_images/thumbnail/pImg_".$rand."_thumb_".$maxID."_01".".".$img1_ext);
                        imagejpeg($tmp4,"./img/product_images/medium/pImg_".$rand."_medium_".$maxID."_01".".".$img1_ext);
                        //deleting tmp images from temp folder
                        // imagedestroy($img1_src);
                        // imagedestroy($tmp1);
                        
                      break;
            
                      case "image/png":
                        $newImgSrc = imagecreatefrompng($img1_src);
                        //front image
                        $tmp1 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],255);
                        //size for shop_category page
                        $tmp2 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],295);
                        //thumbnail size for product page
                        $tmp3 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],110);
                        //product page size for medium img
                        $tmp4 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],400);
            
                        imagepng($tmp1,"./img/product_images/frontFace/pImg_".$rand."_main_".$maxID."_01".".".$img1_ext);
                        imagepng($tmp2,"./img/product_images/shop_category_img/pImg_".$rand."_shopCat_".$maxID."_01".".".$img1_ext);
                        imagepng($tmp3,"./img/product_images/thumbnail/pImg_".$rand."_thumb_".$maxID."_01".".".$img1_ext);
                        imagepng($tmp4,"./img/product_images/medium/pImg_".$rand."_medium_".$maxID."_01".".".$img1_ext);
                        //deleting tmp images from tmp folder
                        // imagedestroy($img1_src);
                        // echo $tmp1;
                        //imagedestroy($tmp1);
                        
                      break;
                    } //end switch case for image 1
            
                  }
            
                  //IMAGE 2
                  if($img2_name != ""){
                    //large img(original img2)  ==> moving original image to folder
                    copy($img2_src,"./img/product_images/large/pImg_".$rand."_large_".$maxID."_02".".".$img1_ext);
                    $img2_db_name = "pImg_".$rand."_main_".$maxID."_02".".".$img1_ext;
                    //IMAGE CUTTING
                    switch($img2_typ){
                    
                      case "image/jpeg":
                        $newImgSrc = imagecreatefromjpeg($img2_src);
                        //front image
                        $tmp1 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],255);
                        //size for shop_category page
                        $tmp2 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],295);
                        //thumbnail size for product page
                        $tmp3 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],110);
                        //product page size for medium img
                        $tmp4 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],400);
            
                        imagejpeg($tmp1,"./img/product_images/frontFace/pImg_".$rand."_main_".$maxID."_02".".".$img1_ext);
                        imagejpeg($tmp2,"./img/product_images/shop_category_img/pImg_".$rand."_shopCat_".$maxID."_02".".".$img1_ext);
                        imagejpeg($tmp3,"./img/product_images/thumbnail/pImg_".$rand."_thumb_".$maxID."_02".".".$img1_ext);
                        imagejpeg($tmp4,"./img/product_images/medium/pImg_".$rand."_medium_".$maxID."_02".".".$img1_ext);
                        //deleting tmp images from temp folder
                        // imagedestroy($img1_src);
                        // imagedestroy($tmp1);
                        
                      break;
            
                      case "image/png":
                        $newImgSrc = imagecreatefrompng($img2_src);
                        //front image
                        $tmp1 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],255);
                        //size for shop_category page
                        $tmp2 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],295);
                        //thumbnail size for product page
                        $tmp3 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],110);
                        //product page size for medium img
                        $tmp4 = imgResizing($newImgSrc,$img2_properties[0],$img2_properties[1],400);
            
                        imagepng($tmp1,"./img/product_images/frontFace/pImg_".$rand."_main_".$maxID."_02".".".$img1_ext);
                        imagepng($tmp2,"./img/product_images/shop_category_img/pImg_".$rand."_shopCat_".$maxID."_02".".".$img1_ext);
                        imagepng($tmp3,"./img/product_images/thumbnail/pImg_".$rand."_thumb_".$maxID."_02".".".$img1_ext);
                        imagepng($tmp4,"./img/product_images/medium/pImg_".$rand."_medium_".$maxID."_02".".".$img1_ext);
                        //deleting tmp images from tmp folder
                        // imagedestroy($img1_src);
                        // echo $tmp1;
                        //imagedestroy($tmp1);
                        
                      break;
                    }
                  }
            
                  //IMAGE 3
                  if($img3_name != ""){
                    //large img(original img3)  ==> moving original image to folder
                    copy($img3_src,"./img/product_images/large/pImg_".$rand."_large_".$maxID."_03".".".$img1_ext);
                    $img3_db_name = "pImg_".$rand."_main_".$maxID."_03".".".$img1_ext;
                    //IMAGE CUTTING
                    switch($img3_typ){
                    
                      case "image/jpeg":
                        $newImgSrc = imagecreatefromjpeg($img3_src);
                        //front image
                        $tmp1 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],255);
                        //size for shop_category page
                        $tmp2 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],295);
                        //thumbnail size for product page
                        $tmp3 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],110);
                        //product page size for medium img
                        $tmp4 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],400);
            
                        imagejpeg($tmp1,"./img/product_images/frontFace/pImg_".$rand."_main_".$maxID."_03".".".$img1_ext);
                        imagejpeg($tmp2,"./img/product_images/shop_category_img/pImg_".$rand."_shopCat_".$maxID."_03".".".$img1_ext);
                        imagejpeg($tmp3,"./img/product_images/thumbnail/pImg_".$rand."_thumb_".$maxID."_03".".".$img1_ext);
                        imagejpeg($tmp4,"./img/product_images/medium/pImg_".$rand."_medium_".$maxID."_03".".".$img1_ext);
                        //deleting tmp images from temp folder
                        // imagedestroy($img1_src);
                        // imagedestroy($tmp1);
                        
                      break;
            
                      case "image/png":
                        $newImgSrc = imagecreatefrompng($img3_src);
                        //front image
                        $tmp1 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],255);
                        //size for shop_category page
                        $tmp2 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],295);
                        //thumbnail size for product page
                        $tmp3 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],110);
                        //product page size for medium img
                        $tmp4 = imgResizing($newImgSrc,$img3_properties[0],$img3_properties[1],400);
            
                        imagepng($tmp1,"./img/product_images/frontFace/pImg_".$rand."_main_".$maxID."_03".".".$img1_ext);
                        imagepng($tmp2,"./img/product_images/shop_category_img/pImg_".$rand."_shopCat_".$maxID."_03".".".$img1_ext);
                        imagepng($tmp3,"./img/product_images/thumbnail/pImg_".$rand."_thumb_".$maxID."_03".".".$img1_ext);
                        imagepng($tmp4,"./img/product_images/medium/pImg_".$rand."_medium_".$maxID."_03".".".$img1_ext);
                        //deleting tmp images from tmp folder
                        // imagedestroy($img1_src);
                        // echo $tmp1;
                        //imagedestroy($tmp1);
                        
                      break;
                    }
                  }
                  
              
                } // end not error  
              
              
              
              
              
              } //if isset post submit
              
?>
        <!--  -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-primary">Edit Product</h1>
            <p class="mb-4">Edit Product as u wish... <!--<a target="_blank" href="https://datatables.net">official DataTables documentation</a>. --></p>

            <!-- success msg -->
            <div class="card mt-4">
              <div class="card-header" style="background: #d7fdc8;color:#3c3939;">
                <p class="m-0">Product has been added successfully</p>
              </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="add_products.php" method="post" enctype="multipart/form-data">
                                <!-- title -->
                                <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    placeholder="Product title"
                                    value="<?=$r_product['product_title'];?>"
                                />
                                </div>
                                <!-- price -->
                                <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="price"
                                    placeholder="Product Price"
                                    onkeydown="validate_is_number(event);"
                                    value="<?=$r_product['product_price'];?>"
                                />
                                </div>
                                <!-- image 1 -->
                                <div class="form-group">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="img1"
                                    placeholder="Product Image 1"
                                    accept="image/*"
                                    onchange="show_image1(event,'showImg1')"
                                />
                                <p class="text-primary mb-1">*This is main image that will be shown to index page</p>
                                <?php
                                    if(in_array("Image1 size should be less than 3 mb.",$err_arr)){
                                    echo "<p style='color: #d30e0e;' class='p-2'>**Image1 size should be less than 3 mb.</p>";
                                    }
                                    if(in_array("Image1 type is not valid.",$err_arr)){
                                    echo "<p style='color: #d30e0e;' class='p-2'>**Image1 type is not valid.</p>";
                                    }
                                ?>
                                </div>
                                <!-- image 2 -->
                                <div class="form-group">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="img2"
                                    placeholder="Product Image 2"
                                    accept="image/*"
                                    onchange="show_image1(event,'showImg2')"
                                />
                                <?php
                                    if(in_array("Image2 size should be less than 3 mb.",$err_arr)){
                                    echo "<p style='color: #d30e0e;' class='mt-2'>**Image2 size should be less than 3 mb.</p>";
                                    }
                                    if(in_array("Image2 type is not valid.",$err_arr)){
                                    echo "<p style='color: #d30e0e;' class='mt-2'>**Image2 type is not valid.</p>";
                                    }
                                ?>

                                </div>
                                <!-- image 3 -->
                                <div class="form-group">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="img3"
                                    placeholder="Product Image 3"
                                    accept="image/*"
                                    onchange="show_image1(event,'showImg3')"
                                />
                                <?php
                                    if(in_array("Image3 size should be less than 3 mb.",$err_arr)){
                                    echo "<p style='color: #d30e0e;' class='mt-2'>**Image3 size should be less than 3 mb.</p>";
                                    }
                                    if(in_array("Image3 type is not valid.",$err_arr)){
                                    echo "<p style='color: #d30e0e;' class='mt-2'>**Image3 type is not valid.</p>";
                                    }
                                ?>
                                </div>
                                <!-- Quantity -->
                                <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="quantity"
                                    placeholder="Products Quantity"
                                    onkeydown="validate_is_number(event);"
                                />
                                </div>

                                <!-- choose gender category -->     
                                <div class="form-group">
                                <label for="category">Choose Gender Category</label>
                                <select class="form-control" id="category" name="category">
                                    <?php
                                    $get_gender_cats = mysqli_query($con,"select * from `categories_by_gender`");
                                // echo "select * from `categories_by_gender`";die;
                                    while($gender_cats = mysqli_fetch_assoc($get_gender_cats)){
                                        if($gender_cats['cat_id'] == $r_product['cat_id']){
                                    ?> 
                                    <option value="<?=$gender_cats['cat_id'];?>" selected><?=$gender_cats['cat_title'];?></option>
                                    
                                    <?php
                                        }else {
                                    ?>
                                    <option value="<?=$gender_cats['cat_id'];?>"><?=$gender_cats['cat_title'];?></option>
                                    <?php
                                         } }
                                    ?>
                                </select>
                                </div>
                                <!-- product category -->
                                <div class="form-group">
                                <label for="product_category">Choose Product Category</label>
                                <select class="form-control" id="product_category" name="product_category">
                                <?php
                                    $get_product_cats = mysqli_query($con,"select * from `product_categories`");
                                // echo "select * from `categories_by_gender`";die;
                                    while($pro_cats = mysqli_fetch_assoc($get_product_cats)){
                                        if($pro_cats['p_cat_id']==$r_product['p_cat_id']){
                                    ?> 
                                    <option value="<?=$pro_cats['p_cat_id'];?>" selected><?=$pro_cats['p_cat_title'];?></option>
                                    <?php
                                        }else {
                                    ?>
                                    <option value="<?=$pro_cats['p_cat_id'];?>"><?=$pro_cats['p_cat_title'];?></option>
                                    <?php
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>
                                <!-- brands -->
                                <!-- <div class="form-group">
                                <label for="brand">Choose Brand</label>
                                <select class="form-control" id="brand">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                </div> -->
                                <!-- description -->
                                <div class="form-group">
                                <textarea class="form-control" placeholder="Product Description" name="product_desc" id="" cols="20" rows="5">
                                    <?=$r_product['product_desc'];?>
                                </textarea>
                                </div>
                                <!-- keywords -->
                                <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="keywords"
                                    onkeyup="multiple_keywords(event,this);"
                                    placeholder="Products keywords"
                                    value="<?=$r_product['product_keywords'];?>"
                                />
                                <p class="text-primary">*Keywords are really important for your product.</p>
                                </div>
                                
                                <!-- submit -->
                                <div class="form-group">
                                <input
                                    type="submit"
                                    name="submit"
                                    class="btn btn-primary btn-lg btn-block text-uppercase"
                                    value="Add Products"
                                />
                                </div>
                            </form>
                            <!-- End form -->
                        
                        
                        </div><!-- end col-md-4 -->
                        <div class="col-md-6">
                          <img src="./img/product_images/frontFace/<?=$pro_img1?>" alt="Main-Image" title="Main Image" class="d-block visible mb-3 w-30 h-auto" id="showImg1">
                          <img src="./img/product_images/frontFace/<?=$pro_img2?>" alt="Main-Image" title="Main Image" class="d-block visible mb-3 w-30 h-auto" id="showImg2">
                          <img src="./img/product_images/frontFace/<?=$pro_img3?>" alt="Main-Image" title="Main Image" class="d-block visible mb-3 w-30 h-auto" id="showImg3">
                        </div>
                    </div><!-- End row -->
                </div><!-- End card-body -->
            </div><!-- End card -->
        </div>
        <!-- /.container-fluid -->


 <?php     
        }else {
?>
            <!-- //echo "<h4 class='text-danger ml-5 mt-5 mb-5 font-weight-bold display-4'>Oops! No Product found</h4>"; -->
            <!-- 404 Error Text -->
         <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-danger mb-5">Oops! Product Not Found</p>
            <p class="text-gray-500 mb-0">Sorry for the inconvenient...</p>
            <a href="show_products.php">&larr; Back to where you came from</a>
          </div>
<?php
        }

    }else {   
?>
        <!-- header("Location: index.php"); -->
         <!-- 404 Error Text -->
         <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">Sorry for the inconvenient...</p>
            <a href="show_products.php">&larr; Back to where you came from</a>
          </div>
<?php 
    }
?>



<?php include_once("./includes/footer.php"); ?>