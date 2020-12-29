// const { get } = require("jquery");

// $(window).bind("pageshow", function () {
//     $("#inputState").val('');
//     // $("#another_id").val('');
// });

// SINGLE PAGE 

function addToCart(id='')
{
      var prouctID = document.getElementById(id+"vproductId").value;
      var prouctQty = document.getElementById(id+"qty_input").value;

      if(id == ''){
        document.getElementById("addbtn").innerHTML = "Loading...";
      }

      $.ajax({

          type:'GET',
          url:'/product/addtocard/'+prouctID+'/'+prouctQty,
          success:function(response){

          document.getElementById("totalItems").innerHTML = response['0']; //response;
          document.getElementById("mTotalItems").innerHTML = response['0']; //response;
          
          if(id == ''){
              document.getElementById("addbtn").innerHTML = "Add To Cart";
          }

          document.getElementById("myCart").innerHTML = response['5']; //response;

          openNav();
          //window.location.replace("/cart");

          }
      });

}


    // CART PAGE 

  function EditToCart(id)
  {

        var prouctID =  id;
        var prouctQty = document.getElementById(id+"_quantity").value;

          $.ajax({
  
              type:'GET',
              url:'/product/addtocard/'+prouctID+'/'+prouctQty,
              success:function(response){
                //console.log(response);
              //document.getElementById("myCart").innerHTML = response['0']; //response;
              document.getElementById("totalItems").innerHTML = response['0']; //response;
              document.getElementById("mTotalItems").innerHTML = response['0']; //response;
            //  document.getElementById("cartTotalAmt").innerHTML = response['1']; //response; 
              document.getElementById("subTotal").innerHTML = response['1']; //response;  grossTotal cart page 
              document.getElementById("grossTotal").innerHTML = response['2']; //response;  grossTotal cart page
              document.getElementById(prouctID+"_cartSubTotal").innerHTML = response['3']; //response; cart page
              document.getElementById("discount").innerHTML = response['4']; //response; cart page
              document.getElementById("myCart").innerHTML = response['5']; //response;
            
              }
          });
  }

   // MOBILE CART

  function MeditToCart(id)
  {

        var prouctID =  id;
        var prouctQty = document.getElementById(id+"_mobileQuantity").value;

          $.ajax({
  
              type:'GET',
              url:'/product/addtocard/'+prouctID+'/'+prouctQty,
              success:function(response){

             // document.getElementById("myCart").innerHTML = response['0']; //response;
              document.getElementById("total_items").innerHTML = response['1']; //response;
              document.getElementById("myCart").innerHTML = response['5']; //response;
              document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;  
              document.getElementById("mobileGrossTotal").innerHTML = response['2']; //response;  grossTotal cart page
              document.getElementById(prouctID+"_mobileCartSubTotal").innerHTML = response['3']; //response; cart page
              
            
              }
          });
  }


// SINGLE PAGE 

function getval(id)
{

//var ele=document.getElementById(id);
$.ajax({
    type:'GET',
    url:'/product/changevarprod/'+id.value,
    success:function(response){
    document.getElementById("price_section").innerHTML = response[0]; //response;
    //document.getElementById("quantity").innerHTML = response[1]; //response;
    //document.getElementById("sku").innerHTML = response[2]; //response;
    document.getElementById("vproductId").value = id.value; //response;

    }
});


}



function shiprate(zone)
{
    var totalAmt =  $(".total-amt").val();

    $.ajax({
        type:'GET',
        url:'/checkout/rate/'+zone.value,
        success:function(response){
        var total = parseFloat(totalAmt) + parseFloat(response);
       
        $(".total-amt").val(total.toFixed(2));
        $(".total-amount").html(total.toFixed(2));

        $(".shipping").val(parseFloat(response).toFixed(2));
        $(".shipping-amount").html(parseFloat(response).toFixed(2));

        console.log(response);
  
        }
      });
}

function cart(id)
{

// alert(id);
//toastr.success('Product Added to Cart');

var ele=document.getElementById(id);
$.ajax({
    type:'GET',
    url:'/product/addtocard/'+id,
    success:function(response){
        //console.log(response['0']);
    document.getElementById("myCart").innerHTML = response['0']; //response;
    document.getElementById("total_items").innerHTML = response['1']; //response;
    document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;
    console.log(response['2']);
    // open Drawer
    document.getElementById("opencart").className += " open";

    }
});

}


