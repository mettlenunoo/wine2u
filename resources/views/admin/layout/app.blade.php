<!DOCTYPE html>
<!--[if IE 9]>         
<html class="ie9 no-focus"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus"> 
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
         <title> Admin</title>
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">

        <link rel="icon" type="image/png" href="{{ asset('assets/img /favicons/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-160x160.png') }}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick/slick-theme.min.css') }}">

         <!-- Page JS Plugins CSS -->
       <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.css') }}">
          <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datetimepicker/jquery.datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzonejs/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote-bs3.min.css') }}">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/custom_.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
          

        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


            <!-- UPLOAD IMAGES CSS -->
        <style type="text/css">
            .thumbimage {
                float:left;
                width:100px;
                position:relative;
                padding:5px;
                margin-right:3px;
                border:1px solid #ebeff2;
            }
            .tableimage{
                width:40px;
                height:40px;
            }
        </style>

        
    </head>
    <body>
       
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

            {{-- CHECK WHETHER SESSION IS EMPTY OR NOT  --}}
            
            @if(session()->has('shopId'))

            @else

                @php

                Session::put('shopId', Cookie::get('shopId'));
                Session::put('shopBanner', Cookie::get('shopBanner'));
                Session::put('shopName', Cookie::get('shopName'));
                Session::put('shopCurrency', Cookie::get('shopCurrency'));
                Session::put('shopCountry', Cookie::get('shopCountry'));
                Session::put('shopTax', Cookie::get('shopTax'));
            
                @endphp

            @endif
         
             <!-- SIDE BAR -->
            @include('admin.includes.side_bar')
                <!-- CONTENT -->
                @yield('content')
             <!-- FOOTER -->
             @include('admin.includes.footer')
            
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
                             <h3 class="block-title">All Shop(s)</h3>
                         </div>
                         <div class="block-content">
                             <div class="row text-center">

                             
                                  @foreach ($allShops as $shop)
                                    
                                    <div class="col-xs-6"  >
                                        <a class="block block-rounded" href="/admin/change/shop/{{ $shop->id }}">
                                            <div class="block-content text-white bg-modern">
                                                <i class="si si-rocket fa-1x"></i>
                                            <div class="font-w600 push-15-t push-15">{{ $shop->shop_name }}</div>
                                            </div>
                                        </a>
                                    </div>

                                 @endforeach
                          

                            
                             </div>
                         </div>
                     </div>
                     <!-- END Apps Block -->
                 </div>
             </div>
         </div>
         <!-- END Apps Modal -->
 
         <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
         {{-- <script type="text/javascript" src="{{ asset('lazyjs/jquery.lazy.min.js')}}"></script> --}}
         <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.slimscroll.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.scrollLock.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.countTo.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.placeholder.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>
         <script src="{{ asset('assets/js/app.js') }}"></script>
 
         <!-- Page JS Plugins -->
         <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
         <!-- Page JS Plugins -->
         <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('assets/js/pages/base_tables_datatables.js') }}"></script>

         <script src="{{ asset('assets/js/plugins/summernote/summernote.min.js') }}"></script>
         {{-- <script src="{{  asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script> --}}
         <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker/jquery.datetimepicker.js') }}"></script>

         {{-- <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
         {{-- <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> --}}
  <script type="text/javascript" src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
         {{-- <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" /> --}}

       


         <script>
             $(function () {
                 // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
         App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs','appear','summernote','table-tools']);
             });
               
            //  var publishDate =document.getElementById('publish').value;
            //  if(publishDate == ""){
            //     var dateToday = new Date(); 
            //  }else{
            //     var dateToday = publishDate;
            //    // dateToday.setTime(dateToday.getTime()- (7*24*3600000));
            //  }
           

            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm',
                     //minDate: dateToday
                 });
            });
       
            //  $(function() {
            //    $('#lazy').Lazy();
            //  });
         </script>

          <!-- FOR NOTIFICATION-->
          {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> --}}
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- FOR NOTIFICATION-->

         
          {{-- <script>
                $(function () {
                  App.initHelpers(['tags-inputs','summernote', 'select2', 'masked-inputs']);
                });
            </script> --}}

            
 <script>
     $(document).ready(function() {
         $('#myTable').dataTable({
             "aoColumnDefs": [{
                 "bSortable": false,
                 "aTargets": ["sorting_disabled"]
             }],
             "bDestroy": true
         });
 
         // $('#myTable').DataTable( {
         //     "order": [[ 0, "desc" ]] // "0" means First column and "desc" is order type; 
         // } );
     });
 </script>

    
    <!-- UPLOAD IMAGES JAVASCRIPT CODE -->
    <script type="text/javascript">
    $("#imageupload").on('change', function () {

 //Get count of selected files
 var countFiles = $(this)[0].files.length;

 var imgPath = $(this)[0].value;
 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
 var image_holder = $("#preview-image");
 image_holder.empty();

 if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
     if (typeof (FileReader) != "undefined") {

         //loop for each file selected for uploaded.
         for (var i = 0; i < countFiles; i++) {

             var reader = new FileReader();
             reader.onload = function (e) {
                 $("<img />", {
                     "src": e.target.result,
                         "class": "thumbimage"
                 }).appendTo(image_holder);
             }

             image_holder.show();
             reader.readAsDataURL($(this)[0].files[i]);
         }

     } else {
         alert("This browser does not support FileReader.");
     }
 } else {
     alert("Pls select only images");
 }
});
</script>
<!-- UPLOAD IMAGES JAVASCRIPT CODE -->
 

