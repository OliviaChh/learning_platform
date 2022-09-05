<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lesson</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


      <?php
            foreach ( $data as $l1 ) {
                echo '            
                <div class="col">
                <div class="card shadow-sm">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" 
                  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"/></svg>
      
                  
                ';
                foreach ( $l1 as $l5 ) {
                    echo '<div class="card-body">
                    <p class="card-text">'.$l5.'</p>
                    
                  </div>';
                }
                echo '
                <div class="btn-group">
                    <a href="/mypro/lesson2" class="btn btn-outline-primary">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary" name="fav">Like</button>
                    
                </div>
                </div>
                </div>';
            }
        ?>

        
      </div>
    </div>
    </div>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>

</body>
</html>