function deleteCartPage(key,page = "")
{

swal({
title: "Are you sure You want to Delete?",
// text: "Once deleted, you will not be able to recover this imaginary file!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {

      $.ajax({
        type:'GET',
        url:'/cart/delete/'+key,

        success:function(response){
          
          document.getElementById("myCart").innerHTML = response['0']; //response;
          document.getElementById("totalItems").innerHTML = response['1']; 
          document.getElementById("mTotalItems").innerHTML = response['1']; 
            // document.getElementById("myCart").innerHTML = response['2']; 
          if(page != ""){

              document.getElementById("grossTotal").innerHTML = response['2'];
              document.getElementById("subTotal").innerHTML = response['2']; 
              setTimeout(function(){  
                $('#'+key+'_cartPage').fadeOut("Slow");  
              }, 700);
  
          }

        }

      });
} 

});

// var r = confirm("Are you sure You want to Delete");
//    if (r == true) {

//       $.ajax({
//         type:'GET',
//         url:'/cart/delete/'+key,

//         success:function(response){
     
//           document.getElementById("myCart").innerHTML = response['0']; //response;
//           document.getElementById("total_items").innerHTML = response['1']; //response;
//           document.getElementById("cartTotalItems").innerHTML = response['1']; //response;  Total Price
//           document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;  
//           document.getElementById("grossTotal").innerHTML = response['2']; //response;  grossTotal cart page

//           setTimeout(function(){  
//             $('#'+key+'_cartPage').fadeOut("Slow");  
//           }, 700);

//         }

//       });

//    }
}

function mDeleteCartPage(key)
{

var r = confirm("Are you sure You want to Delete");
if (r == true) {

  $.ajax({
    type:'GET',
    url:'/cart/delete/'+key,

    success:function(response){
     
      document.getElementById("myCart").innerHTML = response['0']; //response;
      document.getElementById("total_items").innerHTML = response['1']; //response;
      document.getElementById("mobileCartTotalItems").innerHTML = response['1']; //response;  Total Price
      document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;  
      document.getElementById("mobileGrossTotal").innerHTML = response['2']; //response;  grossTotal cart page

      setTimeout(function(){  
        $('#'+key+'_mobileCartPage').fadeOut("Slow");  
      }, 700);

    }

  });

}
}




function deleteCart(key)
{

var r = confirm("Are you sure You want to Delete");
if (r == true) {

$.ajax({
type:'GET',
url:'/product/delete/'+key,
success:function(response){

document.getElementById("total_items").innerHTML = response['0'];
document.getElementById("cartTotalAmt").innerHTML = response['1']; //response;
// open Drawer
//    document.getElementById("opencart").className += " open";

setTimeout(function(){  
  $('#'+key+'cart').fadeOut("Slow");  
}, 700);

// toastr.success('Deleted Successfully');
// document.getElementById("myCart").innerHTML = response; //response;
}
});
}
}




$('#subscribe_form').submit(function(event) {
event.preventDefault();

var email = document.getElementById("subscribe_email").value;
var shopid = document.getElementById("shopId").value;

// Disable the Submit button
document.getElementById("subscribe_btn").innerHTML = "Loading...";
$("#subscribe_btn").attr("disabled", true);

// BINDING DATA TO DATA FORM
var formData = new FormData();
formData.append('email',email);
formData.append('shopid',shopid);

$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
type:'POST',
url:'/subscribes',
data:formData,
cache:false,
contentType: false,
processData: false,
success:function(response){

  $('#subscribe_form').trigger("reset");
  if(response == "success"){ 

     $("#subscribe_btn").attr("disabled", true);
     document.getElementById("subscribe_btn").innerHTML = "Subscribed";

    //swal( " Thank You ", "Subscribed Successfully", "success");
  }else{

      // Enable the Submit button
    $("#subscribe_btn").attr("disabled", false);
    document.getElementById("subscribe_btn").innerHTML = "try again";
   // swal( "Whoops", "There is an error. Please try again", "error");
  }

  

}
});

});

