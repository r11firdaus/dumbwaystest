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
        <h2 style="margin-top:0px">Content Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Video Link</td><td><?php echo $video_link; ?></td></tr>
	    <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	    <tr><td>Id Course</td><td><?php echo $id_course; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('content') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>