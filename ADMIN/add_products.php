<?php include_once("./includes/header.php"); ?>

<?php
$error = 0;
$err_arr = array();
if(isset($_POST['submit'])){
  $get_maxID = mysqli_query($con,"select max(product_id) as id from products");
  $r_getmaxID = mysqli_fetch_assoc($get_maxID);
  $maxID = $r_getmaxID['id']+1;
  //random number
  $rand = rand(1000,9999999);
  //echo $maxID;die;
  // echo mysqli_insert_id($con);die;
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

  // $i=1;
  // echo $img.$i.'_src';die;


  // $large_path = "./img/product_images/large/productImg_".time()."_large.".$img1_ext;
  // $mainImg_path = "./img/product_images/frontFace/productImg_".time()."_main.".$img1_ext;
  // $thumbImg_path = "./img/product_images/thumbnail/productImg_".time()."_thumb.".$img1_ext;

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
  
  //size validation(image should be less than 3 mb)
  // if($_FILES['img1']['size']>3000000 || $_FILES['img2']['size']>3000000 || $_FILES['img3']['size']>3000000){
  //   $error=1;
  //   $err_arr[] = "Image1 size should be less than 3 mb.";
  // }
  

  //UPLOAD IMAGE
  if(!$error){
      //IMAGE 1
      if($img1_name != ""){
        //large img(original img1)
        copy($img1_src,"./img/product_images/large/pImg_".$rand."_large_".$maxID."_01".".".$img1_ext);
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
        //large img(original img2)
        copy($img2_src,"./img/product_images/large/pImg_".$rand."_large_".$maxID."_02".".".$img1_ext);
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
        //large img(original img3)
        copy($img3_src,"./img/product_images/large/pImg_".$rand."_large_".$maxID."_03".".".$img1_ext);
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
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">INSERT PRODUCT</h1>

  <p style="background: #4e73df; color: #fff;" class="p-2"><span class="font-weight-bold">NOTE :&nbsp;</span>Image dimension should be large(greater than 1000px X 1000px) and size should be within 3 MB.</p>
  <?php
    // if($error==1){
    //   foreach($err_arr as $err){
    //     if($err!=''){
    //       echo "<p style='background: red; color: #fff;' class='p-2'>{$err}</p>";
    //     }
    //   }
      
    // }
  ?>
  
  <div class="card">
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
              />
            </div>
            <!-- image 1 -->
            <div class="form-group">
              <input
                type="file"
                class="form-control-file"
                name="img1"
                placeholder="Product Image 1"
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
                ?> 
                <option value="<?=$gender_cats['cat_id'];?>"><?=$gender_cats['cat_title'];?></option>
                
                <?php } ?>
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
                ?> 
                <option value="<?=$pro_cats['p_cat_id'];?>"><?=$pro_cats['p_cat_title'];?></option>
                <?php } ?>
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
              <textarea class="form-control" placeholder="Product Description" name="product_desc" id="" cols="20" rows="5"></textarea>
            </div>
            <!-- keywords -->
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                name="keywords"
                onkeyup="multiple_keywords(event,this);"
                placeholder="Products keywords"
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
          
          
        </div><!-- End col-md-4 -->
        <div class="col-md-6">
          <img alt="Main-Image" title="Main Image" class="d-block invisible mb-3 w-30 h-auto" id="showImg1">
          <img alt="Main-Image" title="Main Image" class="d-block invisible mb-3 w-30 h-auto" id="showImg2">
          <img alt="Main-Image" title="Main Image" class="d-block invisible mb-3 w-30 h-auto" id="showImg3">
        </div>
      </div><!-- End row -->

    </div><!-- End card body -->
  </div><!-- End card -->
  
  <!-- End row -->
</div>
<!-- /.container-fluid -->

<?php include_once("./includes/footer.php"); ?>
        