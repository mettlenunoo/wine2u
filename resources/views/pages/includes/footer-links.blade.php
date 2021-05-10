     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="/page_assets/js/jquery-3.5.1.js"></script>
    <script src="/page_assets/js/popper.min.js"></script>
    <script src="/page_assets/js/bootstrap.js"></script>
    <script src="/page_assets/plugins/owlcarousel/owl.carousel.min.js" ></script>

    <script src="/page_assets/js/app.js"></script>
    <script src="/page_assets/js/script.js"></script>
    <script src="/page_assets/js/checkout.js"></script>


    <script src="/page_assets/plugins/wow/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
   
   <!-- mobile navigation -->
   <script>
    function openNavwhole() {
      document.getElementById("myNavwhole").style.height = "100%";
    }
    
    function closeNavwhole() {
      document.getElementById("myNavwhole").style.height = "0%";
    }
    </script>
       <!-- mobile navigation -->
    
         <!--web mobile nav slide in dropdown -->
         <script>
           $('.dropdown').on('show.bs.dropdown', function(e){
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
          });
    
          $('.dropdown').on('hide.bs.dropdown', function(e){
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
          });
              </script>
       <!--web mobile nav slide in dropdown  -->
    
    
       <!-- cart drawer -->
       <script>
    function openNav() {
    
    
      document.getElementById("mySidenav").classList.add('expand');
      // document.getElementById("mySidenav").style.width = "40%";
    
     // document.getElementById("main").style.marginright = "0";
      // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
    
    function closeNav() {
      
      document.getElementById("mySidenav").classList.remove('expand');
     // document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
    </script>
       <!-- cart Drawer -->