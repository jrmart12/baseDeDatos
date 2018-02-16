<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('queries');
		$tables = $this->queries->getAllTables();
		$pks= $this->queries->getAllpk();
		$fks=$this->queries->getAllfk();
		$indexes =$this->queries->getAllIndexes();
		$procedures =$this->queries->getAllProcedures();
		$functions =$this->queries->getAllFunctions();
		$triggers = $this->queries->getAllTriggers();
		$views=$this->queries->getAllViews();
		$checks=$this->queries->getAllChecks();
		$config = array (
        'tables'  => $tables,
        'pks'=> $pks,
        'fks'=>$fks,
        'indexes'=>$indexes,
        'procedures'=>$procedures,
        'triggers'=>$triggers,
        'views'=>$views,
        'checks'=>$checks,
        'functions'=> $functions
		);		
		$this->load->view('welcome_message',$config);
	}

public function update($id){
		$this->load->model('queries');
		$post = $this->queries->getSinglePosts($id);
		$this->load->view('update', ['post'=>$post]);
	}

public function updateTable(){
	$this->load->model('queries');
	$this->load->view('updateTable');
}

	public function create(){
		$this->load->model('queries');
		$posts = $this->queries->getPosts();
		$this->load->view('post',['posts' => $posts]);
	}
		public function creates(){
		$this->load->view('create');
	}

	public function createTable(){
		$this->load->view('createTable');
	}

	public function createConection(){
		$this->load->view('createConexion');
	}	

	public function ModifyConection(){
		$this->load->view('editConexion');
	}

	public function DeleteConection(){
		$this->load->view('deleteConnection');
	}

	public function save()
	{
 				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $data = $this->input->post();
                        $today = date('Y-m-d');
                        $data['date_created']= $today;
                        unset($data['submit']);
                        $this->load->model('queries');
                       if( $this->queries->addPosts($data)){
                       	$this->session->set_flashdata('msg','Post Saved Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Save Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('create');
                }
	}


	public function change($id){ 
		 		$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $data = $this->input->post();
                        $today = date('Y-m-d');
                        $data['date_created']= $today;
                        unset($data['submit']);
                        $this->load->model('queries');
                       if( $this->queries->updatePosts($data, $id)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('create');

                }          
	}


	public function changeTable(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $tabla = $this->input->post('title');
                        $column = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->updateTable($tabla, $column)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('updateTable');
                }        
	}

	public function createProcedure(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->createProcedure($name, $procedure)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createProcedure');
                }else
                {
                        $this->load->view('createProcedure');
                }        
	}	

	public function createView(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->createView($name, $procedure)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createView');
                }else
                {
                        $this->load->view('createView');
                }        
	}	


	public function updateView(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->updateView($name, $procedure)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('updateView');
                }else
                {
                        $this->load->view('updateView');
                }        
	}		


		public function updateProcedure(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->updateProcedure($name, $procedure)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('updateProcedure');
                }        
}

public function createFunction(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $type =$this->input->post('description1');
                        $this->load->model('queries');
                       if( $this->queries->createFunction($name, $procedure,$type)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createFunction');
                }else
                {
                        $this->load->view('createFunction');
                }        
	}	

public function createCheck(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $table = $this->input->post('description');
                        $check =$this->input->post('description1');
                        $this->load->model('queries');
                       if( $this->queries->createCheck($table,$name,$check)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createCheck');
                }else
                {
                        $this->load->view('createCheck');
                }        
	}	

public function deleteCheck(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $table = $this->input->post('title');
                        $id = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->deleteCheck($table,$id)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('deleteCheck');
                }        
	}	

		public function updateFunction(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $type=$this->input->post('description1');
                        $this->load->model('queries');
                       if( $this->queries->updateFunction($name, $procedure,$type)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('updateFunction');
                }        
	}

public function createTrigger(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $type =$this->input->post('description1');
                        $table =$this->input->post('description2');
                        $this->load->model('queries');
                       if( $this->queries->createTrigger($name, $procedure,$type,$table)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createTrigger');
                }else
                {
                        $this->load->view('createTrigger');
                }        
	}

