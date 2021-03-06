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
  <a class="navbar-brand" href="#">Delete Connection</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</nav>
</body>
</html>  
  <div class="container">
      <?php echo form_open('welcome/deleteconnection', ['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Delete Connection</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Connection Name</label>
      <div class="col-md-5">
      <?php echo form_input(['name'=>'title','placeholder'=>'Connection Name','class'=>'form_control']);?>
      </div>
      <div class="col-md-5">
        <?php echo form_error('title','<div class="text-danger">','</div>');?>
        </div>
    </div>

    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <?php echo form_submit(['name'=>'submit','value'=>'Delete Connection','class'=>'btn btn-default']);?>
        <?php echo anchor('welcome','back',['class'=>'btn btn-primary']);?>
    </div>
  </div>
  </fieldset>
<?php echo form_close();?>
<legend>DDL</legend>
<div>
<?php echo "DROP LOGIN [".$this->input->post('title')."]";?>
  </div>
</div>
<?php include_once('footer.php');?>