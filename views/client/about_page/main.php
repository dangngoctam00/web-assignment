 <link rel="stylesheet" href="../../../assets/css/about_page/main.css">
 <?php
    require_once "../../../data/config.php";
    $query = "select * from employee";
    $result = $mysql_db->query($query);

    ?>
 <main class="about_area  margin-top">
     <!-- Introduction -->
     <section class="summary">
         <div class="container">
             <div class="row ">
                 <div class="col-12 my-md-4 my-3">
                     <article id="summaryHeader" class="text-center">
                         <h2>Brief summary of us</h2>
                         <small>A satisfied customer is the best business strategy.</small>
                     </article>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6 col-12 my-md-4 my-3">
                     <section class="skills_wrapper">
                         <h3>Our skills:</h3>
                         <div id="listSkills" class="d-flex flex-column">
                             <div class="skill_item" class="p-2">
                                 <p><b>Customer Favorites</b></p>
                                 <div class="progress">
                                     <div class="progress-bar progress-bar-striped bg-warning" style="width:80%;"
                                         role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                     </div>
                                 </div>
                             </div>
                             <div class="skill_item" class="p-2">
                                 <p><b>Best-Selling Series</b></p>
                                 <div class="progress">
                                     <div class="progress-bar progress-bar-striped bg-success" style="width:70%;"
                                         role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                     </div>
                                 </div>
                             </div>
                             <div class="skill_item" class="p-2">
                                 <p><b>Bargain Books</b></p>
                                 <div class="progress">
                                     <div class="progress-bar progress-bar-striped bg-info" style="width:85%;"
                                         role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                     </div>
                                 </div>
                             </div>
                             <div class="skill_item" class="p-2">
                                 <p><b>Popular Authors</b></p>
                                 <div class="progress">
                                     <div class="progress-bar progress-bar-striped bg-danger" style="width:95%;"
                                         role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </section>
                 </div>
                 <div class="col-md-6 col-12 my-md-4 my-3">
                     <section class="other_aspects_wrapper">
                         <h3 class="mb-md-4 mb-3">Other aspects:</h3>
                         <div class="container">
                             <div class="row">
                                 <div class="col-6 bg-warning">
                                     <section class="aspect text-center m-2">
                                         <h5>Our mission: </h5>
                                         <p>We strive to provide a hospitable environment to encourage the
                                             healthy exchange of ideas by hosting numerous readings.</p>
                                     </section>
                                 </div>
                                 <div class="col-6 bg-success">
                                     <section class="aspect text-center m-2">
                                         <h5>Our essence: </h5>
                                         <p>At our core, our enterprise operates on Imagination, Individuality,
                                             Inclusivity,
                                             & Impact.</p>
                                     </section>
                                 </div>
                                 <div class="col-6 bg-info">
                                     <section class="aspect text-center m-2">
                                         <h5>Our promise: </h5>
                                         <p>We deliver optimistic and diverse storytelling, experiences, and points of
                                             view to our audience of smart, curious, passionate women.</p>
                                     </section>
                                 </div>
                                 <div class="col-6 bg-danger">
                                     <section class="aspect text-center m-2">
                                         <h5>Our vibe: </h5>
                                         <p>At our enterprise, we make magic. We dream it, and then do it together every
                                             day
                                             reinventing what's possible.
                                         </p>
                                     </section>
                                 </div>
                             </div>
                         </div>
                     </section>
                 </div>
             </div>
         </div>
     </section>
     <!-- end introduction-->
     <section class="intro_team">
         <div class="container">
             <div class="row">
                 <div class="col-12 my-md-4 my-3">
                     <section id="teamHeader" class="text-center">
                         <h3>Meet our team of experts</h3>
                         <small>The right people for your trust.</small>
                     </section>
                 </div>
             </div>
             <div class="row d-flex justify-content-center">
                 <!-- "../../../assets/images/about_page/avatar1.gif" -->
                 <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                 <div class="col-md-3 col-6 my-md-4 my-3 d-flex align-items-stretch">
                     <div class="team_member card text-center border-danger">
                         <img class="card-img-top img-fluid" src=<?php echo "../../../" . $row['link_image']; ?>
                             alt="A team member">
                         <div class="card-body">
                             <h5 class="card-title"><?php echo $row['full_name']; ?></h5>
                             <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['work_as']; ?></h6>
                             <nav id="nav_member">
                                 <a href=<?php echo $row["link_twitter"]; ?> class="card-link"><i
                                         class="fab fa-twitter"></i></a>
                                 <a href=<?php echo $row["link_facebook"]; ?> class="card-link"><i
                                         class="fab fa-facebook-f"></i></a>
                                 <a href=<?php echo $row["link_instagram"]; ?> class="card-link"><i
                                         class="fab fa-instagram"></i></a>
                             </nav>
                         </div>
                     </div>
                 </div>
                 <?php
                        }
                    } else {
                        ?>
                 <div>
                     <h3>There are current no experts.</h3>
                 </div>
                 <?php
                    }
                    ?>
             </div>
     </section>
 </main>