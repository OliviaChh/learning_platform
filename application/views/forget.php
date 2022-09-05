<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forget password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

   <body> 
      <?php 
         echo $this->session->flashdata('email_sent'); 
         echo form_open('/Forget/send_mail'); 
      ?>

    <br>
    <br>
	<div class="container">
    <div class="col-4 offset-4">
    <div class="form-group">
      <input type = "email" name = "email" class="form-control" placeholder="Registered Email" required="required" />
      <br>
      <input type = "submit" class= "btn btn-primary btn-block" value = "Send"> 
    </div>
    </div>
    </div>

      <?php 
         echo form_close(); 
      ?> 
   </body>
	
</html>