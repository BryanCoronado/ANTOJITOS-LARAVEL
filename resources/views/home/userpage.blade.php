<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antojitos del Mar</title>

    <!-- Importando librería de iconos -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Importando Bootstrap -->
    <link rel="stylesheet" href="homeV2/assets/css/bootstrap.min.css">

    <!-- Importando Slider Estilos -->
    <link rel="stylesheet" href="homeV2/assets/css/swiper-bundle.min.css">

    <!-- Importando jQuery -->
    <link rel="stylesheet" href="homeV2/assets/css/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Importando tu propio CSS -->
    <link rel="stylesheet" href="homeV2/general.css">
</head>

<body class="body-fixed">

    <!-- Header Section -->
    @include('home.header')

    <div id="viewport">
        <div id="js-scroll-content">

            <!-- Slider Section -->
            @include('home.presentacion')
            <!-- End Slider Section -->

            <!-- Why Section -->
            @include('home.nosotros')
            <!-- End Why Section -->

            <!-- Product Section -->
            @include('home.product')

            <!-- Comments Section -->
            <div style="text-align: center;">
                <h1 style="font-size: 24px; margin-bottom: 20px;">Comentarios</h1>
                <form style="display: flex; flex-direction: column; align-items: center;" action="{{url('add_comment')}}" method="POST">
                    @csrf
                    <textarea name="comment" placeholder="Comentario" style="height: 150px; width: 600px; margin-bottom: 10px;"></textarea>
                    <input type="submit" class="btn btn-primary" value="Comment">
                </form>
            </div>

            <div style="padding-left: 20%;">
                <h1 style="font-size: 20px; padding-bottom: 20px;">Todos los comentarios</h1>
                @foreach($comment as $comment)
                <div>
                    <b>{{$comment->name}}</b>
                    <p>{{$comment->name}}</p>
                    <a href="javascript::void(0); " onclick="reply(this)">Responder</a>
                </div>
                @endforeach

                <div style="display: none;" class="replyDiv">
                    <textarea style="height: 100px; width: 500px;" placeholder="Respondiendo"></textarea>
                    <br>
                    <a class="btn btn-primary" href="">Responder</a>
                </div>
            </div>

            <!-- Horarios Slider Section -->
            @include('home.horarios_slider')

            <!-- Testimonios Section -->
            @include('home.testimonios')

            <!-- Footer Section -->
            @include('home.footer')

        </div>
    </div>

    <script type="text/javascript">
        function reply(caller) {
            $('.replyDiv').insertAfter($(caller).parent());
            $('.replyDiv').show();
        }
    </script>

    <!-- Importando Scripts JS -->
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
