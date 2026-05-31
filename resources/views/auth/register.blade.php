@include('partials.header')

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Create New Account</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf 

                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password (Min 8 chars)" required />
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br>
                        <div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required />
                        </div>
                        
                        <div class="btn_box">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')