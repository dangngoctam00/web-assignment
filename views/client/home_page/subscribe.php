<link rel="stylesheet" href="../../../assets/css/home_page/subscribe.css">

<section class="subscribe no-bg-img">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
                <div class="section_title text_center">
                    <h2>Stay With Us</h2>
                </div>
                <div class="newsletter_block text_center">
                    <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest
                        lookbooks and exclusive offers.</p>
                    <form action="">
                        <div class="newsletter_box">
                            <input id="email" type="email" placeholder="Enter your e-mail">
                            <button id="subscribe-btn" type="button">Subscribe</button>
                        </div>
                        <div id="mesg"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
        $('#subscribe-btn').click(function() {
        if ($('#email').val() == '') {
            $('#mesg').html('Please enter a valid mail address.');
            $('#mesg').removeClass('success-mesg');
            $('#mesg').addClass('error-mesg');
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'process_subscribe.php',
            data: { email: $('#email').val() },
            success: function(mesg){
                if (mesg == 'error') {
                    $('#mesg').html('This email has been already subscribed.');
                    $('#mesg').removeClass('success-mesg');
                    $('#mesg').addClass('error-mesg');
                    return;
                }
                $('#mesg').html('Subscribe successfully.');
                $('#mesg').addClass('success-mesg');
            },
            error: function(mes){
                $('#mesg').html('This email has been already subscribed.');
                $('#mesg').removeClass('success-mesg');
                $('#mesg').addClass('error-mesg');
            }                              
        })                       
    });
</script>