function hideCookie(){
$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

$.ajax({
      type:'GET',
      url:'/cookies',
      success:function(response){
     
      console.log(response);
      $('#cookies').fadeOut();

      }
    });


}

    
//   $(document).ready(function(){

// $('#search').keyup(function(){
// //alert('man');
//          $('#result').html('');
//  var search = document.getElementById("search").value;

//  if(search == ''){
//    $('#result').html('');	 
//  }else{

//   var country = document.getElementById("country").value;
//   var shopid = document.getElementById("shopId").value;

//   // BINDING DATA TO DATA FORM
//   var formData = new FormData();
//   formData.append('name',search);
//   formData.append('shop_id',shopid);
//   formData.append('country',country);

//   $.ajaxSetup({
//     headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//   });
// //alert(search);
//   $.ajax({
//      type: "POST",
//      data: formData,
//      url: "/product/search",
//      cache:false,
//      contentType: false,
//      processData: false,
//      success: function(msg){
//      $('#result').append(msg);
  
//      //console.log(msg);

//      //document.getElementById("result").innerHTML = msg; //response;
//      //document.getElementById("lod").innerHTML = "";
//      }
//   });
       
//  } // END OF IF STATEMENT

// });
// });


// $(document).ready(function(){

//   $('#search_mobile').keyup(function(){
//   //alert('man');
//            $('#result_mobile').html('');
//    var search = document.getElementById("search_mobile").value;

//    if(search == ''){
//      $('#result_mobile').html('');	 
//    }else{

//     var country = document.getElementById("country").value;
//     var shopid = document.getElementById("shopId").value;

//     // BINDING DATA TO DATA FORM
//     var formData = new FormData();
//     formData.append('name',search);
//     formData.append('shop_id',shopid);
//     formData.append('country',country);

//     $.ajaxSetup({
//       headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//   //alert(search);
//     $.ajax({
//        type: "POST",
//        data: formData,
//        url: "/product/search",
//        cache:false,
//        contentType: false,
//        processData: false,
//        success: function(msg){
//        $('#result_mobile').append(msg);
    
//        //console.log(msg);

//        //document.getElementById("result").innerHTML = msg; //response;
//        //document.getElementById("lod").innerHTML = "";
//        }
//     });
         
//    } // END OF IF STATEMENT

//   });
// });


function FillBilling(f) {

    if(f.billingtoo.checked == true) {

          f.shipping_fname.value = f.bill_fname.value;
          f.shipping_last.value = f.bill_lname.value;
          f.shipping_email.value = f.bill_email.value;
          f.shipping_pnumber.value = f.bill_phonenumber.value;
        // f.shippingcountry.value = f.billingcountry.value;
          f.shipping_state.value = f.bill_region.value;
          f.shipping_city.value = f.bill_city.value;
          f.shipping_street.value = f.bill_street.value;
          f.shipping_apartment.value = f.bill_apartment.value;
          f.shipping_zipcode.value = f.bill_zipcode.value;
    
    }else{

          f.shipping_fname.value = "";
          f.shipping_last.value = "";
          f.shipping_email.value = "";
          f.shipping_pnumber.value = "";
          f.shipping_state.value = "";
          f.shipping_city.value = "";
          f.shipping_street.value = "";
          f.shipping_apartment.value = "";
          f.shipping_zipcode.value = "";

    }

}


