<!doctype html>
<html>
    <head>
        <title>Content</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Content <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Video Link <?php echo form_error('video_link') ?></label>
            <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Video Link" value="<?php echo $video_link; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Type <?php echo form_error('type') ?></label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php echo $type; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Course <?php echo form_error('id_course') ?></label>
            <input type="text" class="form-control" name="id_course" id="id_course" placeholder="Id Course" value="<?php echo $id_course; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('content') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>