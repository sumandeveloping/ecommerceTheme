<?php include_once("./includes/header.php"); ?>

<?php
//fetching data from products table
$get_products = mysqli_query($con,"SELECT * FROM `products` ORDER BY date DESC");

?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-primary">Uploaded Products</h1>
  <p class="mb-4">It is showing all products which has been uploaded in database including not approved ones. <!--<a target="_blank" href="https://datatables.net">official DataTables documentation</a>. --></p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Products</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="font-size:12px;">
            <tr>
              <th>Sl No.</th>
              <th>Update</th>
              <th>Approval</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Gender Category</th>
              <th>Product Category</th>
              <th>Main Image</th>
              <th>Sub Image</th>
              <th>Sub Image</th>
              <th>Date</th>
              <th>Keywords</th>
              <th>Stock Status</th>
              <th>Views</th>
            </tr>
          </thead>
          <!-- <tfoot>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </tfoot> -->
          <tbody style="font-size:11px;">
          <?php
            $count=0;
            while($row_products=mysqli_fetch_assoc($get_products)){
              $count++;
              if(strlen($row_products['product_title']) > 44){
                $pro_title = ucfirst(substr($row_products['product_title'],0,45))."...";
              }else {
                $pro_title = ucfirst($row_products['product_title']);
              }
              $date = $row_products['date'];
              //gender category
              $get_gender_cat = mysqli_query($con,"SELECT * FROM `categories_by_gender` WHERE cat_id='$row_products[cat_id]'");
              $r_gender_cat = mysqli_fetch_assoc($get_gender_cat);
              //gender category
              $get_product_cat = mysqli_query($con,"SELECT * FROM `product_categories` WHERE p_cat_id='$row_products[p_cat_id]'");
              $r_product_cat = mysqli_fetch_assoc($get_product_cat);
              //APPROVAL STATUS
              $approval = $row_products['approval'];
              $appr_str = ($approval) ? "<i class='fas fa-check-circle text-success'>" : "<i class='fas fa-question-circle text-danger'>" ;
          ?>
            <tr>
              <td align="center"><?=$count;?></td>
              <td align="center"><a href="edit_product.php?p_id=<?=$row_products['product_id'];?>&action=edit"><i class="fas fa-edit text-primary" style="font-size:13px; cursor:pointer;"></i></a></td>
              <td align="center"><?=$appr_str;?></td>
              <td><?=$pro_title;?></td>
              <td><?=$row_products['product_price'];?></td>
              <td>555</td>
              <td><?=$r_gender_cat['cat_title'];?></td>
              <td><?=$r_product_cat['p_cat_title'];?></td>
              <td align="center"><img src="./img/product_images/thumbnail/pImg_1482899_thumb_18_01.jpg" style="width: 50px;height: auto;"></td>
              <td align="center">img2</td>
              <td align="center">img3</td>
              <td><?=date("d/m/Y", strtotime($date));?></td>
              <td><?=$row_products['product_keywords'];?></td>
              <td><i class='fas fa-check text-success'></i>&nbsp;&nbsp;In Stock</td>
              <td><?=$row_products['views'];?></td>
            </tr>
            <?php } //End while loop of products?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include_once("./includes/footer.php"); ?>