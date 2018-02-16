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
  <a class="navbar-brand" href="#">Create Table</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</nav>
</body>
</html>  
	<div class="container">
			<?php echo form_open('welcome/saveTable', ['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Create Table</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Table Name</label>
      <div class="col-md-5">
      <?php echo form_input(['name'=>'table','placeholder'=>'Table','class'=>'form_control']);?>
      </div>
      <div class="col-md-5">
      	<?php echo form_error('table','<div class="text-danger">','</div>');?>
      	</div>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Column Name</label>
      <div class="col-md-5">
      <?php echo form_textarea(['name'=>'column','placeholder'=>'column','class'=>'form_control']);?>
      <?php echo form_textarea(['name'=>'type','placeholder'=>'type','class'=>'form_control']);?>
      </div>
      <div class="col-md-5">
      	<?php echo form_error('column','<div class="text-danger">','</div>');?>
      	</div>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Column Name</label>
      <div class="col-md-5">
      <?php echo form_textarea(['name'=>'column1','placeholder'=>'column','class'=>'form_control']);?>
      <?php echo form_textarea(['name'=>'type1','placeholder'=>'type','class'=>'form_control']);?>
      </div>
      <div class="col-md-5">
        <?php echo form_error('column1','<div class="text-danger">','</div>');?>
        </div>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Column Name</label>
      <div class="col-md-5">
      <?php echo form_textarea(['name'=>'column2','placeholder'=>'column','class'=>'form_control']);?>
      <?php echo form_textarea(['name'=>'type2','placeholder'=>'type','class'=>'form_control']);?>
      </div>
      <div class="col-md-5">
        <?php echo form_error('column2','<div class="text-danger">','</div>');?>
        </div>
    </div>        
    <div class="form-group">
    	<div class="col-md-10 col-md-offset-2">
   	 		<?php echo form_submit(['name'=>'submit','value'=>'Create Table','class'=>'btn btn-default']);?>
   	 		<?php echo anchor('welcome','back',['class'=>'btn btn-primary']);?>
		</div>
	</div>
  </fieldset>
<?php echo form_close();?>
<legend>DDL</legend>
<div>
<?php echo "CREATE TABLE [dbo].[".$this->input->post('table')."]([".$this->input->post('column')."] [".$this->input->post('type')."] NULL,[".$this->input->post('column1')."] [".$this->input->post('type1')."] NULL,[".$this->input->post('column2')."] [".$this->input->post('type2')."]NULL) ON [PRIMARY]";?>
  </div>
	</div>
<?php include_once('footer.php');?>