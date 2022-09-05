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
<br>
<video width="520" height="360" controls><source src="uploads/mov_bbb.mp4" type="video/mp4"></video>
<?php
            foreach ( $data as $l1 ) {
                echo '';
                foreach ( $l1 as $l5 ) {
                    echo '<p>'.$l5.'</p>';
                }
                echo '';
            }
?>

<table style="text-align: left; width: 520px;" border="1" cellpadding="2" cellspacing="2">
    <tbody>
        <tr>
            <label>Comment</label>

        </tr>
            <?php
            foreach ( $data2 as $l1 ) {
                echo "<tr>";
                foreach ( $l1 as $l4 ) {
                    echo "<td>" . $l4 . "</td>";
                }
                echo "</tr>";
            }
            ?>
    </tbody>
</table>
<br>
<br>

<?php echo form_open_multipart('upload_comment/do_upload');?>
    <div class="col-md-4 col-md-offset-6 centered">
        <div class="form-group">
        <label for="comment">Say something</label>
        <textarea class="form-control" type="text" id="comment" name="comment" rows="5"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" />
        </div>
    </div>
<?php echo form_close(); ?>

</body>
</html>