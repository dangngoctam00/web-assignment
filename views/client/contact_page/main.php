 <link rel="stylesheet" href="../../../assets/css/contact_page/main.css">
 <main class="contact_area margin-top">
     <!-- Introduction slide -->
     <figure class="intro_slide">
         <div class="container">
             <div class="row">
                 <div class="col-12 mt-md-5 mt-3">
                     <div id="introSlide" class="carousel slide" data-ride="carousel" data-interval="1000">
                         <div class="carousel-inner">
                             <div class="carousel-item">
                                 <img src="../../../assets/images/contact_page/slide1.jpg" class="d-block"
                                     alt="First slide">
                             </div>
                             <div class="carousel-item">
                                 <img src="../../../assets/images/contact_page/slide2.jpg" class="d-block"
                                     alt="Second slide">
                             </div>
                             <div class="carousel-item active">
                                 <img src="../../../assets/images/contact_page/slide3.gif" class="d-block"
                                     alt="Third slide">
                             </div>
                             <div class="carousel-item">
                                 <img src="../../../assets/images/contact_page/slide4.jpg" class="d-block"
                                     alt="Forth slide">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </figure>
     <!-- end slide -->
     <!-- Content -->
     <section class="contact_content">
         <div class="container">
             <div class="row">
                 <div class="col-md-8 col-12 my-md-5 my-3">
                     <section class="contact_form_wrapper">
                         <h3>GET IN TOUCH:</h3>
                         <p class="my-md-4 my-3">Nam liber tempor cum soluta nobis eleifend option congue nihil
                             imperdiet doming id quod
                             mazim placerat facer possim assum.

                         </p>
                         <form id="contactForm">
                             <div class="form-row">
                                 <div class="form-group col-md-6" id="formFirstName">
                                     <label for="inputFirstName">First Name*:</label>
                                     <input type="text" class="form-control" id="inputFirstname" placeholder="John"
                                         value="">
                                     <!-- <small><i class="fas fa-exclamation-triangle"></i> sdfsdajjdlsf</small> -->
                                 </div>
                                 <div class="form-group col-md-6" id="formLastName">
                                     <label for="inputLastName">Last Name*:</label>
                                     <input type="text" class="form-control" id="inputLastName" placeholder="Smith">
                                 </div>
                             </div>
                             <div class="form-row">
                                 <div class="form-group col-md-6" id="formEmail">
                                     <label for="inputEmail">Email*:</label>
                                     <input type="email" class="form-control" id="inputEmail"
                                         placeholder="example@gmail.com">
                                 </div>
                                 <div class="form-group col-md-6" id="formWebsite">
                                     <label for="inputWebsite">Website:</label>
                                     <input type="text" class="form-control" id="inputWebsite"
                                         placeholder="https://www.facebook.com/user">
                                 </div>
                             </div>
                             <div class="form-group" id="formSubject">
                                 <label for="inputSubject">Subject:</label>
                                 <input type="text" class="form-control" id="inputSubject" placeholder="Improvement">
                             </div>
                             <div class="form-group" id="formMessage">
                                 <label for="inputMessage">Type your message here*:</label>
                                 <textarea id="inputMessage" class="form-control" rows="8"></textarea>
                             </div>
                             <div class="d-flex justify-content-center">
                                 <button type="button" class="btn btn-primary mt-2" name="btn_send_email"
                                     id="btn_send_email">
                                     Send email
                                 </button>
                                 <div class="spinner-border mt-2 ml-2" id="spinnerEmail" role="status">

                                 </div>
                             </div>

                         </form>
                     </section>
                 </div>
                 <div class="col-md-4 col-12 my-md-5 my-3">
                     <section class="office_info">
                         <h3>GET OFFICE INFO:</h3>
                         <p class="my-md-4 my-3">Claritas est etiam processus dynamicus, qui sequitur mutationem
                             consuetudium lectorum. Mirum
                             est
                             notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas
                             humanitatis per seacula quarta decima et quinta decima.</p>
                         <ul id="infoList" class="list-group">
                             <li class="list-group-item d-flex flex-row bd-highlight">
                                 <div class="info_icon">
                                     <i class="fa fa-address-book" aria-hidden="true">
                                     </i>
                                 </div>
                                 <div class="info_content ml-3">
                                     <h5>Address: </h5>
                                     <p>268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh
                                     </p>
                                 </div>

                             <li class="list-group-item d-flex flex-row bd-highlight">
                                 <div class="info_icon">
                                     <i class="fa fa-phone" aria-hidden="true">
                                     </i>
                                 </div>
                                 <div class="info_content ml-3">
                                     <h5>Phone Number: </h5>
                                     <p>123456789</p>
                                 </div>
                             </li>
                             <li class="list-group-item d-flex flex-row bd-highlight">
                                 <div class="info_icon">
                                     <i class="fa fa-envelope-o" aria-hidden="true">
                                     </i>
                                 </div>
                                 <div class="info_content ml-3">
                                     <h5>Email: </h5>
                                     <p>example@gmail.com</p>
                                 </div>
                             </li>
                             <li class="list-group-item d-flex flex-row bd-highlight">
                                 <div class="info_icon">
                                     <i class="fa fa-cloud" aria-hidden="true">
                                     </i>
                                 </div>
                                 <div class="info_content ml-3">
                                     <h5>Website: </h5>
                                     <a id="linkWeb" href="https://mybk.hcmut.edu.vn/">
                                         https://mybk.hcmut.edu.vn/
                                     </a>

                                 </div>
                             </li>


                         </ul>
                     </section>

                 </div>

             </div>
         </div>
     </section>
     <!-- end content -->
 </main>
 <script src="../../../assets/js/contact_page/postEmail.js"></script>