<!-- FILE VALIDATION -->
<script>
    var regex = new RegExp("(.*?)\.(csv)$");
    function triggerValidation(el) {
        if (!(regex.test(el.value.toLowerCase()))) {
            el.value = '';
            alert('Please select correct file format');
        }
    }
</script>

<script>
$(document).ready(function() {

    var x = 1; 

$( "#addButton" ).click(function() {
                    
                    document.getElementById("addButton").innerHTML = "Loading...";
                     $.ajaxSetup({
					 headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  }
				     });
                   
                     var formData = new FormData();
					 formData.append('id',x);
					 $.ajax({
						method: 'POST',
						url: '/admin/product/addproduct',
						data:formData,
						cache:false,
						contentType: false,
						processData: false,
						success: function(data) {
                          $('#product').prepend(data);
                        // console.log(data);
                        document.getElementById("addButton").innerHTML = "Add Product";
						},
						error: console.error
					});

            x++;
    });

});


    function deleteProduct(z){

        var r = confirm("Are you sure You want to Delete");
        if (r == true) {
            $('#'+z).remove();
        }
       
    }

    function deletevProduct(z){
        var r = confirm("Are you sure You want to Delete");
         if (r == true) {
           
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                    var formData = new FormData();
                    formData.append('id',z);

                    $.ajax({
                        method: 'POST',
                        url: '/admin/product/delete_v',
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            
                            // if(data == "success"){
                                
                            // swal( data, "You Have Succesufully Added a Product", "success").then((value) => {
                            //     location.reload();
                            //     });

                            // }else if(data == "error"){
                                
                            //     swal( data, "Member Already Exists", "error").then((value) => {
                            //     //location.reload();
                            //     });

                            // }else{
                            //     alert(data);

                            //}
                         //   alert(data);
                            // setTimeout(function(){  
                            //  $('#'+z).fadeOut("Slow");  
                            //  }, 300);  
                             $('#'+z).remove();
       
                        },
                       // error: console.error
                    });
                }
        

    }



    function deleteImage(z){
        var r = confirm("Are you sure You want to Delete");
         if (r == true) {
           
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                    var formData = new FormData();
                    formData.append('id',z);

                    $.ajax({
                        method: 'POST',
                        url: '/admin/product/gallery',
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            
                            // if(data == "success"){
                                
                            // swal( data, "You Have Succesufully Added a Product", "success").then((value) => {
                            //     location.reload();
                            //     });

                            // }else if(data == "error"){
                                
                            //     swal( data, "Member Already Exists", "error").then((value) => {
                            //     //location.reload();
                            //     });

                            // }else{
                            //     alert(data);

                            //}

                           // alert(data);
                            setTimeout(function(){  
                             $('#img'+z).fadeOut("Slow");  
                             }, 300);  

                           // $('#'+z).remove();
       
                        },
                       // error: console.error
                    });
                }
        

    }


    
    

