<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Haute Vie - Test</title>
		<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
 

	</head>
	<body>
	    <h1> Tronomie </h1>
	    <button onclick="test()"> Send Message </button>
	    
	    
	    <script>
	    function test(){
	        
	        var payload = {
	            "pid": "321",
	            "category": "A&B&C&D", 
	            "date": "2019-08-18",
	            "detail_content": " asda adhs ashd hd a ds",
	            "featured": "adsad",
	            "height": "12",
	            "img1": "adkasd",
	            "img2": "adjd",
	            "length": "10",
	            "publish": "Yes",
	            "qty": "3",
	            "regular_gh": "30",
	            "regular_us": "10",
	            "sales_gh": "20",
	            "sales_us": "4",
	            "sku": "NA",
	            "slug": "hut/",
	            "stock": "in-stock",
	            "title": "bondee",
	            "weight": "30.0",
	            "width": "40.0"	            
	        };
	        
	         $.ajax({
                type: 'POST',
                url: 'https://hvafrica-85e6e.firebaseapp.com/api/update-product',
                data: payload,
                dataType: 'json',						
                success: function(response){
                    console.log(JSON.stringify(response));
                }, error: function(error){
                    alert(error);
                }
	         });
	        
	    }
	    
	    

	    
	    </script>
	</body>

<?php
 
   

?>