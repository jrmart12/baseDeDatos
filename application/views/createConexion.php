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
  <a class="navbar-brand" href="#">Create Connection</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</nav>
</body>
</html>  
	<div class="container">
			<?php echo form_open('welcome/SaveConnection', ['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>General</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Login Name</label>
      <div class="col-md-5">
      <?php echo form_input(['name'=>'title','placeholder'=>'Login Name','class'=>'form_control']);?>
      </div>
      <div class="col-md-5">
      	<?php echo form_error('title','<div class="text-danger">','</div>');?>
      	</div>
    </div>
              <fieldset class="form-group">
              <legend>Server Roles</legend>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" checked="">
                  public
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" checked="">
                  sysadmin
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  bulkadmin
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  dbcreator
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  diskadmin
                </label> 
                </div>
                <div class="form-check">   
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  processadmin
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  securityadmin
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  serveradmin
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  setupadmin
                </label>
                </div>                                                                                             
            </fieldset>

  <fieldset class="form-group">
              <legend>User Mapping</legend>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" checked="">
                  Master
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  Model
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  msdb
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  prueba_usuarios
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" >
                  tempdb
                </label> 
                </div>                                                                                          
            </fieldset> 

    <div class="form-group">
    	<div class="col-md-10 col-md-offset-2">
   	 		<?php echo form_submit(['name'=>'submit','value'=>'Create Connection','class'=>'btn btn-default']);?>
   	 		<?php echo anchor('welcome','back',['class'=>'btn btn-primary']);?>
		</div>
	</div>
  </fieldset>
<?php echo form_close();?>
<legend>DDL</legend>
<div>
<?php echo "CREATE LOGIN [".$this->input->post('title')."] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english] ALTER SERVER ROLE [sysadmin] ADD MEMBER [".$this->input->post('title')."]";?>
	</div>
</div>
<?php include_once('footer.php');?>