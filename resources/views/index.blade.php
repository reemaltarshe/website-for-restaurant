@include('partials.header')

<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>Delicious Fast Food</h1>
                                <p>Experience an unforgettable taste with our meals, prepared daily using the finest fresh ingredients and 100% premium meat. A flavor that takes you to another world!</p>
                                <div class="btn-box">
                                   <a href="{{ url('/menu') }}" class="btn1">Explore Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>Book Your Table</h1>
                                <p>Planning a special dinner or a family gathering? Save your time and secure your favorite spot at our restaurant easily and within seconds through our website.</p>
                                <div class="btn-box">
                                   <a href="{{ url('/book') }}" class="btn1">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>Fast Food Restaurant</h1>
                                <p>Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.</p>
                                <div class="btn-box">
                                    <a href="" class="btn1">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
</section>
</div>

@if(session('success_order'))
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert text-center" style="background: linear-gradient(135deg, #1f242d, #2c323f); color: #ffffff; border: 2px solid #ffbe33; border-radius: 15px; padding: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); font-weight: bold; font-size: 18px;">
                <span style="font-size: 24px;">🎉</span> {{ session('success_order') }}
            </div>
        </div>
    </div>
</div>
@endif

@if(isset($discountedProducts) && $discountedProducts->count() > 0)
<section class="custom-offer-section" style="padding: 40px 0; background-color: #ffffff;">
    <div class="container">
        <div class="heading_container heading_center mb-4" style="text-align: center; margin-bottom: 30px;">
            <h2 style="font-family: 'Dancing Script', cursive; font-size: 2.5rem; font-weight: bold; color: #222831;">
                Special Offers 
            </h2>
        </div>

        <div class="row justify-content-center">
            @foreach($discountedProducts as $product)
                <div class="col-sm-6 col-lg-4 OpenProductModal" 
                 style="display: flex; justify-content: center;"
                 data-toggle="modal" 
                 data-target="#productModal"
                 data-id="{{ $product->id }}"
                 data-name="{{ $product->name }}"
                 data-price="{{ $product->discount_price }}"
                 data-image="{{ $product->image && !str_contains($product->image, '640x480') ? asset('images/' . $product->image) : asset('images/f1.png') }}">            
                    <div class="custom-offer-card" style="background-color: #1f242d; border-radius: 15px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden; position: relative; width: 100%; max-width: 330px;">
                        @php
                            $discountPercentage = round((($product->price - $product->discount_price) / $product->price) * 100);
                        @endphp
                        <div style="position: absolute; top: 0; left: 0; background-color: #ffbe33; color: #ffffff; padding: 6px 14px; font-size: 12px; font-weight: bold; border-radius: 15px 0 15px 0; z-index: 5;">
                            {{ $discountPercentage }}% OFF
                        </div>

                       
                        <div style="background-color: #f1f2f3; padding: 25px; text-align: center; height: 210px; display: flex; align-items: center; justify-content: center; border-radius: 0 0 0 45px;">
                            @if($product->image && !str_contains($product->image, '640x480'))
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            @else
                                <img src="{{ asset('images/f1.png') }}" alt="default" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            @endif
                        </div>

                       
                        <div style="padding: 20px; color: #ffffff;">
                            <h5 style="color: #ffffff; font-weight: bold; font-size: 18px; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">
                                {{ $product->name }}
                            </h5>
                            
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <span style="color: #ffbe33; font-size: 18px; font-weight: bold;">
                                        ${{ $product->discount_price }}
                                    </span>
                                    <span style="color: #a0a6b2; font-size: 13px; text-decoration: line-through; opacity: 0.7;">
                                        ${{ $product->price }}
                                    </span>
                                </div>
                                
                                <a href="#" style="background-color: #ffbe33; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff; text-decoration: none; flex-shrink: 0;">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0px 0px 456.029 456.029" style="width: 16px; height: 16px; fill: #ffffff; display: block;">
                                        <g>
                                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.134,84.992,10.158,61.952,10.158H13.824C6.144,10.158,0,16.302,0,23.982s6.144,13.824,13.824,13.824h48.128c6.144,0,11.264,4.608,12.288,10.752l46.08,307.2c2.048,15.36,15.36,26.624,30.72,26.624h218.624c14.336,0,26.624-10.24,29.696-24.576l37.888-177.152C442.88,96.686,441.856,89.518,439.296,84.91z" />
                                            <path d="M167.936,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248c29.184,0,53.248-23.552,53.248-53.248C221.184,362.926,197.12,338.862,167.936,338.862z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="food_section layout_padding" style="position: relative; z-index: 2; padding-top: 60px;">
    <div class="container">
        <div class="heading_container heading_center mb-4">
            <h2 style="color: #222831; font-weight: bold;">Our Menu</h2>
        </div>

        <ul class="filters_menu d-flex flex-wrap justify-content-center list-unstyled mb-5" style="gap: 10px;">
            <li class="active" data-filter="*" style="color: #ffffff; background-color: #222831; padding: 8px 25px; border-radius: 25px; cursor: pointer; transition: all 0.3s ease;">All</li>
            @foreach($categories as $category)
                <li data-filter=".cat-{{ $category->id }}" style="color: #222831; background-color: #f7f7f7; padding: 8px 25px; border-radius: 25px; cursor: pointer; transition: all 0.3s ease; font-weight: 500;">
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>

        <div class="filters-content">
            <div class="row grid">
                @foreach($products->slice(0, 6) as $product)
                    <div class="col-sm-6 col-lg-4 all cat-{{ $product->category_id }} OpenProductModal"
                        data-toggle="modal" 
                        data-target="#productModal"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->discount_price ?? $product->price }}" 
                        data-image="{{ $product->image && !str_contains($product->image, '640x480') ? asset('images/' . $product->image) : asset('images/f1.png') }}"
                         style="cursor: pointer;">
                        <div class="box" style="position: relative; background-color: #1f242d; border-radius: 15px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden;">
                            @if($product->discount_price)
                                @php
                                    $discountPercentage = round((($product->price - $product->discount_price) / $product->price) * 100);
                                @endphp
                                <span style="position: absolute; top: 0; left: 0; background: linear-gradient(135deg, #ffbe33, #e69d00); color: #ffffff; padding: 7px 18px; font-size: 11px; font-weight: 800; border-radius: 15px 0 15px 0; box-shadow: 2px 2px 8px rgba(0,0,0,0.15); z-index: 10; text-transform: uppercase; letter-spacing: 0.5px;">
                                    {{ $discountPercentage }}% OFF
                                </span>
                            @endif

                            <div>
                                <div class="img-box" style="background-color: #f1f2f3; padding: 20px; text-align: center; height: 220px; display: flex; align-items: center; justify-content: center;">
                                    @if($product->image && !str_contains($product->image, '640x480'))
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('images/f1.png') }}" alt="default" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @endif
                                </div>

                                <div class="detail-box" style="padding: 25px; color: #ffffff;">
                                    <h5 style="color: #ffffff; font-weight: bold; margin-bottom: 10px;">{{ $product->name }}</h5>
                                    <p style="font-size: 14px; color: #b0b3b8; min-height: 42px;">{{ $product->description ?? 'Delicious meal ready for order.' }}</p>
                                    
                                    <div class="options" style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                                        <div class="price_container" style="display: flex; align-items: center;">
                                            @if($product->discount_price)
                                                <h6 style="color: #ffbe33; margin: 0; font-size: 18px; font-weight: bold;">
                                                    ${{ $product->discount_price }}
                                                    <span style="color: #a0a6b2; font-size: 13px; text-decoration: line-through; margin-left: 8px; font-weight: normal; opacity: 0.7;">
                                                        ${{ $product->price }}
                                                    </span>
                                                </h6>
                                            @else
                                                <h6 style="color: #ffbe33; margin: 0; font-size: 18px; font-weight: bold;">
                                                    ${{ $product->price }}
                                                </h6>
                                            @endif
                                        </div>
                                        <a href="#" style="background-color: #ffbe33; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff; transition: all 0.3s ease;">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="btn-box d-flex justify-content-center mt-4">
            <a href="{{ url('/menu') }}" class="btn text-white" style="background-color: #ffbe33; border-radius: 25px; padding: 10px 45px; font-weight: 600; font-size: 16px; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(255, 190, 51, 0.3);">
                View More
            </a>
        </div>
    </div>
