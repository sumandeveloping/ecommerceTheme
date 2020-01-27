
<?php include_once("./includes/header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">INSERT PRODUCT</h1>

  <div class="row">
    <div class="col-md-4">
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
      <!-- category -->
      <div class="form-group">
        <label for="category">Choose Category</label>
        <select class="form-control" id="category">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <!-- sub category -->
      <div class="form-group">
        <label for="sub_category">Choose Sub Category</label>
        <select class="form-control" id="sub_category">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <!-- brands -->
      <div class="form-group">
        <label for="brand">Choose Brand</label>
        <select class="form-control" id="brand">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <!-- description -->
      <div class="form-group">
        <textarea class="form-control" name="product_desc" id="" cols="20" rows="5"></textarea>
      </div>
      <!-- keywords -->
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Products keywords"
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

      <!-- submit -->
      <div class="form-group">
        <input
          type="submit"
          class="btn btn-primary btn-lg btn-block text-uppercase"
          value="Add Products"
        />
      </div>
      
      
    </div>
  </div>
  <!-- End row -->
</div>
<!-- /.container-fluid -->

<?php include_once("./includes/footer.php"); ?>
        