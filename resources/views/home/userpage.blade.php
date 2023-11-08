<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antojitos del Mar</title>

    <!----------------------------------------------------- IMPORTANDO LIBRERIA DE ICONOS --------------------------------------------- -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!----------------------------------------------------- IMPORTANDO BOOTSTRAP---------------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/assets/css/bootstrap.min.css">

    <!----------------------------------------------------- IMPORTANDO SLIDER ESTILOS --------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/assets/css/swiper-bundle.min.css">
<!-------------------------------------------------------- IMPORTANDO JQUERY -------------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/assets/css/jquery.fancybox.min.css">

<!----------------------------------------------------- IMPORTANDO MI PROPIO CSS--------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/general.css">
</head> 

   <body class="body-fixed">




              @include('home.header')
              <div id="viewport">
        <div id="js-scroll-content">




                <!-- slider section -->
              @include('home.presentacion')
                <!-- end slider section -->

              <!-- why section -->
              @include('home.nosotros')
              <!-- end why section -->
              @include('home.product')
              <!-- arrival section -->
              @include('home.horarios_slider')

              @include('home.testimonios')

              

              @include('home.footer')

  
              </div>
    </div>


    <script src="homeV2/assets/js/jquery-3.5.1.min.js"></script>
    <script src="homeV2/assets/js/bootstrap.min.js"></script>
    <script src="homeV2/assets/js/popper.min.js"></script>
    <script src="homeV2/assets/js/font-awesome.min.js"></script>
    <script src="homeV2/assets/js/swiper-bundle.min.js"></script>
    <script src="homeV2/assets/js/jquery.mixitup.min.js"></script>
    <script src="homeV2/assets/js/jquery.fancybox.min.js"></script>
    <script src="homeV2/assets/js/parallax.min.js"></script>
    <script src="homeV2/assets/js/gsap.min.js"></script>
    <script src="homeV2/assets/js/ScrollTrigger.min.js"></script>
    <script src="homeV2/assets/js/ScrollToPlugin.min.js"></script>

    <script src="homeV2/assets/js/smooth-scroll.js"></script>
    <script src="homeV2/main.js"></script>
  

  


   </body>
</html>