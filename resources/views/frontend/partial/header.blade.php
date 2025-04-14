 <!-- Header -->
 <header @unless (request()->is('/')) class="header-v4" @endunless>

     <!-- Header desktop -->
     <div class="container-menu-desktop">
         <!-- Topbar -->
         <div class="top-bar" style="background-color: #222; color: #fff; font-size: 14px;">
             <div class="content-topbar flex-sb-m h-full container">
                 <div class="left-top-bar" style="color: #fff8f8;">
                     <!-- Icon mạng xã hội -->
                     <span style="margin-left: -40px;">
                         <a href="https://facebook.com" target="_blank" style="color: white; margin-right: 15px;">
                             <i class="fab fa-facebook-f"></i>
                         </a>
                         <a href="https://youtube.com" target="_blank" style="color: white; margin-right: 15px;">
                             <i class="fab fa-youtube"></i>
                         </a>
                         <a href="https://instagram.com" target="_blank" style="color: white; margin-right: 15px;">
                             <i class="fab fa-instagram"></i>
                         </a>
                     </span>
                     <i class="fas fa-phone-alt" style="margin-right: 5px; transform: scaleX(-1);"></i>
                     <strong> 0396 945 033</strong>
                     (8:30 - 21:30, tất cả các ngày trong tuần)

                 </div>

                 <div class="right-top-bar flex-w h-full">
                     <span class="flex-c-m " style="color: #fff8f8;font-size: 12px;">
                         Phục vụ tận tâm - Chất lượng hàng đầu
                     </span>
                 </div>
             </div>
         </div>


         <div class="wrap-menu-desktop @unless (request()->is('/')) how-shadow1 @endunless">
             <nav class="limiter-menu-desktop
             container">

                 <!-- Logo desktop -->
                 <a href="/" class="logo">
                     <img src="{{ asset('image/logo_fashion.png') }}" style="height: 40px; " alt="IMG-LOGO">
                 </a>

                 <!-- Menu desktop -->
                 <div class="menu-desktop">
                     <ul class="main-menu">
                         <li class="{{ request()->is('/') ? 'active-menu' : '' }}">
                             <a href="/">Trang chủ</a>
                         </li>

                         <li class="{{ request()->is('san-pham') ? 'active-menu' : '' }}">
                             <a href="{{ route('product') }}">Cửa hàng</a>
                         </li>

                         <li class="label1 {{ request()->is('gio-hang') ? 'active-menu' : '' }}" data-label1="hot">
                             <a href="{{ route('cart') }}">Tính năng</a>
                         </li>

                         <li class="{{ request()->is('ve-chung-toi') ? 'active-menu' : '' }}">
                             <a href="{{ route('about') }}">Về chúng tôi</a>
                         </li>

                         <li class="{{ request()->is('lien-he') ? 'active-menu' : '' }}">
                             <a href="{{ route('contact') }}">Liên hệ</a>
                         </li>
                     </ul>
                 </div>

                 <!-- Icon header -->
                 <div class="wrap-icon-header flex-w flex-r-m">
                     <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                         <i class="zmdi zmdi-search"></i>
                     </div>



                     <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="2">
                         <i class="zmdi zmdi-shopping-cart"></i>
                     </div>

                     <a href="#"
                         class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                         data-notify="0">
                         <i class="zmdi zmdi-favorite-outline"></i>
                     </a>
                     <a href="/login" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-login">
                         <i class="zmdi zmdi-account"></i>
                     </a>
                 </div>
             </nav>
         </div>
     </div>

     <!-- Header Mobile -->
     <div class="wrap-header-mobile">
         <!-- Logo moblie -->
         <div class="logo-mobile" style="margin-left:20px ">
             <a href="/"><img src="{{ asset('image/logo_fashion.png') }}" alt="IMG-LOGO"></a>
         </div>

         <!-- Icon header -->
         <div class="wrap-icon-header flex-w flex-r-m m-r-15">
             <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                 <i class="zmdi zmdi-search"></i>
             </div>

             <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                 data-notify="2">
                 <i class="zmdi zmdi-shopping-cart"></i>
             </div>

             <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                 data-notify="0">
                 <i class="zmdi zmdi-favorite-outline"></i>
             </a>
         </div>

         <!-- Button show menu -->
         <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
             <span class="hamburger-box">
                 <span class="hamburger-inner"></span>
             </span>
         </div>
     </div>
     <!-- Menu Mobile -->
     <div class="menu-mobile" style="display: none;">
         {{-- <ul class="topbar-mobile">
             <li>
                 <div class="left-top-bar">
                     Free shipping for standard order over $100
                 </div>
             </li>

             <li>
                 <div class="right-top-bar flex-w h-full">
                     <a href="#" class="flex-c-m p-lr-10 trans-04">
                         Help &amp; FAQs
                     </a>

                     <a href="#" class="flex-c-m p-lr-10 trans-04">
                         My Account
                     </a>

                     <a href="#" class="flex-c-m p-lr-10 trans-04">
                         EN
                     </a>

                     <a href="#" class="flex-c-m p-lr-10 trans-04">
                         USD
                     </a>
                 </div>
             </li>
         </ul> --}}

         <ul class="main-menu-m">
             <li>
                 <a href="/">Trang chủ</a>
                 {{-- <ul class="sub-menu-m">
                     <li><a href="index.html">Homepage 1</a></li>
                     <li><a href="home-02.html">Homepage 2</a></li>
                     <li><a href="home-03.html">Homepage 3</a></li>
                 </ul>
                 <span class="arrow-main-menu-m">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                 </span> --}}
             </li>

             <li>
                 <a href="{{ route('product') }}">Cửa hàng</a>
             </li>

             <li>
                 <a href="{{ route('cart') }}" class="label1 rs1" data-label1="hot">Tính năng</a>
             </li>

             <li>
                 <a href="{{ route('about') }}">Về chúng tôi</a>
             </li>

             <li>
                 <a href="{{ route('contact') }}">Liên hệ</a>
             </li>

         </ul>
     </div>


     <!-- Modal Search -->
     <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
         <div class="container-search-header">
             <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                 <img src="template/images/icons/icon-close2.png" alt="CLOSE">
             </button>

             <form class="wrap-search-header flex-w p-l-15">
                 <button class="flex-c-m trans-04">
                     <i class="zmdi zmdi-search"></i>
                 </button>
                 <input class="plh3" type="text" name="search" placeholder="Search...">
             </form>
         </div>
     </div>


 </header>
