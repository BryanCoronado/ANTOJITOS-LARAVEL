<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('homeV2/general_productos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($product as $products)
                    <!-- Single Product Card -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('product/' . $products->image) }}" alt="Imagen del producto">
                            </div>
                            <div class="product-details">
                                <h3 class="product-title">{{ $products->title }}</h3>
                                @if($products->discount_price !== null)
                                <h4 class="product-price">{{ $products->discount_price }}</h4>
                                @endif
                                <h4 class="product-old-price">{{ $products->price }}</h4>
                            </div>
                            <div class="product-icons">

                            <form action="{{url('add_card',$products->id)}}" method="Post">
                                @csrf
                                <div>
                                    <input type="number" name="quantity" value="1" min="1">
                            
                                </div>

                                <div>
                                    <input class="btn btn-primary" type="submit" value="agegar">
                                </div>
                            </form>

                                
                                <a href="{{url('product_details',$products->id)}}"><i class="fas fa-info-circle"></i></a>
                           
                           
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>
