<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-Commerce Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
    <!-- <link rel="stylesheet" href="css/iconmonstr-iconic-font.min.css" /> -->
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css" /> -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="css/fontawesome-free/css/all.css">
  </head>
  <body onload="showPreLoader();">
    <div class="wrapper__loader">
      <div class="preloader">
        <span class="ring1"></span>
        <span class="ring2"></span>
        <span class="ring3"></span>
        <span class="ring4"></span>
      </div>
    </div>
    
    <div class="categoryAll--modal d-flex py-4 px-5">
      <div class="category--filterModal">
        <h3 class="mb-4">Category</h3>
        <span class="d-block"><input type="checkbox" id="menUpper_modal--input" hidden><span></span><label for="menUpper_modal--input">Men's Upper</label></span>
        <ul id="menUpper_modal--items">
          <li>T-Shirt</li>
          <li>Shirt</li>
          <li>T-Shirt</li>
          <li>Shirt</li>
        </ul>
        <span class="d-block"><input type="checkbox" id="menBottom_modal--input" hidden><span></span><label for="menBottom_modal--input">Men's Bottom</label></span>
        <ul id="menBottom_modal--items">
          <li>T-Shirt</li>
          <li>Shirt</li>
          <li>T-Shirt</li>
          <li>Shirt</li>
        </ul>
        <span class="d-block"><input type="checkbox" id="womanUpper_modal--input" hidden><span></span><label for="womanUpper_modal--input">Woman's Upper</label></span>
        <ul id="womanUpper_modal--items">
          <li>T-Shirt</li>
          <li>Shirt</li>
          <li>T-Shirt</li>
          <li>Shirt</li>
        </ul>
        
      </div><!-- End category--filterModal -->
    </div><!-- End categoryAll--modal -->
    
    <!-- overlay -->
    <div class="overlay"></div>
       <!-- menu--2 starts -->
   <div class="menu2--wrapper">
    <div class="menu--2">
      <ul>
        <li><a href="index.html" class="">Home</a></li>
        <li><a href="#" class="">About</a></li>
        <li><a href="shop_category.html" class="">Shop</a></li>
        <li><a href="#" class="">Contact</a></li>
        <li><a href="" class="" data-toggle="modal" data-target="#login_signUp_modal">Login/Sign Up</a></li>
        <li><a href="cart.html" class="">Cart</a href="#"></li>
      </ul>
    </div>
  </div>

  <div class="hamburger">
    <input type="checkbox" id="hamburger_btn">
    <label for="hamburger_btn">
      <!-- <i class="fas fa-bars"> -->
      <span class="ham1"></span>
      <span class="ham2"></span>
      <span class="ham3"></span>
    </label>  
  </div>


    <!-- Header section starts -->
    <header class="header">
      
      <div class="header--menu d-flex align-items-center justify-content-around">
        
          <div class="site--logo">ONE TOP SHOP</div>
          <nav class="menu--bar d-flex">
            <ul>
              <li><a href="index.html" class="menu__item">Home</a></li>
              <li><a href="#" class="menu__item">About</a></li>
              <li><a href="shop_category.html" class="menu__item">Shop</a></li>
              <li><a href="#" class="menu__item">Contact</a></li>
              <li><a class="menu__item" data-toggle="modal" data-target="#login_signUp_modal">Login/Sign Up</a></li>
              <li><a href="cart.html" class="menu__item">Cart</a href="#"></li>
            </ul>
          </nav>
        
        
      </div>
      <!-- End header-menu -->
    </header>
    <!-- Header section ends -->