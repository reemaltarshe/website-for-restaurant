@include('partials.header')
<section class="about_section layout_padding">
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
              <h2>
                We Are Feane
              </h2>
            </div>
            <p>
             At Feane, we believe that great food brings people together. Since our journey started, we have been crafting the finest fast food items with passion, fresh ingredients, and a touch of love. Our mission is to deliver an unforgettable dining experience to your table every single day.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('partials.footer')