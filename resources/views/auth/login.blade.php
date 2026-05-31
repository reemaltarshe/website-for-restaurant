@include('partials.header')

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Login to Your Account</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf 
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Your Password" required />
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br>
                        
                        <div class="form-check" style="margin-bottom: 15px;">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label" style="color: #555;">Remember Me</label>
                        </div>
                        
                        <div class="btn_box">
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')