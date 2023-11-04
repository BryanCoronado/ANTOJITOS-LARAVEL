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
               
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <div class="form-container">
                    <form class="form" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="title">AGREGAR PRODUCTOS </p>
                        <p class="message">completa todos los espacios </p>
                              
                                
                        <label>
                            <input class="input" type="text"  name="title" placeholder="" required="">
                            <span>tiutlo</span>
                        </label> 
                            
                        <label>
                            <input class="input" type="text"  name="description" placeholder="" required="">
                            <span>Descripcion</span>
                        </label>
                        <label>
                            <input class="input" type="number"  name="price" placeholder="" required="">
                            <span>precio</span>
                        </label>
                        <div class="flex">
                              <label>
                                  <input class="input" type="number"  name="dis_price" placeholder="" required="">
                                  <span>descuento</span>
                              </label>

                              <label>
                                  <input class="input" type="number"  name="quantity" placeholder="" required="">
                                  <span>cantidad</span>
                              </label>
                             </div>
                      
                             <label>
                                <select class="input" required name="catagory">
                                  <option value="" selected disabled>Selecciona una categoría</option>
                                  @foreach($catagory as $catagory)
                                  <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                  @endforeach
                                </select>
                                <span>Categoría</span>
                              </label>


                              <div class="input">
                                  <label class="input">Imagen del Producto: </label>
                                  <input type="file" name="image">
                              </div>
                         
                        
                        <button type="submit" class="submit">agregar</button>
                    </form>
                    <div class="image-container">
                    <img src="admin/assets/images/chef-png.png" alt="logo" />                    
                    </div>


                    
                </div>
        </div>
        @include('admin.script')
</body>
</html>


