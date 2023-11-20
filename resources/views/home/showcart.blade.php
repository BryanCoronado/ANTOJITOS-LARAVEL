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
    <link rel="stylesheet" href="homeV2/showcart.css">
</head> 

<body class="body-fixed">
<style>
    .alert-floating {
    border: 2px solid white;
    width: 60%;
    margin: auto;
    top: 110px;
    z-index: 1000;
    background-color: #ffc107; /* Color de fondo */
    color: #333; /* Color del texto */
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    animation: fadeOut 5s ease; /* Animación para desvanecerse */
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
        display: none;
    }
}

</style>




@include('home.header')
<div id="viewport">
    <div id="js-scroll-content">
    @if (session('message'))
        <div class="alert alert-floating">
            {{ session('message') }}
        </div>
    @endif


        <div class="card">

            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>TU CARRITO</b></h4></div>
                            <div class="col align-self-center text-right text-muted">3 items</div>
                        </div>
                    </div>
                    <?php $totalprice = 0 ; ?>
                    @foreach($cart as $cart)    
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="imagen-carrito" src="/product/{{$cart->image}}"></div>
                            <div class="col">
                                <div class="row">{{$cart->product_title}}</div>
                            </div>
                            <div class="col">
                                <a href="#" class="border">{{$cart->quantity}}</a>
                            </div>
                            <div class="col">S/.{{$cart->price}} <a href="{{url('remove_cart',$cart->id)}}"><span class="btn btn-primary">x</span></a></div>
                        </div>
                    </div>
                    <?php $totalprice = $totalprice + $cart->price ; ?>
                    @endforeach
                    
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                    
                </div>



                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    
                    
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">S/. {{ $totalprice}}</div>
                    </div>
                
                        <p>Metodo</p>
                        <div>
                            <a href="{{url('cash_order')}}" class="btn btn-primary" id="pagoContraEntrega">CASH ON DELIVERY</a>
                            <a class="btn btn-primary" href="{{url('stripe',$totalprice)}}" id="pagoConTarjeta">PAGO CON TARJETA</a>
                        </div>


 
                </div>
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
    <script>

    setTimeout(function() {
        var alert = document.querySelector('.alert-floating');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 4000); // Cambia el valor '5000' a la duración deseada en milisegundos
</script>
  

  


   </body>
</html>