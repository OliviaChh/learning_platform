<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    
<?php 
         echo $this->session->flashdata('email_sent'); 
         echo form_open('/Verifi/send_mail'); 
?>

<div id="container">
    <br>
    <br>
    <table style="text-align: left; width: 100px;" border="1"
        cellpadding="2" cellspacing="2">
        <tbody>
        
            <tr>
                <td style="vertical-align: top;">ID</td>
                <td style="vertical-align: top;">Email & Username</td>
				<td style="vertical-align: top;">Password</td>
				<td style="vertical-align: top;">Name</td>
                <td style="vertical-align: top;">Verification</td>
                
            </tr>
            <?php
            foreach ( $data as $l1 ) {
                echo "<tr>";
                foreach ( $l1 as $l4 ) {
                    echo "<td>" . $l4 . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>