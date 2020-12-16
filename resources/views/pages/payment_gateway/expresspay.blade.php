<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
  <?php header('Access-Control-Allow-Origin: *'); ?>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>expressPay</title>

 <h2>Please Wait, Loading...</h2>
 

<script src="{{ asset('/store_assets/js/jquery-3.5.1.js') }}"></script>

<script type="text/javascript">

//
$(window).on('load', function() {  
  
  expressPay();

 });

  function expressPay(){
    
    //var checkout = 'https://sandbox.expresspaygh.com/api/checkout.php?token=';
    var checkout = "https://expresspaygh.com/api/checkout.php?token=";


    $.ajax({
          type:'GET',
          url: "/expresspay/processor",
         // data:formData,
          contentType:false,
          cache: false,
          processData:false,
         
          success:function(response){
          //  console.log(response);
            var obj = JSON.parse(response);

          if(obj.message == "Success"){

              $checkoutLink = checkout+obj.token;
              window.location.replace($checkoutLink);
              //console.log(obj.token);
          }else{

          // window.location.replace('/404');
           console.log(obj);

          }
            
          }
       });

 // });
  }
   
</script>


</head>
<body>
</html>





