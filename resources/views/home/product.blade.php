<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('homeV2/general_productos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Our Menu</title>
</head>
<body>

    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>LOS MEJORES PLATILLOS DEL</h2>
                <p> MAR<span> FRESCO</span></p>
            </div>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        @foreach($product as $products)
                        <div class="col-lg-4 menu-item">
                            <a href="{{ asset('product/' . $products->image) }}" class="glightbox">
                                <img src="{{ asset('product/' . $products->image) }}" class="menu-img img-fluid" alt="">
                            </a>
                            <h4>{{ $products->title }}</h4>
                          
                            @if($products->discount_price !== null)
                                <p class="price discount-price">{{ $products->discount_price }}</p>
                            @endif
                            <p class="price regular-price" style=""><s>{{ $products->price }}</s></p>
                            <form action="{{url('add_card',$products->id)}}" method="Post">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="quantity" value="1" min="1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add to Cart">
                                </div>
                            </form>
                            <a href="{{url('product_details',$products->id)}}" class="btn btn-link"><i class="fas fa-info-circle"></i></a>
                        </div><!-- Menu Item -->
                        @endforeach
                    </div>
                </div><!-- End Dinner Menu Content -->
            </div>
        </div>
    </section>
</body>
</html>
