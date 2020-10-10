<!doctype html>
<html>
    <head>
        <title>Course</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Course <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Thumbnail <?php echo form_error('thumbnail') ?></label>
            <input type="text" class="form-control" name="thumbnail" id="thumbnail" placeholder="Thumbnail" value="<?php echo $thumbnail; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Author <?php echo form_error('id_author') ?></label>
            <input type="text" class="form-control" name="id_author" id="id_author" placeholder="Id Author" value="<?php echo $id_author; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Duration <?php echo form_error('duration') ?></label>
            <input type="text" class="form-control" name="duration" id="duration" placeholder="Duration" value="<?php echo $duration; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('description') ?></label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('course') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>