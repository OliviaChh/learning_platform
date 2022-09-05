<?php echo form_open_multipart('upload/do_upload');?>
<div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-6 centered">
        <?php echo $error;?>

		<div class="form-group">
            <input type="file" name="userfile" size="20" /> 
        </div>
		
        <div class="form-group">
        <label for="LessonName">Name</label>
        <input class="form-control" type="text" id="LessonName" name="lessonname" placeholder="Lesson Name">
        </div>
        
        <div class="form-group">
        <label for="Fileprice">Price</label>
        <input class="form-control" type="text" id="Fileprice" name="fileprice">
        </div>

        <div class="form-group">
        <label for="Fileintro">Introduction</label>
        <textarea class="form-control" type="text" id="Fileintro" name="fileintro" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Upload" />
        </div>
    </div>
</div>


<?php echo form_close(); ?>
<h3></h3>
<div class="main"> </div>



