<!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                       

                        <!-- Side Content -->
                        <div class="side-content">
                              

                        <div class="row toppada">
                            <div class="col-sm-5 col-xs-6">
                            <img src="{{ asset('user_pic/'.auth()->user()->pic) }}" class="img-responsive img-circle" width:100%; height="100px;">
                            </div>
                            <div class="col-sm-7 col-xs-6 kd">
                                <p style="font-size: 14px; color:#fff;"> 
                                <small>Welcome </small><br/>
                                <strong>{{auth()->user()->name}}</strong>
                                    
                               </p>

                            </div>
                        </div>

                        <br>
                        <ul class="nav-main">

                         <li>
                                <a href="/admin/dashboard" <?php if($page == "dashboard"){?> class="active"<?php }?> ><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>

                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Menu</span></li>

                            <li  <?php if($page == "all_products" || $page == "add_product" || $page == "edit_product" || $page == "productCategories" || $page == "attribute"|| $page == "wine"|| $page == "offer"|| $page == "grape"|| $page == "pair"|| $page == "all-country"|| $page == "country"|| $page == "region" || $page == "brand" ){?> class="open" <?php }?>>

                              <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="glyphicon glyphicon-shopping-cart"></i><span class="sidebar-mini-hide">Product</span></a>

                             <ul>
                                <li>
                                    <a href="/admin/product/" <?php if($page == "all_products"){?> class="active"<?php }?> >All Product</a>
                                </li>
                                <li>
                                    <a href="/admin/product/create" <?php if($page == "add_product" || $page == "edit_product"){?> class="active"<?php }?> >Add New Product</a>
                                </li>

                                <li>
                                <a href="/admin/category"  <?php if($page == "productCategories"){?> class="active"<?php }?> > Categories</a>
                                </li>
            
                                <li>
                                <a href="/admin/attribute" <?php if($page == "attribute"){?> class="active"<?php }?>>Attributes</a>
                                </li>

                                <li>
                                <a href="/admin/brand" <?php if($page == "brand"){?> class="active"<?php }?>>Brand</a>
                                </li>
    

                                <li>
                                    <a href="/admin/wine" <?php if($page == "wine"){?> class="active"<?php }?>>Wine</a>
                                </li>
                                <li>
                                    <a href="/admin/offer" <?php if($page == "offer"){?> class="active"<?php }?>>Offer</a>
                                </li>
                                <li>
                                    <a href="/admin/grape" <?php if($page == "grape"){?> class="active"<?php }?>>Grape</a>
                                </li>

                                <li>
                                    <a href="/admin/pair" <?php if($page == "pair"){?> class="active"<?php }?>>Pair</a>
                                </li>
                                <li>
                                    <a href="/admin/country" <?php if($page == "all-country"){?> class="active"<?php }?>>Countries</a>
                                </li>
                                <li>
                                    <a href="/admin/country/create" <?php if($page == "country"){?> class="active"<?php }?>>Add Country</a>
                                </li>
                                <li>
                                    <a href="/admin/country/region/create" <?php if($page == "region"){?> class="active"<?php }?>>Add Region</a>
                                </li>

                             </ul>
                         </li>

                         <li <?php if($page == "all_blogs" || $page == "add_blog" || $page == "edit_blog"  || $page == "edit_category" || $page == "categories"){?> class="open" <?php }?> >
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Blog</span></a>
                            <ul>
                               
                                        <li>
                                            <a href="/admin/blog" <?php if($page == "all_blogs"){?> class="active"<?php }?> > All  </a>
                                        </li>
                                    
                                        <li>
                                            <a href="/admin/blog/create" <?php if($page == "add_blog" || $page == "edit_blog"){?> class="active"<?php }?> >Add new</a>
                                        </li>
                                
                                
                               
                                    <li>
                                        <a href="/admin/blog/categories" <?php if($page == "edit_category" || $page == "categories"){?> class="active"<?php }?> >Categories</a>
                                    </li>
                               
                                
                            </ul>
                        </li>

       <li>
     <a <?php if($page == "order" || $page == "invoice"){?> class="active" <?php }?> href="/admin/order" ><i class="glyphicon glyphicon-th-list"></i><span class="sidebar-mini-hide">Order</span></a>
    </li>

  

    <li <?php if($page == "slider_tb" || $page == "add_slider"){?> class="open" <?php }?> >
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="glyphicon glyphicon-flash"></i><span class="sidebar-mini-hide">Slider</span></a>
        <ul>
                <li>
                    <a href="/admin/slider"  <?php if($page == "slider_tb"){?> class="active"<?php }?> >Sliders</a>
                </li>
                <li>
                    <a href="/admin/slider/create"  <?php if($page == "add_slider"){?> class="active"<?php }?> >Add New</a>
                </li>
        </ul>
    </li>

    <li <?php if($page == "ads_tb" || $page == "add_ads"){?> class="open" <?php }?> >
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="glyphicon glyphicon-flash"></i><span class="sidebar-mini-hide">Ads</span></a>
        <ul>
                <li>
                    <a href="/admin/ads"  <?php if($page == "ads_tb"){?> class="active"<?php }?> >Ads</a>
                </li>
                <li>
                    <a href="/admin/ads/create"  <?php if($page == "add_ads"){?> class="active"<?php }?> >Add New</a>
                </li>
        </ul>
    </li>

     <li <?php if($page == "edit_shipping_rate" || $page == "shipping_rate" || $page == "shipping_country" || $page == "edit_shipping_country"){?> class="open" <?php }?> >
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-plane"></i><span class="sidebar-mini-hide">Shipping</span></a>
          <ul>
                <li>
                <a href="/admin/shipping/rate" <?php if($page == "edit_shipping_rate" || $page == "shipping_rate"){ ?> class="active"<?php } ?> > Shipping Rate</a>
                </li>
                <li>
                <a href="/admin/shipping/country" <?php if($page == "shipping_country" || $page == "edit_shipping_country"){ ?> class="active"<?php } ?> >Country</a>
                </li>
               
         </ul>
     </li>

     <li>
        <a @if($page == "all_customers" ) class="active" @endif href="/admin/customers" ><i class="si si-user"></i><span class="sidebar-mini-hide">Customers</span></a>
     </li>



        <li>
            <li class="nav-main-heading"><span class="sidebar-mini-hide">Report</span></li>
        <li>

        <li>
            <a <?php if($page == "report" ){?> class="active" <?php }?> href="/admin/report" ><i class="glyphicon glyphicon-th-list"></i><span class="sidebar-mini-hide">Order Report</span></a>
        </li>



         <li>

            <li class="nav-main-heading"><span class="sidebar-mini-hide">SETTINGS</span></li>



            <li>

         <a <?php if($page == "subscribe"){?> class="active" <?php }?> href="/admin/subscribers" ><i class="si si-envelope"></i><span class="sidebar-mini-hide">Subscribers</span></a>
         </li>

        
    
    
            <li <?php if($page == "all_pages" || $page == "add_page" || $page == "edit_page"){?> class="open" <?php }?> >
                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Pages</span></a>
                <ul>
                        <li>
                        <a href="/admin/page" <?php if($page == "all_pages"){?> class="active"<?php }?> > All  </a>
                        </li>
                        <li>
                        <a href="/admin/page/create" <?php if($page == "add_page" || $page == "edit_page"){?> class="active"<?php }?> >Add new</a>
                        </li>
                    
                </ul>
            </li>
            <li>
                <a <?php if($page == "coupon" ){?> class="active" <?php }?> href="/admin/coupon" ><i class="glyphicon glyphicon-th-list"></i><span class="sidebar-mini-hide">Coupon</span></a>
             </li>

            @if(auth()->user()->type == "Super Administrator")

            <li <?php if($page == "setup_shop" || $page == "shop_tb" || $page == "edit_shop"){?> class="open" <?php }?> >
               <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-home"></i><span class="sidebar-mini-hide">Branches</span></a>
                 <ul>
                       <li>
                       <a href="/admin/setup/shop" <?php if($page == "shop_tb"){?> class="active"<?php }?> > Shops </a>
                       </li>
                       <li>
                       <a href="/admin/setup/shop/create" <?php if($page == "setup_shop" || $page == "edit_shop"){?> class="active"<?php }?> >Add new</a>
                       </li>
                </ul>
            </li>
         @endif
       
         @if(auth()->user()->type == "Super Administrator" || auth()->user()->type == "Administrator" )
       
            <li <?php if($page == "all_users" || $page == "register" || $page == "edit_user"){?> class="open" <?php }?> >
               <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                 <ul>
                       <li>
                       <a href="/admin/user" <?php if($page == "all_users"){?> class="active"<?php }?> > All  </a>
                       </li>
                       <li>
                       <a href="/admin/user/create" <?php if($page == "register" || $page == "edit_user"){?> class="active"<?php }?> >Add new</a>
                       </li>
                    
                </ul>
            </li>
       
        @endif



    @if(auth()->user()->type == "Super Administrator" || auth()->user()->type == "Administrator" )
         <li <?php if($page == "settings" || $page == "payment" ){?> class="open" <?php }?> >
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-settings"></i><span class="sidebar-mini-hide">Settings</span></a>
              <ul>
                    <li>
                    <a href="/admin/account/settings" <?php if($page == "settings"){ ?> class="active" <?php } ?> > Shop  </a>
                    </li>
                    <li>
                    <a href="/admin/paymethod/" <?php if($page == "payment" ){ ?> class="active" <?php } ?> > Payment </a>
                    </li>
                 
             </ul>
         </li>
        
     @endif

     <li class="nav-main-heading"><span class="sidebar-mini-hide">FrontEnd</span></li>
     <li>
     <a href="\{{ strtolower(session()->get('shopCountry')) }}\store" target="_blank"><i class="si si-rocket"></i><span class="sidebar-mini-hide">Visit Site</span></a>
    </li>
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->



            <!-- TOP BAR -->


              <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default2 btn-image dropdown-toggle " data-toggle="dropdown" type="button">
                                <img src="{{ asset('user_pic/'.auth()->user()->pic) }}"  alt="Current User" >
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <!--
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>-->
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                <li>
                                    <a tabindex="-1" href="/admin/user/changepassword">
                                        <i class="si si-lock pull-right"></i> Change Password
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('/admin/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                @if(auth()->user()->type == "Super Administrator")
                    <li>
                        <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                        <button class="btn btn-default2 pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
                @endif
                  
                    
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->


            <!-- END OF TOP -->