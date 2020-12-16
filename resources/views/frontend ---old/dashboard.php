<?php require_once("includes/session.php");?>
<?php confirm_session();?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<!DOCTYPE html>
<!--[if IE 9]>         
<html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?= $project_title ;?></title>

        <meta name="description" content="OneUI - Admin Dashboard Template & UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">

        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-192x192.png" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/slick/slick.min.css">
        <link rel="stylesheet" href="assets/js/plugins/slick/slick-theme.min.css">
         <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/datatables/jquery.dataTables.min.css">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">

        <script src="jquery.js"></script> 
        <script type="text/javascript">

    function update_order(id)
    {
      var ele=document.getElementById(id);
      var order_id=document.getElementById(id+"order_id").value;
      var order_name =document.getElementById(id+"order_name").value;
     
     //alert(order_id);
      $.ajax({
        type:'post',
        url:'order_complete.php',
        data:{
          //item_src:img_src,
          OrderID:order_id,
          order_name:order_name
        },
        success:function(response){
        
                         $('#'+id+'success_message').fadeIn().html(response);  
                         setTimeout(function(){  
                         $('#'+id+'success').fadeOut("Slow");  
                          }, 700);  
        }
      });
    
    }
    
    
</script>

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
       
      <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
        
  
            <!-- Sidebar -->
