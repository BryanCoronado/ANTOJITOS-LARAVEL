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
                    <p class="title">Tus ordenes </p>
                    <p class="message"></p>
                </div>
                <section class="table__header">
                    <form action="{{url('search')}}" method="GET">
                        <input type="text" name="search" placeholder="Buscar por nombre">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                </section>
              <section class="table__body">
                
                  <table>
                      <thead>
                          <tr>
                              <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Correo <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Ciudad <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Telefono <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Producto <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Cantidad<span class="icon-arrow">&UpArrow;</span></th>
                              <th> precio <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Estado de pago <span class="icon-arrow">&UpArrow;</span></th>
                              <th> Estado delivery <span class="icon-arrow">&UpArrow;</span></th>
                              <th> imagen <span class="icon-arrow">&UpArrow;</span></th>
                              <th> ACTUALIZAR <span class="icon-arrow">&UpArrow;</span></th>
                              <th> IMPRIMIR <span class="icon-arrow">&UpArrow;</span></th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse($order as $order)
                          <tr>
                              <td>{{$order->name}}</td>
                              <td>{{$order->email}}</td>
                              <td>{{$order->address}}</td>
                              <td>{{$order->phone}}</td>
                              <td>{{$order->product_title}}</td>
                              <td>{{$order->quantity}}</td>
                              <td><strong>S/.</strong>{{$order->price}}</td>
                              <td>{{$order->payment_status}}<strong>  </strong></td>
                              <td>{{$order->delivery_status}}</td>
                              <td><img src="/product/{{$order->image}}" alt=""></td>
                              <td>
                                @if($order->delivery_status == 'PROSESANDO')
                              <a href="{{ url('delivered', $order->id) }}" class="entregar" style="color: {{ $order->delivery_status == 'ENTREGADO' ? 'red' : 'white' }};">ENTREGAR</a>
                                @else
                                <a href="#" class="entregar" style="color: {{ $order->delivery_status == 'ENTREGADO' ? 'red' : 'white' }};">ENTREGADO</a>

                              @endif
                            </td>
                            <td>
                                <a href="{{url('print_pdf' , $order->id)}}" class="editar">IMPRIMIR</a>                                
                            </td>


                          </tr>

                          @empty
                              <div class="empty-message-container">
                                  <div class="empty-message">
                                      <p class="no_hay">No hay datos</p>
                                  </div>
                              </div>
                        
                        
                        @endforelse
                        
                        
                      </tbody>
                  </table>
              </section>
          </main>

        </div>
    </div>
    @include('admin.script')
</body>
</html>
