<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>Contact Us</h4>
                    <div class="contact_link_box">
                        <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Location : Homs</span></a>
                        <a href=""><i class="fa fa-phone" aria-hidden="true"></i> <span>Call 0991364031</span></a>
                        <a href=""><i class="fa fa-envelope" aria-hidden="true"></i> <span>reemaltarshe@gmail.com</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <a href="" class="footer-logo">Feane</a>
                    <p>Savor the taste of perfection. We serve premium quality meals crafted by expert chefs, delivered fresh and hot just the way you love it.</p>
                    <div class="footer_social">
                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>Opening Hours</h4>
                <p>Everyday</p>
                <p>10.00 Am : 10.00 Pm</p>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br><br>
                &copy; <span id="displayYear"></span> Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<script>
    $(window).on('load', function () {
        
        var $grid = $('.grid').isotope({
            itemSelector: '.all',
            layoutMode: 'fitRows'
        });

        $('.filters_menu li').click(function () {
            $('.filters_menu li').removeClass('active');
            $(this).addClass('active');
            
            var data = $(this).attr('data-filter');
            $grid.isotope({
                filter: data
            });
        });
    });
</script>
</body>
</html>