<?php require_once("includes/backend_side_bar.php");?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-image overflow-hidden" style="background-image: url('assets/img/prive-bg.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
                        <h2 class="h5 text-white-op animated zoomIn">Welcome Administrator</h2>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Stats -->
                <div class="content bg-white border-b">
                    <div class="row items-push text-uppercase">
                <!-- Block Tabs Justified Alternative Style -->
                            <div class="block">
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                                    <li class="active">
                                        <a href="#today"><i class="fa fa-calendar-o"></i> TODAY</a>
                                    </li>
                                    <li>
                                        <a href="#this_week"><i class="fa fa-calendar-o"></i> THIS WEEK</a>
                                    </li>
                                    <li>
                                        <a href="#this_month"><i class="fa fa-calendar-o"></i> THIS MONTH</a>
                                    </li>
                                    <li>
                                        <a href="#this_year"><i class="fa fa-calendar-o"></i> THIS YEAR</a>
                                    </li>
                                </ul>
                                <div class="block-content tab-content">

                    <div class="tab-pane active" id="today">

                       
                         <div class="col-xs-6 col-sm-3">

                            <?php 
                    $today = date('Y-m-d');
                    $quantity=  0;
                    $totalamount = 0;
                    $totalamount_gh = 0;
                    $totalamount_us = 0;
                    $sql = "SELECT * from order_tb WHERE date =  '$today' ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                      
                     $id = $row['id'];

                     if($row['country'] == 1){

                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_gh= $totalamount_gh + $row['totalamount'];

                   }else{
                    
                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_us= $totalamount_us + $row['totalamount'];

                   }
                     
                    endwhile;

                     ?>

                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $quantity." item(s)";?></p>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>

            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> Ghc <?= number_format($totalamount_gh,2); ?></p>
            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="fa fa-globe"></i> $ <?= number_format($totalamount_us,2); ?></p>

                        </div>

                           <?php 
                    $today = date('Y-m-d');
                    $pending=  0;
                    $completed = 0;
                    $cancelled = 0;

                    $today_status = array('pending','completed','cancelled');
                    foreach ($today_status as $value) {

                    $sql = "SELECT * from order_tb WHERE complete_status =  '$value' AND date='$today' ";
                    $q = $conn->query($sql);
                    if($value == 'pending'){

                    $total_pending = $q->rowCount();

                   }elseif ($value == 'completed') {

                     $total_completed = $q->rowCount();

                   }elseif ($value == 'cancelled') {

                      $total_cancelled = $q->rowCount();
                   }
                    //$q->setFetchMode(PDO::FETCH_ASSOC);

                    }

                     ?>

                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_completed;?></p>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_pending;?></p>
                        </div>
                         <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_cancelled;?></p>
                        </div>



                     </div>

                       <div class="tab-pane" id="this_week">

                              <div class="col-xs-6 col-sm-3">

                            <?php 
                      $today = getdate();
                      $curMonth =  date("m");
                      $weekStartDate = $today['mday'] - $today['wday'];
                      $weekEndDate = $today['mday'] - $today['wday']+6;

                    $quantity=  0;
                    $totalamount = 0;
                    $totalamount_gh = 0;
                    $totalamount_us = 0;

                    $sql = "SELECT * from order_tb WHERE MONTH(date) = '$curMonth' AND DAY(date) BETWEEN '$weekStartDate' AND '$weekEndDate' ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                      
                     $id = $row['id']; 
                      if($row['country'] == 1){

                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_gh= $totalamount_gh + $row['totalamount'];

                   }else{
                    
                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_us= $totalamount_us + $row['totalamount'];

                   }
                     
                    endwhile;

                     ?>

                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $quantity." item(s)";?></p>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week </small></div>
                             <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> Ghc <?= number_format($totalamount_gh,2); ?></p>
            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="fa fa-globe"></i> $ <?= number_format($totalamount_us,2); ?></p>
                        </div>


                           <?php 
                    
                    $pending=  0;
                    $completed = 0;
                    $cancelled = 0;

                    $today_status = array('pending','completed','cancelled');
                    foreach ($today_status as $value) {

                    $sql = "SELECT * from order_tb WHERE complete_status =  '$value' AND MONTH(date) = '$curMonth' AND DAY(date) BETWEEN '$weekStartDate' AND '$weekEndDate' ";
                    $q = $conn->query($sql);
                    if($value == 'pending'){

                    $total_pending = $q->rowCount();

                   }elseif ($value == 'completed') {

                     $total_completed = $q->rowCount();

                   }elseif ($value == 'cancelled') {

                      $total_cancelled = $q->rowCount();
                   }
                    //$q->setFetchMode(PDO::FETCH_ASSOC);

                    }

                     ?>

                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_completed;?></p>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_pending;?></p>
                        </div>
                         <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_cancelled;?></p>
                        </div>


                    </div>
                                    
                    <div class="tab-pane" id="this_month">

                      <div class="col-xs-6 col-sm-3">

                            <?php 

                    $curMonth =  date("m");
                    $quantity=  0;
                    $totalamount = 0;
                    $totalamount_gh = 0;
                    $totalamount_us = 0;

                    $sql = "SELECT * from order_tb WHERE  MONTH(date) = '$curMonth' ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                      
                     $id = $row['id']; 
                      if($row['country'] == 1){

                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_gh= $totalamount_gh + $row['totalamount'];

                   }else{
                    
                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_us= $totalamount_us + $row['totalamount'];

                   }
                     
                    endwhile;

                     ?>

                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $quantity." item(s)";?></p>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> Ghc <?= number_format($totalamount_gh,2); ?></p>
            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="fa fa-globe"></i> $ <?= number_format($totalamount_us,2); ?></p>
                        </div>


                           <?php 
                    
                    $pending=  0;
                    $completed = 0;
                    $cancelled = 0;

                    $today_status = array('pending','completed','cancelled');
                    foreach ($today_status as $value) {

                    $sql = "SELECT * from order_tb WHERE complete_status =  '$value' AND MONTH(date) = '$curMonth' ";
                    $q = $conn->query($sql);
                    if($value == 'pending'){

                    $total_pending = $q->rowCount();

                   }elseif ($value == 'completed') {

                     $total_completed = $q->rowCount();

                   }elseif ($value == 'cancelled') {

                      $total_cancelled = $q->rowCount();
                   }
                    //$q->setFetchMode(PDO::FETCH_ASSOC);

                    }

                     ?>

                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_completed;?></p>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_pending;?></p>
                        </div>
                         <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_cancelled;?></p>
                        </div>

                    </div>

                       <div class="tab-pane" id="this_year">

                          <div class="col-xs-6 col-sm-3">

                            <?php 

                    $curyear =  date("Y");
                    $quantity=  0;
                    $totalamount = 0;
                    $totalamount_gh = 0;
                    $totalamount_us = 0;

                    $sql = "SELECT * from order_tb WHERE  YEAR(date) = '$curyear' ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                      
                     $id = $row['id']; 
                      if($row['country'] == 1){

                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_gh= $totalamount_gh + $row['totalamount'];

                   }else{
                    
                     $quantity =  $quantity + $row['quantity'];
                     $totalamount_us= $totalamount_us + $row['totalamount'];

                   }
                     
                    endwhile;

                     ?>

                    <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Year</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $quantity." item(s)";?></p>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earning</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Year </small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="flag-icon flag-icon-gh"></i> Ghc <?= number_format($totalamount_gh,2); ?></p>
            <p class="h2 font-w300 text-primary animated flipInX" href=""><i class="fa fa-globe"></i> $ <?= number_format($totalamount_us,2); ?></p>
                        </div>


                           <?php 
                    
                    $pending=  0;
                    $completed = 0;
                    $cancelled = 0;

                    $today_status = array('pending','completed','cancelled');
                    foreach ($today_status as $value) {

                    $sql = "SELECT * from order_tb WHERE complete_status =  '$value' AND YEAR(date) = '$curyear' ";
                    $q = $conn->query($sql);
                    if($value == 'pending'){

                    $total_pending = $q->rowCount();

                   }elseif ($value == 'completed') {

                     $total_completed = $q->rowCount();

                   }elseif ($value == 'cancelled') {

                      $total_cancelled = $q->rowCount();
                   }
                    //$q->setFetchMode(PDO::FETCH_ASSOC);

                    }

                     ?>

                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn">Complete Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_completed;?></p>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Pending Orders</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_pending;?></p>
                        </div>
                         <div class="col-xs-6 col-sm-2">
                            <div class="font-w700 text-gray-darker animated fadeIn"> Cancelled orders </div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month </small></div>
                            <p class="h2 font-w300 text-primary animated flipInX" href=""><?= $total_cancelled;?></p>
                        </div>

                    </div>

                                </div>
                            </div>
                       


                    </div>
                </div>
                <!-- END Stats -->

            
                          
                            <!-- END Block Tabs Justified Default Style -->
                    

                <!-- Page Content -->
                <div class="content">
                   
                    <div class="row">
                             <div class="col-md-12">
                                <div class="block">
                                    <div class="block-content">
                     <?php
                              
                    try {
                    $todays = date("Y-m-d");
                    $sql = "SELECT * from order_tb WHERE date = '$todays' ORDER BY date DESC, id DESC";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                  
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }
                    ?>

                        <h4 class="header-title m-t-0 m-b-30">Today's Sales</h4>
                         <table class="table table-borderless">
                                           <thead>
                                            <tr>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Order</th>
                                                <th class="text-center">Purchased</th>
                                                <th class="text-center">Deliver to</th>
                                                 <th class="text-center">Date</th>
                                                 <th class="text-center">Total</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>

                              <?php while ($row = $q->fetch()): ?>
                               
                                 
                                    <tr id="<?php echo $row['id']; ?>">
                                
                                        <td id="<?php echo $row['id'];?>success_message">
                                        <?php if($row['complete_status'] == "Cancelled"){?>
                                        
                                        <span class="label label-warning"><i class="fa fa-times-circle"> &nbsp Cancelled</i></span>
                                        <?php }elseif($row['complete_status'] == "Completed"){ ?>
                                        <span class="label label-success"><i class="fa  fa-check-circle"> &nbsp Completed</i></span>
                                        <?php }elseif($row['complete_status'] == "Pending"){ ?>
                                        <span class="label label-primary"><i class="fa  fa-ellipsis-h"></i>  &nbsp Pending </span>
                                        <?php }else{ ?>
                                        <span class="label label-warning"><i class="fa  fa-exclamation-circle"></i></span>
                                        <?php }?>
                                        
                                        </td>
                                        
                                        <td>
                                        # <?php echo $row['id'];?>&nbsp | &nbsp <?php echo $row['customer_name'];?> <br/>
                                        <i class="fa fa-phone"></i> <?php echo $row['phone_number'];?> 
                                    
                                        </td>
                                        
                                        <td><?php echo $row['quantity'];?> item(s) </td>
                                        
                                        <td><?php echo $row['ship_to'];?></td>
                                        
                                        <td><i class="fa  fa-clock-o"></i> <?php echo $row['time'];?>
                                            <br/>
                                            <i class="fa  fa-calendar-o"></i> <?php echo $row['date'];?>
                                        </td>
                                        <td>
                                           <?php if($row['country'] == 2){ ?>
                                          $  <?php 
                                        $totalamount = $row['totalamount'];
                                        echo $totalamount = number_format($totalamount, 2);
                                        
                                          ?><br>

                                          <?php 
                                          // COUPON CODE 
                                          if($row['coupon_code'] != ""){

                                        $coupon_code   = $row['coupon_code'];
                                        $coupon_amount   = $row['coupon_amount'];
                                         echo "Coupon code: ".$coupon_code." <br> Coupon Amount: $ ".$coupon_amount;

                                        }else{


                                        }
                                          ?>


                                          <?php }else{ ?>

                                           ₵ <?php 
                                        $totalamount = $row['totalamount'];
                                        echo $totalamount = number_format($totalamount, 2);
                                        
                                          ?><br/>

                                          <?php 
                                          // COUPON CODE 
                                          if($row['coupon_code'] != " "){

                                        $coupon_code   = $row['coupon_code'];
                                        $coupon_amount   = $row['coupon_amount'];
                                         echo "Coupon code: ".$coupon_code." <br> Coupon Amount: $ ".$coupon_amount;

                                        }else{


                                        }
                                          ?>


                                          <?php } ?>

                                          <br/>
                                            <?php echo $row['payment_method'];?>
                                        </td>
                                        
                                        <td> 
                                        <?php if($row['complete_status'] != "Completed"){?>

                                         <input type="hidden" name="pid" id="<?php echo $row['id']; ?>order_id" value="<?php echo $row['id']; ?>">
     <input type="hidden" name="pid" id="<?php echo $row['id']; ?>order_name" value="Completed">
                                        <button onclick="update_order('<?php echo $row['id']; ?>')" id="<?php echo $row['id'];?>success"  class="btn btn-success push-5-r push-10"><i class="fa  fa-check-circle"></i></button>
                                        
                                        <?php }?>


                                
                                        <a href="invoice.php?order_id=<?php echo $row['id']; ?>"> <button class="btn btn-info push-5-r push-10"  data-toggle="tooltip" data-placement="top" title="View invoice"><i class="fa  fa-eye"></i></button></a>
                                    
                                        </td>
                                    </tr>
                                    <?php endwhile;   ?>
                                                

                                            </tbody>
                                        </table>
                                  
                                </div>
                             </div>
                            </div><!-- end col -->
                      
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <?php require_once("includes/backend_footer.php");?>
            
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Apps</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="index.html">
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-speedometer fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Backend</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="frontend_home.html">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-rocket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Frontend</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/jquery.placeholder.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- Page Plugins -->
        <script src="assets/js/plugins/slick/slick.min.js"></script>
        <script src="assets/js/plugins/chartjs/Chart.min.js"></script>

         <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- Page JS Code -->
        <script src="assets/js/pages/base_tables_datatables.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/base_pages_dashboard.js"></script>
        <script>
            $(function () {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers('slick');
            });
        </script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js"></script>
         
         

 <script type="text/javascript">

  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

        </script>
    </body>
</html>