</section>
<section id="about" class="about_section layout_padding">
    <div class="container  ">
        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="{{ asset('images/about-img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>We Are Feane</h2>
                    </div>
                    <p>At Feane, we believe that great food brings people together. Since our journey started, we have been crafting the finest fast food items with passion, fresh ingredients, and a touch of love. Our mission is to deliver a delightful dining experience to your table every single day."</p>
                    <a href="{{ url('/about') }}" class="btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Book A Table</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="">
                        <div>
                            <input type="text" class="form-control" placeholder="Your Name" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Phone Number" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Your Email" />
                        </div>
                        <div>
                            <select class="form-control nice-select wide">
                                <option value="" disabled selected>How many persons?</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                            </select>
                        </div>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                        <div class="btn_box">
                            <button>Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #1f242d; color: #ffffff; border-radius: 15px; border: 1px solid #ffbe33;">
            <div class="modal-header" style="border-bottom: 1px solid #333ba2;">
                <h5 class="modal-title" id="modalProductName" style="font-weight: bold; color: #ffbe33;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff; opacity: 0.8;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div style="background-color: #f1f2f3; padding: 15px; border-radius: 10px; margin-bottom: 20px; display: inline-block; width: 100%; max-width: 200px;">
                    <img id="modalProductImage" src="" alt="" style="max-width: 100%; max-height: 150px; object-fit: contain;">
                </div>
                
                <h4 style="color: #ffbe33; font-weight: bold; margin-bottom: 20px;">Price: $<span id="modalProductPrice">0.00</span></h4>
                
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <button type="button" class="btn btn-warning" id="btnMinus" style="font-weight: bold; width: 40px; border-radius: 5px 0 0 5px; background-color: #ffbe33; border:none; color:#fff;">-</button>
                    <input type="text" id="productQty" value="1" readonly style="width: 60px; text-align: center; font-weight: bold; border: none; height: 38px; background-color: #ffffff; color: #222831;">
                    <button type="button" class="btn btn-warning" id="btnPlus" style="font-weight: bold; width: 40px; border-radius: 0 5px 5px 0; background-color: #ffbe33; border:none; color:#fff;">+</button>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #333ba2; justify-content: center;">
                <button type="button" class="btn btn-primary" id="btnConfirmOrder" style="background-color: #ffbe33; border: none; font-weight: bold; padding: 10px 30px; border-radius: 25px; color: #ffffff; width: 80%;">
                    حجز الطلب 🍕
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
$(document).ready(function() {
    var currentProductId = null;
    var currentProductPrice = 0;

    $('.OpenProductModal').on('click', function() {
        currentProductId = $(this).data('id'); 
        var name = $(this).data('name');
        currentProductPrice = parseFloat($(this).data('price'));
        var image = $(this).data('image');
        
        $('#modalProductName').text(name);
        $('#modalProductPrice').text(currentProductPrice.toFixed(2));
        $('#modalProductImage').attr('src', image);
        $('#productQty').val(1); 
    });

    $('#btnPlus').on('click', function() {
        var currentQty = parseInt($('#productQty').val());
        $('#productQty').val(currentQty + 1);
    });

    $('#btnMinus').on('click', function() {
        var currentQty = parseInt($('#productQty').val());
        if (currentQty > 1) {
            $('#productQty').val(currentQty - 1);
        }
    });

    $('#btnConfirmOrder').on('click', function() {
        var qty = $('#productQty').val();
        var $btn = $(this);
        $btn.prop('disabled', true).text('جاري الإضافة للسلة... 🛒');

        $.ajax({
            url: "{{ route('order.store') }}", 
            type: "POST",
            data: {
                product_id: currentProductId,
                quantity: qty,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if(response.success) {
                    $('#productModal').modal('hide');
                   
                    location.reload();
                }
            },
            error: function(xhr) {
                alert("عذراً، حدث خطأ أثناء إضافة المنتج للسلة.");
                $btn.prop('disabled', false).text('حجز الطلب 🍕');
            }
        });
    });
});
</script>
@include('partials.footer')