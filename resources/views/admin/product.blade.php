<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>dmin</title>
  <link rel="stylesheet" href="admin/assets/css/formularios.css">
  @include('admin.css')

  <style>
    .input{
      color: #000;
    }
    .custom-alert {
    background-color: #f8d7da; 
    color: #721c24;
    padding: 10px;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    position: relative;
    animation: fadeOut 4s ease-in-out; 
}

</style>

</head>
<body>
  <div class="container-scroller">
    @include('admin.barraLateral')
    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper">
      


<form class="form" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
@if(session()->has('messege'))
    <div class="alert custom-alert" id="success-alert">
        {{ session()->get('messege') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
@endif
        @csrf
        <p class="title">Agregar productos</p>
        <p class="message">Debes llenar todos los campos requeridos</p>
        <label>
       
          <input class="input" type="text" placeholder="" required="" name="title">
          <span>Titulo del producto</span>
        </label>
        <label>
          <input class="input" type="text" placeholder="" required="" name="description">
          <span>Descripción del producto</span>
        </label>
        <div class="flex">
          <label>
            <input class="input" type="number" placeholder="" required="" name="price">
            <span>Precio</span>
          </label>
          <label>
            <input class="input" type="number" placeholder="" required="" name="discount_price">
            <span>Descuento</span>
          </label>
          
        </div>
        <div class="flex  ">
          <label>Categoría</label>
          <select class="input" name="" id="" name="category">
            <option value="" select="">agregar categoria</option>

            @foreach ($category as $category)

            <option value="{{$category->category_name}}">{{$category->category_name}}</option>

            @endforeach


          </select>
          <label>
            <input class="input" type="text" placeholder="" required="" min="0" name="quantity">
            <span>Cantidad</span>
          </label>

          </div>
          <label for=""> imagen del prducto</label>
          <input type="file" name="image">
        <button type="submit" class="submit">agregar</button>
        
      </form>
      <div class="image-container">  
      <img src="images/chef-png.png" alt="image">
      
    </div>
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
