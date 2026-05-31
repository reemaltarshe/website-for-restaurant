@include('partials.header')

<section class="food_section layout_padding" style="position: relative; z-index: 2; color: #ffffff;">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 style="color: #ffffff;">Our Menu</h2>
        </div>

        <ul class="filters_menu">
            <li class="active" data-filter="*" style="color: #ffffff;">All</li>
            @foreach($categories as $category)
                <li data-filter=".cat-{{ $category->id }}" style="color: #ffffff; cursor: pointer;">{{ $category->name }}</li>
            @endforeach
        </ul>

        <div class="filters-content">
            <div class="row grid">
                @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4 all cat-{{ $product->category_id }}">
                        
                        <div class="box" style="position: relative; background-color: #1f242d; border-radius: 15px; margin-bottom: 30px; overflow: hidden;">
                            
                            @if($product->discount_price)
                                @php
                                    $discountPercentage = round((($product->price - $product->discount_price) / $product->price) * 100);
                                @endphp
                                <span style="position: absolute; top: 0; left: 0; background: linear-gradient(135deg, #ffbe33, #e69d00); color: #ffffff; padding: 7px 18px; font-size: 11px; font-weight: 800; border-radius: 15px 0 15px 0; box-shadow: 2px 2px 8px rgba(0,0,0,0.15); z-index: 10; text-transform: uppercase; letter-spacing: 0.5px;">
                                    {{ $discountPercentage }}% OFF
                                </span>
                            @endif

                            <div>
                                <div class="img-box" style="background-color: #f1f2f3; border-radius: 15px 15px 0 0; padding: 20px; text-align: center; height: 220px; display: flex; align-items: center; justify-content: center;">
                                    @if($product->image && !str_contains($product->image, '640x480'))
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('images/f1.png') }}" alt="default" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @endif
                                </div>
                                <div class="detail-box" style="padding: 25px; color: #ffffff;">
                                    <h5 style="color: #ffffff; font-weight: bold;">{{ $product->name }}</h5>
                                    <p style="font-size: 14px; color: #b0b3b8;">{{ $product->description ?? 'Delicious meal ready for order.' }}</p>
                                    
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

                                        <a href="" style="background-color: #ffbe33; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff;">
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
    </div>
</section>

@include('partials.footer')