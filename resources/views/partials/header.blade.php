<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
  <title> Feane </title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>

  <style>
    .lang-switch-btn {
      background-color: rgba(255, 255, 255, 0.15);
      color: #ffffff !important;
      padding: 6px 16px;
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      font-weight: bold;
      transition: all 0.3s ease;
      display: inline-block;
    }
    .lang-switch-btn:hover {
      background-color: #ffbe33;
      color: #ffffff !important;
      border-color: #ffbe33;
      box-shadow: 0 4px 10px rgba(255, 190, 51, 0.3);
    }
   
    .cart-scroll::-webkit-scrollbar {
      width: 5px;
    }
    .cart-scroll::-webkit-scrollbar-track {
      background: rgba(255,255,255,0.05);
      border-radius: 10px;
    }
    .cart-scroll::-webkit-scrollbar-thumb {
      background: #ffbe33;
      border-radius: 10px;
    }
  </style>
</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{ asset('images/hero-bg.jpg') }}" alt="">
    </div>
    
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}">
            <span>Feane</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto ">
              <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">{{ __('messages.home') }}</a>
              </li>
              <li class="nav-item {{ Request::is('menu') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/menu') }}">{{ __('messages.menu') }} <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/about') }}">{{ __('messages.about') }}</a>
              </li>
              <li class="nav-item {{ Request::is('book') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/book') }}">{{ __('messages.book_table') }}</a>
              </li>

              <li class="nav-item ml-lg-3">
                @if(app()->getLocale() == 'ar')
                  <a class="nav-link lang-switch-btn" href="{{ route('lang.switch', 'en') }}">English 🇬🇧</a>
                @else
                  <a class="nav-link lang-switch-btn" href="{{ route('lang.switch', 'ar') }}">العربية 🇸🇾</a>
                @endif
              </li>

              
              <li class="nav-item dropdown">
                <a class="nav-link position-relative" href="#" id="cartDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
                  <i class="fa fa-shopping-cart" style="font-size: 20px; color: #ffbe33;"></i>
                  @if(session('cart') && count(session('cart')) > 0)
                    <span class="badge badge-pill badge-warning" style="position: absolute; top: -5px; right: -5px; background-color: #ffbe33; color: #1f242d; font-weight: bold; font-size: 11px;">
                      {{ count(session('cart')) }}
                    </span>
                  @endif
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cartDropdown" style="background: linear-gradient(135deg, #1f242d, #2c323f); border: 2px solid #ffbe33; border-radius: 15px; width: 380px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); z-index: 9999; border-top: 4px solid #ffbe33;">
                  
                  @if(session('cart') && count(session('cart')) > 0)
                    <div class="cart-scroll" style="max-height: 280px; overflow-y: auto; padding-right: 5px;">
                      @php $totalCartPrice = 0; @endphp
                      @foreach(session('cart') as $id => $details)
                        @php $totalCartPrice += $details['price'] * $details['quantity']; @endphp
                    
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-3" style="border-bottom: 1px solid rgba(255, 190, 51, 0.15);">
                          <div class="d-flex align-items-center" style="gap: 12px;">
                            <div style="background-color: #f1f2f3; width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0;">
                             <img src="{{ asset('images/' . $details['image']) }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>
                            <div>
                              <h6 style="color: #ffbe33; font-weight: bold; margin: 0; font-size: 14px; max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $details['name'] }}
                              </h6>
                              <small style="color: #a0a6b2; font-size: 12px;">
                                ${{ $details['price'] }} × {{ $details['quantity'] }}
                              </small>
                            </div>
                          </div>
                          <div style="font-weight: bold; color: #ffffff; font-size: 14px;">
                            ${{ number_format($details['price'] * $details['quantity'], 2) }}
                          </div>
                        </div>
                      @endforeach
                    </div> 

                    <div class="mt-3">
                      <div class="d-flex justify-content-between align-items-center mb-2" style="font-size: 12px; color: #a0a6b2;">
                        <span>⏰ وقت الاستلام المتوقع:</span>
                        <span style="font-weight: bold; color: #ffbe33;">خلال 25 دقيقة</span>
                      </div>
                      <div class="d-flex justify-content-between align-items-center pt-2 mb-3" style="border-top: 1px dashed rgba(255, 255, 255, 0.2);">
                        <span style="font-size: 15px; color: #ffffff; font-weight: bold;">الحساب الإجمالي:</span>
                        <span style="font-weight: bold; color: #ffbe33; font-size: 20px;">${{ number_format($totalCartPrice, 2) }}</span>
                      </div>
                    </div>

                    <div class="text-center mt-2">
                      <form action="{{ route('order.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn" style="background-color: #ffbe33; color: #ffffff; border-radius: 20px; padding: 10px; font-weight: bold; font-size: 15px; width: 100%; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(255, 190, 51, 0.2);">
                          تأكيد الحجز وإرسال للمطبخ 👨‍🍳🔥
                        </button>
                      </form>
                    </div>
                  @else
                    <div class="text-center py-4">
                      <i class="fa fa-shopping-basket" style="font-size: 40px; color: #a0a6b2; margin-bottom: 10px;"></i>
                      <p style="color: #ffffff; margin: 0; font-size: 14px; font-weight: bold;">سلتك فارغة حالياً وعصافير بطنك بتغرد! 🐣</p>
                      <small style="color: #a0a6b2; font-size: 12px;">أضف بعض الوجبات اللذيذة من المنيو</small>
                    </div>
                  @endif
                </div>
              </li>
            </ul>

            <div class="user_option">
              @auth
                <span class="mr-3" style="color: white;">مرحباً، {{ Auth::user()->name }}</span> 
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                   @csrf
                   <button type="submit" class="btn btn-danger btn-sm text-white" style="border-radius: 20px;">Logout</button>
                </form>
              @endauth

              @guest 
                <a href="{{ route('login') }}" class="btn btn-warning btn-sm mr-2" style="border-radius: 20px; color: white;">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-warning btn-sm" style="border-radius: 20px;">Register</a>
              @endguest
            </div>
          </div>
        </nav>
      </div>
    </header>