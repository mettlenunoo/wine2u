
// SINGLE PAGE 

    function addToCart()
    {
    var prouctID = document.getElementById("vproductId").value;
    var prouctQty = document.getElementById("quantity").value;

    //alert(prouctID);

    document.getElementById("addbtn").innerHTML = "Loading...";
    // toastr.success('Loading...');
    // var ele=document.getElementById(id);
        $.ajax({

            type:'GET',
            url:'/product/addtocard/'+prouctID+'/'+prouctQty,
            success:function(response){

            document.getElementById("myCart").innerHTML = response['0']; //response;
            document.getElementById("total_items").innerHTML = response['1']; //response;
            document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;

            // open Drawer
            //openNav();

            // open Drawer
            document.getElementById("opencart").className += " open";

            // toastr.success('Product Added to Cart');
            document.getElementById("addbtn").innerHTML = "Add to bag";

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

                  document.getElementById("myCart").innerHTML = response['0']; //response;
                  document.getElementById("total_items").innerHTML = response['1']; //response;
                  document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;  
                  document.getElementById("grossTotal").innerHTML = response['2']; //response;  grossTotal cart page
                  document.getElementById(prouctID+"_cartSubTotal").innerHTML = response['3']; //response; cart page
                
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

                  document.getElementById("myCart").innerHTML = response['0']; //response;
                  document.getElementById("total_items").innerHTML = response['1']; //response;
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
        //alert(response[0]);
        document.getElementById("price_section").innerHTML = response[0]; //response;
        document.getElementById("quantity").innerHTML = response[1]; //response;
        document.getElementById("vproductId").value = id.value; //response;

        }
    });


}



function shiprate(zone)
{

    //toastr.success('Product Added to Cart');
    var weight = document.getElementById("prod_weight").value;
    var totalAmt = document.getElementById("totalamount").value;
    var country = $("#ship_input option:selected").text();
      //alert(zone.value + " "+ weight);
    $.ajax({
        type:'GET',
        url:'/checkout/rate/'+zone.value+'/'+weight,
        success:function(response){
        var net_cost = parseFloat(totalAmt) + parseFloat(response);
        //console.log(response);
        //alert(net_cost);

        document.getElementById("shpiamt").innerHTML = response; //response;
        document.getElementById("shipamt1").value = response; //response;
        document.getElementById("netTotalAmt").innerHTML = parseFloat(net_cost).toFixed(2); //response;
        //console.log(parseFloat(net_cost).toFixed(2))
         // return country text
        document.getElementById("ship_return").value = country; //response;

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


function deleteCartPage(key)
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
              document.getElementById("total_items").innerHTML = response['1']; //response;
              document.getElementById("cartTotalItems").innerHTML = response['1']; //response;  Total Price
              document.getElementById("cartTotalAmt").innerHTML = response['2']; //response;  
              document.getElementById("grossTotal").innerHTML = response['2']; //response;  grossTotal cart page
    
              setTimeout(function(){  
                $('#'+key+'_cartPage').fadeOut("Slow");  
              }, 700);
    
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
  