function billing_summary() {
  
  document.getElementById("billingFullname").innerHTML = document.getElementById("bill_fname").value +" "+ document.getElementById("bill_lname").value;
  document.getElementById("billingPhoneNumber").innerHTML = document.getElementById("bill_phonenumber").value;
  document.getElementById("billingCountry").innerHTML = document.getElementById("bill_country").value;
  document.getElementById("billingState").innerHTML = document.getElementById("bill_region").value;
  document.getElementById("billingCity").innerHTML = document.getElementById("bill_city").value;
  document.getElementById("billingStreet").innerHTML = document.getElementById("bill_street").value;
  document.getElementById("billingApartment").innerHTML = document.getElementById("bill_apartment").value;
  document.getElementById("billingZipcode").innerHTML = document.getElementById("bill_zipcode").value;

  document.getElementById("shippingFullname").innerHTML = document.getElementById("shipping_fname").value;
  document.getElementById("shippingEmail").innerHTML = document.getElementById("shipping_last").value;
  document.getElementById("shippingPhoneNumber").innerHTML = document.getElementById("shipping_email").value;
  document.getElementById("shippingCountry").innerHTML =  $("#shipping_country option:selected").html();
  document.getElementById("shippingState").innerHTML = document.getElementById("shipping_state").value;
  document.getElementById("shippingCity").innerHTML = document.getElementById("shipping_city").value;
  document.getElementById("shippingStreet").innerHTML = document.getElementById("shipping_street").value;
  document.getElementById("shippingApartment").innerHTML = document.getElementById("shipping_apartment").value;
  document.getElementById("shippingZipcode").innerHTML = document.getElementById("shipping_zipcode").value;

  // document.getElementById("shipping_country").value

  $('.payment_method:checked').each(function(){

    document.getElementById("summary_payment_method").innerHTML  = $(this).val();
  
  });

}


function checkclass(){

  $('.totalAmm').html("manan");

}





$('#profile_form').submit(function(event) {
  event.preventDefault();

  var firstname = document.getElementById("firstname").value;
  var lastname = document.getElementById("lastname").value;
  var email = document.getElementById("email").value;
  var phoneNumber = document.getElementById("phoneNumber").value;
  var country = document.getElementById("country").value;
  var state = document.getElementById("state").value;
  var city = document.getElementById("city").value;
  var street = document.getElementById("street").value;
  var apartment = document.getElementById("apartment").value;
  var zip = document.getElementById("zip").value;

  // Disable the Submit button
  document.getElementById("profile_btn").innerHTML = "Loading...";
  $("#profile_btn").attr("disabled", true);

  // BINDING DATA TO DATA FORM
  var formData = new FormData();
  formData.append('firstname',firstname);
  formData.append('lastname',lastname);
  formData.append('email',email);
  formData.append('phoneNumber',phoneNumber);
  formData.append('country',country);
  formData.append('state',state);
  formData.append('city',city);
  formData.append('street',street);
  formData.append('apartment',apartment);
  formData.append('zip',zip);


  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      type:'POST',
      url:'account/profile/update',
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(response){
        
           console.log(response);

          if(response == "success"){ 

            document.getElementById("addressMessage").innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Profile updated successfully. </strong> </div>';

          }else{
        
            document.getElementById("addressMessage").innerHTML = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Whoops, There is an error. Please try again </strong> </div>';
         
          }

          $("#profile_btn").attr("disabled", false);
          document.getElementById("profile_btn").innerHTML = "Save Changes";
      
      }
  });

});




 function addCoupon(coupon_code){
   
 // var coupon_code =  $(".coupon-code").val();

  if(coupon_code == ""){

    $(".coupon_message").html(`<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Please Enter Your Coupon Code </strong> </div>`);

    return false;
  }
 
  // Disable the Submit button
  $(".couponAdd").html("Loading...");
  $(".couponAdd").attr("disabled", true);

  // BINDING DATA TO DATA FORM
  var formData = new FormData();
  formData.append('coupon_code',coupon_code);

  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      type:'POST',
      url:'/coupon',
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(response){
        
           console.log(response);

          if(response['type'] == "success"){ 

            $(".coupon_message").html(`<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>`+ response['message'] + ` </strong> </div>`);

            var discount = response['discount'];
            var subtotal =  $(".subtotal").val();
            var shipping = $(".shipping").val();
            var tax = $(".tax").val();
            var total = 0.0;

            var total = (parseFloat(subtotal) + parseFloat(shipping) + parseFloat(tax)) - parseFloat(discount) ;
    
            $(".discount").val(parseFloat(discount));
            $(".discount-amount").html(parseFloat(discount).toFixed(2));
            $(".total-amt").val(total.toFixed(2));
            $(".total-amount").html(total.toFixed(2));


          } else if(response['type'] == "error") {
        
            $(".coupon_message").html(`<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> `+ response['message'] + ` </strong> </div>`)
         
          } 

          $(".couponAdd").attr("disabled", false);
          $(".couponAdd").html("Apply");
      
      }
  })

}