</script>

<script>
        $('#add').submit(function(event) {
          event.preventDefault();

                var description =   $('textarea[name="description"]').code();
                if(description == ""){
                    
                    document.getElementById("desc").innerHTML = "Please fill out this field.";
                    return false; 
                }

                document.getElementById("sub_btn").innerHTML = "Loading...";
                //var name =  $("input[name='title']").val();
                // if ($('#pic').get(0).files.length === 0) {
                //     var image = "";
                // }else{
                //     var image = $('#pic').prop('files')[0];
                //  }
                var files = $('#imageupload')[0].files;
                var gallery = $('#imageupload_banner')[0].files;
                var short_note_img = $('#note_img')[0].files;
                
                var error = '';
                var formData = new FormData();
                // PRODUCT iMAGE
                for(var count = 0; count<files.length; count++)
                {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    error += "Invalid " + count + " Image File"
                }
                else
                {
                    formData.append("picx[]", files[count]);
                }
                 
                }
                // ########   GALLLERY   #######
                for(var count = 0; count<gallery.length; count++)
                {
                var name = gallery[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    error += "Invalid " + count + " Image File"
                }
                else
                {
                    formData.append("gallerypicx[]", gallery[count]);
                }

                }

                 // SHORT NOTE IMAGE
                 for(var count = 0; count<short_note_img.length; count++){

                        var name = short_note_img[count].name;
                        var extension = name.split('.').pop().toLowerCase();
                        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                        {
                            error += "Invalid " + count + " Image File"
                        }
                        else
                        {
                            formData.append("short_note_img", short_note_img[count]);
                        }
                }


                if(error == '')
                {
                    var product_name =  $("input[name='product_name']").val();
                // var lname =  $("input[name='sl']").val();
                    
                    var short_description =  $('textarea[name="short_description"]').code();
                    var more_description =  $('textarea[name="more_description"]').code();
                   // var picx = $("input[name='picx[]']").map(function(){return $(this).val();}).get();
                    var category = $("select[name='category[]']").map(function(){return $(this).val();}).get();
                    var blog = $("select[name='blog[]']").map(function(){return $(this).val();}).get();

                    var tag =  $("input[name='tag']").val();
                    var visibility =  $("select[name='visibility']").val();
                    var publish =  $("input[name='publish']").val();
                    var featured =  $("select[name='featured']").val();
                   // VARIABLE PRODUCT
                    var attrs = $("select[name='attr[]']").map(function(){return $(this).val();}).get();;
                    var regular = $("input[name='regular[]']").map(function(){return $(this).val();}).get();
                  
                    var sales = $("input[name='sales[]']").map(function(){return $(this).val();}).get();
                    var sku = $("input[name='sku[]']").map(function(){return $(this).val();}).get();
                    var qty = $("input[name='qty[]']").map(function(){return $(this).val();}).get();
                  
                    var stock = $("select[name='stock[]']").map(function(){return $(this).val();}).get();
                    var wty = $("input[name='wty[]']").map(function(){return $(this).val();}).get();
                    var lengh = $("input[name='lengh[]']").map(function(){return $(this).val();}).get();
                    var wth = $("input[name='wth[]']").map(function(){return $(this).val();}).get();
                    var hty = $("input[name='hty[]']").map(function(){return $(this).val();}).get();
                    
                    // NOTE
                    var short_note =  $('textarea[name="short_note"]').val();


                     // VIDEO LINK
                     var video_link =  $('textarea[name="video_link"]').val();

                //   var status =  $("input[name='status']:checked").val();
                //   var accept =  $("input[name='accept']").val();

                  
                    document.getElementById("sub_btn").innerHTML = "Loading...";


                    // BINDING DATA TO DATA FORM 
                    
                    formData.append('product_name',product_name);
                    formData.append('description',description);
                    formData.append('short_description',short_description);
                    formData.append('more_description',more_description);
                    formData.append('category',category);
                    formData.append('blog',blog);
                    formData.append('tag',tag);
                    formData.append('visibility',visibility);
                    formData.append('publish',publish);
                    formData.append('featured',featured);

                    // Variable Product
                    formData.append('attrs',attrs);
                    formData.append('regular',regular);
                    formData.append('sales',sales);
                    formData.append('sku',sku);
                    formData.append('qty',qty);
                    formData.append('stock',stock);
                    formData.append('wty',wty);
                    formData.append('lengh',lengh);
                    formData.append('wth',wth);
                    formData.append('hty',hty);
                    formData.append('short_note',short_note);
                    formData.append('video_link',video_link);
                

                //   formData.append('accept',accept);
                //   formData.append('bus_address',bus_address);
                //   formData.append('latitude',latitude);
                //   formData.append('longitudes',longitude);
                    
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });


                    $.ajax({
                        method: 'POST',
                        url: '/admin/product',
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function(data) {

                            console.log(data);
                            if(data == "success"){
                                
                            swal( data, "You Have Succesufully Added a Product", "success").then((value) => {
                                location.reload();
                                });

                            }else if(data == "error"){
                                
                                swal( data, "", "error").then((value) => {
                                //location.reload();
                                });

                            }else{
                          
                            console.log(data);

                            }
                        document.getElementById("sub_btn").innerHTML = "Publish";
                            //  location.reload();
                            //  event.target.reset()

                        },
                       // error: console.error
                    });
                }else{
                  //  alert(error);
                }
             
      });
    </script>

    <script>

