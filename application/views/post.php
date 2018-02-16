 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Base de Datos</title>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.0.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid"> 
  <a class="navbar-brand" href="#">Create Post</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</nav>
</body>
</html>  	

	<div class="container">
		<h3>View All Posts</h3>
		<?php echo anchor('welcome/creates','Add Post',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Title</th>
		      <th scope="col">Description</th>
		      <th scope="col">Creation Date</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($posts)):?>
		  	<?php foreach($posts as $post):?>
		    <tr class="table-active">
		      <td><?php echo $post->title;?></td>
		      <td><?php echo $post->description;?></td>
		      <td><?php echo $post->date_created;?></td>
		      <td>
		      <?php echo anchor("welcome/update/{$post->id}",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/delete/{$post->id}",'Delete',['class'=>'btn btn-danger"']);?>
		      </td>
		    </tr>
			<?php endforeach; ?>
		    <?php else: ?>
		    	<tr>
		    		<td>
		    			No Records Found!
		    		</td>
		    	</tr>
		    <?php endif; ?>   
		  </tbody>
		</table>
	</div>
		<?php include_once('footer.php');?>