public function updateTrigger(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                if ($this->form_validation->run())
                {
                        $name = $this->input->post('title');
                        $procedure = $this->input->post('description');
                        $type =$this->input->post('description1');
                        $table =$this->input->post('description2');
                        $this->load->model('queries');
                       if( $this->queries->updateTrigger($name, $procedure,$type,$table)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('updateTrigger');
                }else
                {
                        $this->load->view('updateTrigger');
                }        
	}		

	public function delete($id){
		$this->load->model('queries');
		if($post =$this->queries->deletePosts($id)){

		$this->session->set_flashdata('msg','Post Deleted Successfully');
        }else{
      	$this->session->set_flashdata('msg','Failed to Delete Post');
     	}
     	return redirect('welcome');
	}

	public function deleteTable($id){
		$this->load->model('queries');
		if($tables =$this->queries->deleteTable($id)){

		$this->session->set_flashdata('msg','table Deleted Successfully');
        }else{
      	$this->session->set_flashdata('msg','Failed to Delete table');
     	}
     	return redirect('welcome');
	}	
	public function deleteProcedure($id){
		$this->load->model('queries');
		if($procedures =$this->queries->deleteProcedure($id)){

		$this->session->set_flashdata('msg','table Deleted Successfully');
        }else{
      	$this->session->set_flashdata('msg','Failed to Delete table');
     	}
     	return redirect('welcome');
	}
	public function deleteFunction($id){
		$this->load->model('queries');
		if($procedures =$this->queries->deleteFunction($id)){

		$this->session->set_flashdata('msg','table Deleted Successfully');
        }else{
      	$this->session->set_flashdata('msg','Failed to Delete table');
     	}
     	return redirect('welcome');
	}	
	public function deleteTrigger($id){
		$this->load->model('queries');
		if($procedures =$this->queries->deleteTrigger($id)){

		$this->session->set_flashdata('msg','table Deleted Successfully');
        }else{
      	$this->session->set_flashdata('msg','Failed to Delete table');
     	}
     	return redirect('welcome');
	}

	public function deleteView($id){
		$this->load->model('queries');
		if($procedures =$this->queries->deleteView($id)){

		$this->session->set_flashdata('msg','table Deleted Successfully');
        }else{
      	$this->session->set_flashdata('msg','Failed to Delete table');
     	}
     	return redirect('welcome');
	}			


	public function deleteconnection(){
				$this->form_validation->set_rules('title', 'Title', 'required');

                if ($this->form_validation->run())
                {
                        $data = $this->input->post('title');
                        $this->load->model('queries');
                       if( $this->queries->deleteconnection($data)){
                       
                       }else{
                       	
                       }
                       $this->load->view('deleteConnection');
                }else
                {
                        $this->load->view('deleteConnection');
                }		
	}

	public function allTables()
	{		
		$this->load->model('queries');
		$posts = $this->queries->getAllTables();
		$this->load->view('welcome_message',['posts'=>$posts]);
	}

		public function SaveConnection()
	{
 				$this->form_validation->set_rules('title', 'Title', 'required');

                if ($this->form_validation->run())
                {
                        $data = $this->input->post('title');
                        $this->load->model('queries');
                       if( $this->queries->createConnection($data)){
                       	$this->session->set_flashdata('msg','Connection Saved Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Connection');
                       }
                       $this->load->view('createConexion');
                }else
                {
                        $this->load->view('createConexion');
                }
	}

		public function createPK(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $table = $this->input->post('title');
                        $name = $this->input->post('description');
                        $column =$this->input->post('description1');
                        $this->load->model('queries');
                       if( $this->queries->createPK($table,$name,$column)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createPK');
                }else
                {
                        $this->load->view('createPK');
                }        
	}	

		public function createFK(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $table = $this->input->post('title');
                        $name = $this->input->post('description');
                        $column =$this->input->post('description1');
                        $fk =$this->input->post('description2');
                        $this->load->model('queries');
                       if( $this->queries->createFK($table,$name,$column,$fk)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       $this->load->view('createFK');
                }else
                {
                        $this->load->view('createFK');
                }        
	}		

public function deletePK(){
				$this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run())
                {
                        $table = $this->input->post('title');
                        $id = $this->input->post('description');
                        $this->load->model('queries');
                       if( $this->queries->deleteCheck($table,$id)){
                       	$this->session->set_flashdata('msg','Post Updated Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed to Update Post');
                       }
                       return redirect('welcome');
                }else
                {
                        $this->load->view('deletePK');
                }        
	}	

		public function SaveTable()
	{
 				$this->form_validation->set_rules('table', 'Table', 'required');

                if ($this->form_validation->run())
                {
                        $data = $this->input->post('table');
                        $data1 = $this->input->post('column');
                        $data2= $this->input->post('column1');
                        $data3= $this->input->post('column2');
                        $type= $this->input->post('type');
                        $type1= $this->input->post('type1');
                        $type2= $this->input->post('type2');
                        $this->load->model('queries');
                       if( $this->queries->createTable($data,$data1,$data2,$data3,$type,$type1,$type2)){
                       	$this->session->set_flashdata('msg',' Saved Successfully');
                       }else{
                       	$this->session->set_flashdata('msg','Failed ');
                       }
                       $this->load->view('createTable');
                }else{
                        $this->load->view('createTable');
                }
	}

}