$('#update').submit(function(event) {
          event.preventDefault();

               var description =   $('textarea[name="description"]').code();
                    if(description == ""){
                        
                        document.getElementById("desc").innerHTML = "Please fill out this field.";
                        return false; 
                    }

                 document.getElementById("sub_btn").innerHTML = "Loading...";
               
                var gallery = $('#imageupload_banner')[0].files;
                var short_note_img = $('#note_img')[0].files;
                
                var error = '';
                var formData = new FormData();

                 if ($("input[name='img1']").get(0).files.length === 0) {

                    var image1 = "";

                   }else{

                    var image1 = $("input[name='img1']").prop('files')[0];
                 }


                 if ($("input[name='img2']").get(0).files.length === 0) {

                    var image2 = "";

                   }else{

                    var image2 = $("input[name='img2']").prop('files')[0];
                 }


                // ########   GALLLERY   #######
                for(var count = 0; count<gallery.length; count++){
                  
                    var name = gallery[count].name;
                    var extension = name.split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                    {
                        error += "Invalid " + count + " Image File"
                    }
                    else
                    {
                        formData.append("gallerypicx[]", gallery[count]);
                    }

                }

                  // SHORT NOTE IMAGE
                  for(var count = 0; count<short_note_img.length; count++){

                    var name = short_note_img[count].name;
                    var extension = name.split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                    {
                        error += "Invalid " + count + " Image File"
                    }
                    else
                    {
                        formData.append("short_note_img", short_note_img[count]);
                    }
                 }


                if(error == '')
                {   
                    var id =  $("input[name='id']").val();
                    var product_name =  $("input[name='product_name']").val();
                // var lname =  $("input[name='sl']").val();
                    //var description =   $('textarea[name="description"]').code();
                    var short_description =  $('textarea[name="short_description"]').code();
                    var more_description =  $('textarea[name="more_description"]').code();
                    var category = $("select[name='category[]']").map(function(){return $(this).val();}).get();
                    var tag =  $("input[name='tag']").val();
                    var visibility =  $("select[name='visibility']").val();
                    var publish =  $("input[name='publish']").val();
                    var featured =  $("select[name='featured']").val();

                   // VARIABLE PRODUCT
                    var attrs = $("select[name='attr[]']").map(function(){return $(this).val();}).get();;
                    var regular = $("input[name='regular[]']").map(function(){return $(this).val();}).get();
                    var sales = $("input[name='sales[]']").map(function(){return $(this).val();}).get();
                    var sku = $("input[name='sku[]']").map(function(){return $(this).val();}).get();
                    var qty = $("input[name='qty[]']").map(function(){return $(this).val();}).get();
                    var stock = $("select[name='stock[]']").map(function(){return $(this).val();}).get();
                    var wty = $("input[name='wty[]']").map(function(){return $(this).val();}).get();
                    var lengh = $("input[name='lengh[]']").map(function(){return $(this).val();}).get();
                    var wth = $("input[name='wth[]']").map(function(){return $(this).val();}).get();
                    var hty = $("input[name='hty[]']").map(function(){return $(this).val();}).get();

                    // EDIT VARIABLE PRODUCT
                    var ids = $("input[name='ids[]']").map(function(){return $(this).val();}).get();
                    var attrs1 = $("select[name='attr1[]']").map(function(){return $(this).val();}).get();
                    var regular1 = $("input[name='regular1[]']").map(function(){return $(this).val();}).get();
                    var sales1 = $("input[name='sales1[]']").map(function(){return $(this).val();}).get();
                    var sku1 = $("input[name='sku1[]']").map(function(){return $(this).val();}).get();
                    var qty1 = $("input[name='qty1[]']").map(function(){return $(this).val();}).get();
                    var stock1 = $("select[name='stock1[]']").map(function(){return $(this).val();}).get();
                    var wty1 = $("input[name='wty1[]']").map(function(){return $(this).val();}).get();
                    var lengh1 = $("input[name='lengh1[]']").map(function(){return $(this).val();}).get();
                    var wth1 = $("input[name='wth1[]']").map(function(){return $(this).val();}).get();
                    var hty1 = $("input[name='hty1[]']").map(function(){return $(this).val();}).get();
                     // NOTE
                    var short_note =  $('textarea[name="short_note"]').val();
 
                //   var status =  $("input[name='status']:checked").val();
                //   var accept =  $("input[name='accept']").val();

                    // BINDING DATA TO DATA FORM 
                    formData.append('id',id);
                    formData.append('product_name',product_name);
                    formData.append('description',description);
                    formData.append('short_description',short_description);
                    formData.append('more_description',more_description);
                    formData.append('category',category);
                    formData.append('image1',image1);
                    formData.append('image2',image2);
                    formData.append('tag',tag);
                    formData.append('visibility',visibility);
                    formData.append('publish',publish);
                    formData.append('featured',featured);

                    // Variable Product
                    formData.append('attrs',attrs);
                    formData.append('regular',regular);
                    formData.append('sales',sales);
                    formData.append('sku',sku);
                    formData.append('qty',qty);
                    formData.append('stock',stock);
                    formData.append('wty',wty);
                    formData.append('lengh',lengh);
                    formData.append('wth',wth);
                    formData.append('hty',hty);


                    //Edit Variable Product
                    formData.append('ids',ids);
                    formData.append('attrs1',attrs1);
                    formData.append('regular1',regular1);
                    formData.append('sales1',sales1);
                    formData.append('sku1',sku1);
                    formData.append('qty1',qty1);
                    formData.append('stock1',stock1);
                    formData.append('wty1',wty1);
                    formData.append('lengh1',lengh1);
                    formData.append('wth1',wth1);
                    formData.append('hty1',hty1);
                    formData.append('short_note',short_note);
                

                //   formData.append('accept',accept);
                //   formData.append('bus_address',bus_address);
                //   formData.append('latitude',latitude);
                //   formData.append('longitudes',longitude);
                    
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });


                    $.ajax({
                        method: 'POST',
                        url: '/admin/product/updateproduct',
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                        
                        console.log(data);
                        // alert(data);
                            
                            // if(data == "success"){
                                
                            // swal( data, "You Have Succesufully Updated", "success").then((value) => {
                            //      location.reload();
                            //     });

                            // }else if(data == "error"){
                                
                            //     swal( data, "Error").then((value) => {
                            //     //location.reload();
                            //     });

                            // }
                            //  location.reload();
                            //  event.target.reset()

                            document.getElementById("sub_btn").innerHTML = "Publish";

                        },
                        
                        error: console.error
                    });
                }else{
                    alert(error);
                }
               // alert(registered_address);
            // BINDING DATA TO DATA FORM
      });
    </script>

