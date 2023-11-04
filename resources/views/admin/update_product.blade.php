<!DOCTYPE html>
<html lang="en">
<head>

  <base href="/public">
  @include('admin.css')
  <link rel="stylesheet" href="admin/assets/css/formulario_update.css">

   
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
    .imagen_producto_formulario{
        border-radius: 20px;
        border: 4px solid green;
    }
  </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.barraLateral')
        @include('admin.navbar')
       
        <div class="container-fluid page-body-wrapper">
               

                <div class="form-container">

                    <form class="form" action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                        <p class="title">EDITAR PRODUCTO</p>
                        <p class="message"></p>
                              
                                
                        <label>
                            <input class="input" type="text" value="{{$product->title}}"  name="title" placeholder="" required="">
                            <span>tiutlo</span>
                        </label> 
                            
                        <label>
                            <input class="input" type="text" value="{{$product->description}}" name="description" placeholder="" required="">
                            <span>Descripcion</span>
                        </label>
                        <label>
                            <input class="input" type="number" value="{{$product->price}}"  name="price" placeholder="" required="">
                            <span>precio</span>
                        </label>
                        <div class="flex">
                              <label>
                                  <input class="input" type="number" value="{{$product->discount_price}}"  name="dis_price" placeholder="" required="">
                                  <span>descuento</span>
                              </label>

                              <label>
                                  <input class="input" type="number" value="{{$product->quantity}}"  name="quantity" placeholder="" required="">
                                  <span>cantidad</span>
                              </label>
                             </div>
                      
                             <label>
                                <select class="input" required name="catagory">
                                  <option value="{{$product->catagory}}" selected disabled>{{$product->catagory}}</option>
                                  @foreach($catagory as $catagory)
                                  <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                  @endforeach
                                </select>
                                <span>Categoría</span>
                              </label>


                              <div class="input">
                                  <label class="input">  </label>
                                  <img class="imagen_producto_formulario" src="/product/{{$product->image}}" alt="">
                              </div>


                              <div class="input">
                                  <label class="input">Cambiar imagen del producto </label>
                                  <input type="file" name="image">
                              </div>
                         
                        
                        <button type="submit" class="submit">Actualizar</button>
                    </form>
                    <div class="image-container">
                    <img src="admin/assets/images/editar-png.png" alt="logo" />                    
                    </div>


                    
                </div>
        </div>
        @include('admin.script')
</body>
</html>


