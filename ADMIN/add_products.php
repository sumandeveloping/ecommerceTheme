
<?php include_once("./includes/header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">INSERT PRODUCT</h1>

  <div class="row">
    <div class="col-md-4">
      <form action="add_products.php" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="Product title"
          />
        </div>
        <!-- price -->
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="Product Price"
          />
        </div>
        <!-- image 1 -->
        <div class="form-group">
          <input
            type="file"
            class="form-control-file"
            placeholder="Product Image 1"
          />
          <p class="text-danger">This is main image that will be shown to index page</p>
        </div>
        <!-- image 2 -->
        <div class="form-group">
          <input
            type="file"
            class="form-control-file"
            placeholder="Product Image 2"
          />
        </div>
        <!-- image 3 -->
        <div class="form-group">
          <input
            type="file"
            class="form-control-file"
            placeholder="Product Image 3"
          />
        </div>
        <!-- Quantity -->
        <div class="form-group">
          <input
            type="number"
            class="form-control"
            placeholder="Products Quantity"
          />
        </div>

        <!-- choose gender category -->     
        <div class="form-group">
          <label for="category">Choose Gender Category</label>
          <select class="form-control" id="category">
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
          <select class="form-control" id="sub_category">
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
            placeholder="Products keywords"
          />
        </div>
        
        <!-- submit -->
        <div class="form-group">
          <input
            type="submit"
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
        