{{-- <script type="text/javascript">
    $(function () {
         $('#datetimepicker5').datetimepicker();
     });
</script> --}}


<script type="text/javascript">

    function update_order(id)
    {
      var ele=document.getElementById(id);
      var order_id=document.getElementById(id+"order_id").value;
      var status =document.getElementById(id+"order_name").value;
      var trackingCode = "";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      $.ajax({
        type:'POST',
        url:'/admin/order/updatestatus',
        data:{
          OrderID:order_id,
          status:status,
          trackingCode:trackingCode
        },
        success:function(response){
        
            $('#'+id+'success_message').fadeIn().html(response);  
            setTimeout(function(){  
            $('#'+id+'success').fadeOut("Slow");  
            }, 700); 
           // alert(response);
        }
      });
    
    }
    
    
</script>


{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script>

$(document).ready(function() {

    var oTable = $('#example').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'pdf',
                footer: true,
                exportOptions: {
                        columns: [1,2,3]
                    }
            },
            {
                extend: 'csv',
                footer: true,
                exportOptions: {
                        columns: [1,2,3]
                    }
                
            },
            {
                extend: 'excel',
                footer: true,
                exportOptions: {
                        columns: [1,2,3]
                    }
            },
            {
                extend: 'print',
                footer: true,
                exportOptions: {
                        columns: [1,2,3]
                    }
            }          
        ]  
    });

    var oTable = $('#order_report').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'pdf',
                footer: true,
                exportOptions: {
                        columns: [1,2,3,4]
                    }
            },
            {
                extend: 'csv',
                footer: true,
                exportOptions: {
                        columns: [1,2,3,4]
                    }
                
            },
            {
                extend: 'excel',
                footer: true,
                exportOptions: {
                        columns: [1,2,3,4]
                    }
            },
            {
                extend: 'print',
                footer: true,
                exportOptions: {
                        columns: [1,2,3,4]
                    }
            }          
        ]  
    });

});



    // $(document).ready(function() {
    //     $('#example').DataTable( {
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copy', 'csv', 'excel', 'pdf', 'print'
               
    //         ]
    //         exportOptions: {
    //             columns: [1,2]
    //         }
    //     } );
    // } );
