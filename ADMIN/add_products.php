<?php include_once("./includes/header.php"); ?>

<?php
$error = 0;
$err_arr = array();
if(isset($_POST['submit'])){
  //IMAGE 1
  $img1_name = $_FILES['img1']['name'];
  $img1_typ = $_FILES['img1']['type'];
  $img1_ext = pathinfo($img1_name, PATHINFO_EXTENSION);
  $img1_src = $_FILES['img1']['tmp_name'];
  $img1_properties = getimagesize($img1_src);

  // $i=1;
  // echo $img.$i.'_src';die;


  //IMAGE 2
  // $img2_name = $_FILES['img2']['name'];
  // $img2_typ = $_FILES['img2']['type'];
  // $img2_ext = pathinfo($img2_name, PATHINFO_EXTENSION);
  // $img2_src = $_FILES['img2']['tmp_name'];
  // $img2_properties = getimagesize($img2_src);

  //IMAGE 3
  // $img3_name = $_FILES['img3']['name'];
  // $img3_typ = $_FILES['img3']['type'];
  // $img3_ext = pathinfo($img3_name, PATHINFO_EXTENSION);
  // $img3_src = $_FILES['img3']['tmp_name'];
  // $img3_properties = getimagesize($img3_src);

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
  echo "<br>";
  print_r($img1_properties);

  //validation of type & size of three images
  //for($i=1;$i<=3;$i++){
    if(!is_valid_type($img1_typ)){
      $error=1;
      $err_arr[] = "Image1 type is not valid.";
      //exit();
    }
    //size validation(image should be less than 3 mb)
    if($_FILES['img1']['size']>3000000){
      $error=1;
      $err_arr[] = "Image1 size should be less than 3 mb.";
    }
  //}

  


  if(!$error){
    //img loop for image cutting
    //for($i=1;$i<=3;$i++){

      //large img(original img)
      copy($img1_src,"./img/product_images/large/productImg_".time()."_large.".$img1_ext);
      //IMAGE CUTTING
      switch($img1_typ){
      
        case "image/jpeg":
          $newImgSrc = imagecreatefromjpeg($img1_src);
          //front image
          $tmp1 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],255,350);
          //size for shop_category page
          $tmp2 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],295,350);
          //thumbnail size for product page
          $tmp3 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],110,100);
          //product page size for medium img
          $tmp4 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],445,500);

          imagejpeg($tmp1,"./img/product_images/frontFace/productImg_".time()."_main.".$img1_ext);
          imagejpeg($tmp2,"./img/product_images/shop_category_img/productImg_".time()."_shopCat.".$img1_ext);
          imagejpeg($tmp3,"./img/product_images/thumbnail/productImg_".time()."_thumb.".$img1_ext);
          imagejpeg($tmp4,"./img/product_images/medium/productImg_".time()."_medium.".$img1_ext);
          //deleting tmp images from temp folder
          // imagedestroy($img1_src);
          // imagedestroy($tmp1);
          
        break;

        case "image/png":
          $newImgSrc = imagecreatefrompng($img1_src);
          //front image
          $tmp1 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],255,350);
          //size for shop_category page
          $tmp2 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],295,350);
          //thumbnail size for product page
          $tmp3 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],110,100);
          //product page size for medium img
          $tmp4 = imgResizing($newImgSrc,$img1_properties[0],$img1_properties[1],445,500);

          imagepng($tmp1,"./img/product_images/frontFace/productImg_".time()."_main.".$img1_ext);
          imagepng($tmp2,"./img/product_images/shop_category_img/productImg_".time()."_shopCat.".$img1_ext);
          imagepng($tmp3,"./img/product_images/thumbnail/productImg_".time()."_thumb.".$img1_ext);
          imagepng($tmp4,"./img/product_images/medium/productImg_".time()."_medium.".$img1_ext);
          //deleting tmp images from tmp folder
          // imagedestroy($img1_src);
          // echo $tmp1;
          //imagedestroy($tmp1);
          
        break;
      }
    //}

  }

    

}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">INSERT PRODUCT</h1>

  <p style="background: #4e73df; color: #fff;" class="p-2"><span class="font-weight-bold">NOTE :&nbsp;</span>Image dimension should be large(greater than 1000px X 1000px) and size should be within 4 MB.</p>
  <?php
    // if($error==1){
    //   foreach($err_arr as $err){
    //     if($err!=''){
    //       echo "<p style='background: red; color: #fff;' class='p-2'>{$err}</p>";
    //     }
    //   }
      
    // }
  ?>
  

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
          />
          <p class="text-primary">This is main image that will be shown to index page</p>
          <?php
            if(in_array("Image1 size should be less than 3 mb.",$err_arr)){
              echo "<p style='background: red; color: #fff;' class='p-2'>Image1 size should be less than 3 mb.</p>";
            }
            if(in_array("Image1 type is not valid.",$err_arr)){
              echo "<p style='background: red; color: #fff;' class='p-2'>Image1 type is not valid.</p>";
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
          />
          <?php
            if(in_array("Image2 size should be less than 3 mb.",$err_arr)){
              echo "Image2 size should be less than 3 mb.";
            }
            if(in_array("Image2 type is not valid.",$err_arr)){
              echo "Image2 type is not valid.";
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
          />
          <?php
            if(in_array("Image3 size should be less than 3 mb.",$err_arr)){
              echo "Image3 size should be less than 3 mb.";
            }
            if(in_array("Image3 type is not valid.",$err_arr)){
              echo "Image3 type is not valid.";
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
          <label for="sub_category">Choose Product Category</label>
          <select class="form-control" id="sub_category" class="sub_category">
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
            placeholder="Products keywords"
          />
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
      
      
    </div>
  </div>
  <!-- End row -->
</div>
<!-- /.container-fluid -->

<?php include_once("./includes/footer.php"); ?>
        