<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <link rel="stylesheet" href="admin/assets/css/formularios.css">
  @include('admin.css')

  <style>
    .text_color{
      color: #000 !important;
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
               
                <div class="div_center">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                    <h1 class="font_size">Agregar Productos</h1>
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div-design">
                            <label>Nombre del Producto: </label>
                            <input class="text_color" type="text" name="title" placeholder="Escriba un titulo">
                        </div>
                        <div class="div-design">
                            <label>Descripción del Producto: </label>
                            <input class="text_color" type="text" name="description" placeholder="Escriba una descripción">
                        </div>
                        <div class="div-design">
                            <label>Precio del Producto: </label>
                            <input class="text_color" type="number" name="price" placeholder="Escriba un precio">
                        </div>
                        <div class="div-design">
                            <label>Descuento del Producto: </label>
                            <input class="text_color" type="number" name="dis_price" placeholder="Escriba un titulo">
                        </div>
                        <div class="div-design">
                            <label>Cantidad del Producto: </label>
                            <input class="text_color" type="number" min="0" name="quantity" placeholder="Escriba una cantidad">
                        </div>
                        <div class="div-design">
                            <label>Categoría del Producto: </label>
                            <select class="text_color" name="catagory">
                                <option value="" selected="">Seleccionar categoría aquí</option>
                                @foreach($catagory as $catagory)
                                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div-design">
                            <label>Imagen del Producto: </label>
                            <input type="file" name="image">
                        </div>
                        <div class="div-design">
                            <input type="submit" value="Agregar Producto" class="btn btn-success">
                        </div>
                    </form>
                </div>
           
        </div>
        @include('admin.script')
</body>
</html>