</script>


<script>
      // adding a new location
    $('body').on('click', '.new_product', function (e) {
        e.preventDefault()
        fbody = $(this).closest('div#product')
        frow = $(this).closest('.product-row')
         if($(frow).is(":last-child")){
            var exit = false

            // check if fields are empty before clonning
            // frow.find("input[name='regular']").each(function() {
            //     if(!$(this).val()){
            //          alert("Please enter all required fields")
            //         // swal("Please enter all required fields", "", "error");
            //         exit = true
            //         return false
            //     }
            // })

            if(exit) return false
            // clone row
            new_frow = $(frow).clone()
            // make fields empty after clonning
            new_frow.find("input[type='number']").val("")
            new_frow.find("input[type='hidden']").val("")
            fbody.append(new_frow)
         }
    })


     // removing a location
     $('body').on('click','.remove_product', function (e){
        e.preventDefault()
        fbody = $(this).closest('div#product')

        frow = $(this).closest('.product-row')
        var id = (frow.find("input[type='hidden']").val())
        // count the rumber of children/rows in fbody
        frow = fbody[0].childElementCount;
        // prevent delete if number of rows is one
        if(frow == 1){
            //alert("Cannot be deleted, you need at least one row")
            swal("Cannot be deleted, you need at least one row", "", "error");
            return false
        }

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                if( id != 0){

                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var formData = new FormData();
                        formData.append('id',id);

                        $.ajax({
                            method: 'POST',
                            url: '/admin/product/delete_v',
                            data:formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            success: function(data) {

                                console.log(data);
        
                            },
                            error: console.error
                        });

                }

                    $(this).closest('.product-row').remove()
              
            } else {
                return false
            }
        });
       
    })

</script>

     </body>
 </html>