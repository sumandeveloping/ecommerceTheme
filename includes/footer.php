<!-- footer SECTION starts -->
<section class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="container">
              <div class="about_store d-md-flex flex-md-column">
                <h2>About us</h2>
                <p>We Provide best clothes for you.Whatever you need we are here.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="container">
              <div class="customer_care d-md-flex flex-md-column">
                <h2>Customer care</h2>
                <ul>
                  <li><a href="#">Returns/Exchange</a></li>
                  <li><a href="#">Gift Voucher</a></li>
                  <li><a href="#">Promo code</a></li>
                  <li><a href="#">Wishlist</a></li>
                  <li><a href="#">Customer Services</a></li>
                  <li><a href="#">Map Location</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="container">
              <div class="info d-md-flex flex-md-column pt-sm-5 pt-md-5 pt-lg-0">
                <h2>Information</h2>
                <ul>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Delivery Information</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Order Tracking</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="container">
              <div class="contact_info d-md-flex flex-md-column pt-sm-5 pt-md-5 pt-lg-0">
                <h2>Contact Information</h2>
                <p>176/1 M.M. Ghosh Road, Dum Dum, <br>Kolkata - 700074, India</p>
                <span>+91 8013219213</span>
                <span>sumandats@gmail.com</span>
                <span>sumandevtipscom</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- footer SECTION Ends -->

    <!-- All javascripts files -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
      $(function(){
        $(".filterAll--label").click(()=> {
          if($(".filterAll--input").is(":checked")){
            //alert("hi");
            $(".categoryAll--modal").css({"opacity":"1","visibility":"visible","transform":"translateX(0px)"});
          }else if($(".filterAll--input").not(":checked")){
            //alert("not checked");
            $(".categoryAll--modal").css({"opacity":"0","visibility":"hidden","transform":"translateX(100px)"});
          }
        });


        //======================================
        //SUB CATEGORY SHOWING ON CLICK
        $("#menUpper").click(function(){
          if($(this).is(":checked")){
            $(".man--upper li").show(300);
          }else {
            $(".man--upper").children().children("input.common_selector").prop("checked","");
            $(".man--upper li").hide(300);
          }
        }); 

        $("#menBottom").click(function(){
          if($(this).is(":checked")){
            $(".man--bottom li").show(300);
          }else {
            $(".man--bottom").children().children("input.common_selector").prop("checked","");
            $(".man--bottom li").hide(300);
          }
        }); 

        $("#womanUpper").click(function(){
          if($(this).is(":checked")){
            $(".woman--upper li").show(300);
          }else {
            $(".woman--upper").children().children("input.common_selector").prop("checked","");
            $(".woman--upper li").hide(300);
          }
        });

        $("#womanBottom").click(function(){
          if($(this).is(":checked")){
            $(".woman--bottom li").show(300);
          }else {
            $(".woman--bottom").children().children("input.common_selector").prop("checked","");
            $(".woman--bottom li").hide(300);
            
          }
        });
        //======================================

        //=================================
        //MODAL FILTER CLICK
        $("#menUpper_modal--input").click(()=> {
          if($("#menUpper_modal--input").is(":checked")){
            //alert("checked");
            $("#menUpper_modal--input").prop("checked","checked");
            $("#menUpper_modal--items").show(300);
          }else {
            //alert("not checked");
            $("#menUpper_modal--input").prop("checked","");
            $("#menUpper_modal--items").hide(300);
          }
        });

        $("#menBottom_modal--input").click(()=> {
          if($("#menBottom_modal--input").is(":checked")){
            //alert("checked");
            $("#menBottom_modal--input").prop("checked","checked");
            $("#menBottom_modal--items").show(300);
          }else {
            //alert("not checked");
            $("#menBottom_modal--input").prop("checked","");
            $("#menBottom_modal--items").hide(300);
          }
        });


      })//End document.ready func

    </script>   

  </body>
</html>