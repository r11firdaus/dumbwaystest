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
        <h2 style="margin-top:0px">Course Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Thumbnail</td><td><?php echo $thumbnail; ?></td></tr>
	    <tr><td>Id Author</td><td><?php echo $id_author; ?></td></tr>
	    <tr><td>Duration</td><td><?php echo $duration; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('course') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>