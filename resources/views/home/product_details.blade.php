<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antojitos del Mar</title>

    <base href="/public">

    <!----------------------------------------------------- IMPORTANDO LIBRERIA DE ICONOS --------------------------------------------- -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!----------------------------------------------------- IMPORTANDO BOOTSTRAP---------------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/assets/css/bootstrap.min.css">

    <!----------------------------------------------------- IMPORTANDO SLIDER ESTILOS --------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/assets/css/swiper-bundle.min.css">
<!-------------------------------------------------------- IMPORTANDO JQUERY -------------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/assets/css/jquery.fancybox.min.css">

<!----------------------------------------------------- IMPORTANDO MI PROPIO CSS--------------------------------------------- -->
    <link rel="stylesheet" href="homeV2/general_detalles.css">
    <link rel="stylesheet" href="homeV2/general.css">
</head> 

   <body class="body-fixed">


     @include('home.header')


    <div id="viewport">

        
        <div id="js-scroll-content">

        <div class="box">

        
            <div class="images">
                <div class="img-holder active">
                    <img src="product/{{$product->image}}">
                </div>
            </div>
            <div class="basic-info">
          
                
                
                <h1>{{$product->title}}</h1>
                
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                </div>
                <div class="precios">
                </div>
                <div class="precios">
                    <span style="text-decoration: line-through; color: black; margin-right: 5px;">S/.{{$product->price}}</span>
                    <span style="color: red; margin-left: 30px;"> oferta</span>
                    <span style="background-color: red; color: white; border-radius: 50%; padding: 5px;">S/.{{$product->discount_price}}</span>
                    
                </div>
                
                <form action="{{url('add_card',$product->id)}}" method="Post">
                     @csrf
                    <div>
                        <input type="number" name="quantity" value="1" min="1">
                            
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" value="agegar">
                    </div>
                </form>

                



            </div>
            <div class="description">
                <h2 class="descripcion">{{$product->description}}</h2>
                <ul class="features">
                    <li><i class="fa-solid fa-circle-check"></i>{{$product->catagory}}</li>
                </ul>
                <ul class="social">
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>


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
    <script src="homeV2/conexion.js" ></script>

  


   </body>
</html>