<link rel="stylesheet" href="/assets/css/home_page/new_product.css">
<link rel="stylesheet" href="/assets/owl_carousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/owl_carousel/dist/assets/owl.theme.default.min.css">
<section class="new_product">
    <div class="container">
        <div class="text">
            <h2 class="title_new_product">New <span class="color_theme">Products</span></h2>
            <p class="product_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form            
        </div>
        <div class="new_books owl-carousel">
            <div class="book">
                <img src="/assets/images/1.jpg" alt="" class="book_image">
            </div>

            <div class="book">
                <img src="/assets/images/2.jpg" alt="" class="book_image">
            </div>

            <div class="book">
            <img src="/assets/images/3.jpg" alt="" class="book_image">
            </div>

            <div class="book">
            <img src="/assets/images/4.jpg" alt="" class="book_image">
            </div>

        </div>
    </div>

</section>

<script src="/assets/owl_carousel/dist/owl.carousel.min.js"></script>
<script src="/assets/js/home_page/data-scroll.js"></script>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            items: 4,
            responsiveClass:true,
            nav: false,
            responsive: {
                0 : {
                    items: 1
                },
                // breakpoint from 480 up
                576 : {
                    items: 2
                },
                // breakpoint from 768 up
                768 : {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });
    });
</script>