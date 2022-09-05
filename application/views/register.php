<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- captcha refresh code -->
  <!-- <script>
  $(document).ready(function(){
      $('.refreshCaptcha').on('click', function(){
          $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
              $('#captImg').html(data);
          });
      });
  });
  </script> -->
  </head>

<body>

<div class="container-fluid ">
    <div class="row">
    <div class="col-md-9 offset-md-1"> 
     <div class="user_about_content_box">
        <div class="tab-pane">         
          <h3>Registration </h3>
        </div>

<div class="col-md-8">
	<?php
	if($this->session->flashdata('success')){
    echo "<span class='text-success' style='font-weight:bold'>".$this->session->flashdata('success')."</span>";	
	}else if ($this->session->flashdata('warning')){
    echo "<span class='text-danger' style='font-weight:bold'>".$this->session->flashdata('warning')."</span>";	
  }
  ?>

</div>	
       <form method="post" action="<?php echo base_url('register/index'); ?>">
        <div class="col-md-8">


      <div class="form-group" id="prime_cat">
            <input type="text" value="<?php echo set_value('name'); ?>" name="name" class="form-control input-group-lg" placeholder="Name">  
       </div>
	   <?php if(form_error('name')){echo "<span style='color:red'>".form_error('name')."</span>";} ?>

     
       <div class="form-group" id="prime_cat">
            <input type="email" value="<?php echo set_value('email'); ?>" name="email" class="form-control input-group-lg" placeholder="Email">  
       </div>
	   <?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
	   

       <div class="form-group" id="prime_cat">
            <input type="text" value="<?php echo set_value('new_password'); ?>" name="new_password" class="form-control input-group-lg" placeholder="New Password">  
       </div>
	   <?php if(form_error('new_password')){echo "<span style='color:red'>".form_error('new_password')."</span>";} ?>


       <div class="form-group" id="prime_cat">
            <input type="password" value="<?php echo set_value('confirm_password'); ?>" name="confirm_password" class="form-control input-group-lg" placeholder="Confirm Password">  
       </div>
	   <?php if(form_error('confirm_password')){echo "<span style='color:red'>".form_error('confirm_password')."</span>";} ?>

     <div class="form-group">
    <p id="captImg"><?php echo $captchaImg; ?></p>
    <!-- <p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p> -->
    </div>

    <div class="form-group" id="prime_cat">
      <input type="text" name="captcha" class="form-control input-group-lg" placeholder="Enter Captcha Text" required="required">
    </div>
      <!-- <input type="submit" name="submit" value="SUBMIT"/> -->

<!-- jQuery library -->







    <div class="form-group col-md-12">
      <input  class="btn btn-primary" type="submit" name="submit" value="Create account">
    </div>
  </div>
  </form>
</div>  
<!--Content box ends-->
 	
 	</div>
	</div>
</div>
</div>

</body>
</html>