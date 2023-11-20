<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> categorias</title>

    <!-- plugins:css -->
    @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align:center;
            padding: 40px;

        }
        .font2{
            font-size:40px;;
            padding-bottom:40px;
        }
        .input_color{
          color: #000 !important;
        }
        .center{
          margin:auto;
          width: 50%;
          text-align:center;
          margin-top:30px;
          border:3px solid white
          
        }
        .categoria{
          color: white;
        }
        .custom-alert {
    background-color: #f8d7da; /* Fondo rojo */
    color: #721c24; /* Texto rojo oscuro */
    padding: 10px;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    position: relative;
    animation: fadeOut 4s ease-in-out; /* Animación de desvanecimiento */
}

@keyframes fadeOut {
    0% { opacity: 1; }
    50% { opacity: 1; }
    100% { opacity: 0; }
}

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- barra lateral -->
      @include('admin.barraLateral')

      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        <!-- navbar -->


     <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('messege'))
    <div class="alert custom-alert" id="success-alert">
        {{ session()->get('messege') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
@endif



            <div class="div_center">
                <h2 class="font2">agregar categorias</h2>

                <form action="{{url('/add_catagory')}}" method="POST" >

                @csrf 

                <label>
         


                <input style='color:black;' class="input" type="text" class="input_color" name="catagory" placeholder="Escribe la categoría" required>
                <input type="submit" class="btn btn-primary" name="submit" value="agregar">
                </form>

            </div>

            <table class="center">
              <tr>
                <td>CATEGORIA NOMBRE</td>
                <td>ACCION</td>
              </tr>

              @foreach($data as $data)
              <tr>
                <td class="categoria">{{$data->catagory_name}}</td>


                <td>
                  <a onclick="return confirm('Seguro que quieres eliminar la acaregoria')" href="{{url('delete_catagory',$data->id)}}" class="btn btn-danger">eliminar</a>
                </td>
              </tr>
              @endforeach
            </table>


          </div>  
    </div>
      </div>
    </div>
    @include('admin.script')

    <script>
  // Espera a que el documento esté completamente cargado
  document.addEventListener("DOMContentLoaded", function () {
    // Obtiene la alerta
    var alert = document.getElementById("success-alert");

    // Muestra la alerta
    alert.style.display = "block";

    // Desaparece la alerta después de 2 segundos (2000 milisegundos)
    setTimeout(function () {
      alert.style.display = "none";
    }, 1500);
  });
</script>

  </body>
</html>