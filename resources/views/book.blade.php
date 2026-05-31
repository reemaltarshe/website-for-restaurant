@include('partials.header')

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2 style="color: #ffffff; font-weight: bold; margin-bottom: 30px;">
                {{ __('messages.book_heading') }}
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    
                    @if(session('success'))
                        <div class="alert alert-success text-center" style="border-radius: 20px; font-weight: bold; padding: 12px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" style="border-radius: 15px; padding: 15px; margin-bottom: 20px;">
                            <ul style="margin: 0; padding-left: 20px; font-weight: bold; list-style-type: none;">
                                @foreach ($errors->all() as $error)
                                    <li>❌ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('book.store') }}" method="POST" id="bookingForm">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('messages.your_name') }}" required />
                        </div>
                        
                        <div class="form-group mb-3">
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="{{ __('messages.phone_number') }}" required />
                        </div>
                        
                        <div class="form-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('messages.your_email') }}" required />
                        </div>
                        
                        <div class="form-group mb-3">
                            <select name="chairs" class="form-control" required style="height: 50px; border-radius: 5px;">
                                <option value="" disabled selected>{{ __('messages.how_many_persons') }}</option>
                                <option value="2" {{ old('chairs') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('chairs') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('chairs') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('chairs') == '5' ? 'selected' : '' }}>5+</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-4">
                            <input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
                        </div>
                        
                        <div class="btn_box">
                            <button type="submit" class="btn btn-warning btn-block" style="background-color: #ffbe33; color: #ffffff; border: none; border-radius: 25px; padding: 12px 55px; font-weight: 600; font-size: 16px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(255, 190, 51, 0.3); cursor: pointer; width: auto;">
                                {{ __('messages.book_now') }}
                            </button>
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

<script>
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.stopPropagation();
    });
</script>

@include('partials.footer')