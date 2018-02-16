
	<?php include_once('headers.php');?>
	<div class="container">
		<section id="conexiones">
		<h3>Conexiones</h3>
		<?php echo anchor('welcome/createConection','Add Connection',['class'=>'btn btn-primary']);?>
		<?php echo anchor('welcome/DeleteConection','Delete Connection',['class'=>'btn btn-danger']);?>
	</section>
	</div>
	<section id="tablas">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<div class="navbar-header">	
  	<a class="navbar-brand" href="#">Tablas</a>
	</div>
	</div>
	</nav>
		<div class="container">
		<h3>View All Tables</h3>
		<?php echo anchor('welcome/createTable','Add Table',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Modify Date</th>
		      <th scope="col">Creation Date</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($tables)):?>
		  	<?php foreach($tables as $table):?>
		    <tr class="table-active">
		      <td><?php echo $table->name;?></td>
		      <td><?php echo $table->modify_date;?></td>
		      <td><?php echo $table->create_date;?></td>
		      <td>
		      	<?php echo anchor("welcome/create/{$table->name}",'Add',['class'=>'btn btn-primary']);?>
		      <?php echo anchor("welcome/updateTable/{$table->name}",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/deleteTable/{$table->name}",'Delete',['class'=>'btn btn-danger"']);?>
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
</section>
<section id="procedimientos">			
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<div class="navbar-header">	
  	<a class="navbar-brand" href="#">Procedimientos y Funciones</a>
	</div>
	</div>
	</nav>
		<div class="container">
		<h3>View All Procedures and Functions</h3>
		<?php echo anchor('welcome/createProcedure','Add Procedure',['class'=>'btn btn-primary']);?>
		<?php echo anchor('welcome/createFunction','Add Function',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Type</th>
		      <th scope="col">Date Created</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($procedures)):?>
		  	<?php foreach($procedures as $procedure):?>
		    <tr class="table-active">
		      <td><?php echo $procedure->SPECIFIC_NAME;?></td>
		      <td><?php echo $procedure->ROUTINE_TYPE;?></td>
		      <td><?php echo $procedure->CREATED;?></td>
		      <td>
		      <?php echo anchor("welcome/updateProcedure/{$procedure->SPECIFIC_NAME}",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/deleteProcedure/{$procedure->SPECIFIC_NAME}",'Delete',['class'=>'btn btn-danger"']);?>
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

		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Type</th>
		      <th scope="col">Date Created</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($functions)):?>
		  	<?php foreach($functions as $function):?>
		    <tr class="table-active">
		      <td><?php echo $function->SPECIFIC_NAME;?></td>
		      <td><?php echo $function->ROUTINE_TYPE;?></td>
		      <td><?php echo $function->CREATED;?></td>
		      <td>
		      <?php echo anchor("welcome/updateFunction/{$function->SPECIFIC_NAME}",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/deleteFunction/{$function->SPECIFIC_NAME}",'Delete',['class'=>'btn btn-danger"']);?>
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
</section>
<section id="triggers">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<div class="navbar-header">	
  	<a class="navbar-brand" href="#">Triggers</a>
	</div>
	</div>
	</nav>
		<div class="container">
		<h3>View All Triggers</h3>
		<?php echo anchor('welcome/createTrigger','Add Trigger',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Trigger</th>
		      <th scope="col">Table</th>
		      <th scope="col">Is Update</th>
		      <th scope="col">Is Delete</th>
		      <th scope="col">Is Insert</th>
		      <th scope="col">Is After</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($triggers)):?>
		  	<?php foreach($triggers as $trigger):?>
		    <tr class="table-active">
		      <td><?php echo $trigger->TRIGGER;?></td>
		      <td><?php echo $trigger->TABLA;?></td>
		      <td><?php echo $trigger->UPDATE;?></td>
		      <td><?php echo $trigger->DELETE;?></td>
		      <td><?php echo $trigger->INSERT;?></td>
		      <td><?php echo $trigger->AFTER;?></td>
		      <td>
		      <?php echo anchor("welcome/updateTrigger/{$trigger->TRIGGER}",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/deleteTrigger/{$trigger->TRIGGER}",'Delete',['class'=>'btn btn-danger"']);?>
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
</section>
<section id="vistas">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<div class="navbar-header">	
  	<a class="navbar-brand" href="#">Views</a>
	</div>
	</div>
	</nav>
		<div class="container">
		<h3>View All Views</h3>
		<?php echo anchor('welcome/createView','Add View',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">View</th>
		      <th scope="col">Id</th>
		      <th scope="col">Type</th>
		      <th scope="col">Create Date</th>
		      <th scope="col">Mofidy Date</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($views)):?>
		  	<?php foreach($views as $view):?>
		    <tr class="table-active">
		      <td><?php echo $view->name;?></td>
		      <td><?php echo $view->object_id;?></td>
		      <td><?php echo $view->type_desc;?></td>
		      <td><?php echo $view->create_date;?></td>
		      <td><?php echo $view->modify_date;?></td>
		      <td>
		      <?php echo anchor("welcome/updateView",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/deleteView/{$view->name}",'Delete',['class'=>'btn btn-danger"']);?>
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
</section>
<section id="checks">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<div class="navbar-header">	
  	<a class="navbar-brand" href="#">Checks</a>
	</div>
	</div>
	</nav>
		<div class="container">
		<h3>View All Checks</h3>
		<?php echo anchor('welcome/createCheck','Add Check',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Table Name</th>
		      <th scope="col">Column Name</th>
		      <th scope="col">Check Clause</th>
		      <th scope="col">Constraint Name</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($checks)):?>
		  	<?php foreach($checks as $check):?>
		    <tr class="table-active">
		      <td><?php echo $check->TABLE_NAME;?></td>
		      <td><?php echo $check->COLUMN_NAME;?></td>
		      <td><?php echo $check->CHECK_CLAUSE;?></td>
		      <td><?php echo $check->CONSTRAINT_NAME;?></td>
		      <td>
		      <?php echo anchor("welcome/deleteCheck/{$check->TABLE_NAME}",'Delete',['class'=>'btn btn-danger"']);?>
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
</section>
<section id="indices">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	<div class="navbar-header">	
  	<a class="navbar-brand" href="#">Indices</a>
	</div>
	</div>
	</nav>
		<div class="container">
		<h3>View All Primary Key</h3>
		<?php echo anchor('welcome/createPk','Add Pk',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Index</th>
		      <th scope="col">Table </th>
		      <th scope="col">Column Name</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($pks)):?>
		  	<?php foreach($pks as $pk):?>
		    <tr class="table-active">
		      <td><?php echo $pk->NOMBRE_INDICE;?></td>
		      <td><?php echo $pk->NOMBRE_TABLA;?></td>
		      <td><?php echo $pk->NOMBRE_COLUMNA;?></td>
		      <td>
		      <?php echo anchor("welcome/deletePK/{$pk->NOMBRE_INDICE}",'Delete',['class'=>'btn btn-danger"']);?>
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
</section>
	<div class="container">
		<h3>View All Foreign Key</h3>
		<?php echo anchor('welcome/createFk','Add Fk',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Foreign Key</th>
		      <th scope="col">Table Name</th>
		      <th scope="col">Column Name</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($fks)):?>
		  	<?php foreach($fks as $fk):?>
		    <tr class="table-active">
		      <td><?php echo $fk->FOREIGN_KEY;?></td>
		      <td><?php echo $fk->NOMBRE_TABLA;?></td>
		      <td><?php echo $fk->NOMBRE_COLUMNA;?></td>
		      <td>
		      <?php echo anchor("welcome/deletePK/{$fk->FOREIGN_KEY}",'Delete',['class'=>'btn btn-danger"']);?>
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

		<div class="container">
		<h3>View All Indexes</h3>
		<?php echo anchor('welcome/createIndex','Add Index',['class'=>'btn btn-primary']);?>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Object ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Index ID</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($indexes)):?>
		  	<?php foreach($indexes as $index):?>
		    <tr class="table-active">
		      <td><?php echo $index->object_id;?></td>
		      <td><?php echo $index->name;?></td>
		      <td><?php echo $index->index_id;?></td>
		      <td>
		      <?php echo anchor("welcome/update/{$index->object_id}",'Update',['class'=>'btn btn-warning']);?>
		      <?php echo anchor("welcome/delete/{$index->object_id}",'Delete',['class'=>'btn btn-danger"']);?>
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