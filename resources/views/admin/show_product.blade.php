<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Categorías</title>
    <link rel="stylesheet" href="admin/assets/css/show.css">
    <!-- plugins:css -->
    @include('admin.css')
</head>
<body>
    <div class="container-scroller">
        <!-- Barra lateral -->
        @include('admin.barraLateral')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">

          <main class="table"><br>
          @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

              <div class="sms">
                    <p class="title">Tus productos creados</p>
                    <p class="message"></p>
                </div>
                <section class="table__header">
                
                 
                </section>
              <section class="table__body">
                
                  <table>
                      <thead>
                          <tr>
                              <th> Titulo <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Descripcion <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Cantidad<span class="icon-arrow">&UpArrow;</span></th>
                              <th> Categoria <span class="icon-arrow">&UpArrow;</span></th>
                              <th> precio <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Descuento <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Imagen <span class="icon-arrow">&UpArrow;</span></th>
                              <th> eliminar <span class="icon-arrow">&UpArrow;</span></th>
                              <th> editar <span class="icon-arrow">&UpArrow;</span></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($product as $product)
                          <tr>
                              <td>{{$product->title}}</td>
                              <td> {{$product->description}}</td>
                              <td> {{$product->quantity}} </td>
                              <td>
                                  {{$product->catagory}}
                              </td>
                              <td> <strong> S/. {{$product->price}}  </strong></td>
                              <td> {{$product->discount_price}}  </td>
                              <td>
                                <img src="/product/{{$product->image}}" alt="">

                              </td>

                              <td>
                                 <a href="{{url('delete_product',$product->id)}}" onclick="return confirm('Seguro que quieres eliminar el producto')" class="eliminar">eliminar</a>                                
                              </td>
                              <td>
                                 <a href="{{url('update_product',$product->id)}}" class="editar">editar</a>                                
                              </td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
              </section>
          </main>

        </div>
    </div>
    @include('admin.script')
</body>
</html>
