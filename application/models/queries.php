<?php
	class queries extends CI_Model{

		public function getPosts(){
			$query = $this->db->get('tbls_post');
			if($query->num_rows()>0){
				return $query->result();
			}
		}

		public function addPosts($data){
			return $this->db->insert('tbls_post',$data);

		}

		public function getSinglePosts($id){
			$query = $this->db->get_where('tbls_post',array('id'=> $id));
			if($query->num_rows()>0){
				return $query->row();
			}
		}

		public function updatePosts($data, $id){
			return $this->db->where('id',$id)->update('tbls_post',$data);
		}

		public function deletePosts($id){
			return $this->db->delete('tbls_post',['id'=>$id]);
		}

		public function getAllTables(){
			$query = $this->db->query("SELECT * FROM sys.Tables");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}

		public function getAllpk(){
			$query = $this->db->query("   SELECT i.name AS NOMBRE_INDICE, OBJECT_NAME(ic.OBJECT_ID) AS NOMBRE_TABLA, 
       		COL_NAME(ic.OBJECT_ID,ic.column_id) AS NOMBRE_COLUMNA
			FROM sys.indexes AS i
			INNER JOIN sys.index_columns AS ic
			ON i.OBJECT_ID = ic.OBJECT_ID
			AND i.index_id = ic.index_id
			WHERE i.is_primary_key = 1");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}

		public function getAllfk(){
			$query = $this->db->query("SELECT f.name AS FOREIGN_KEY, 
		   OBJECT_NAME(f.parent_object_id) AS NOMBRE_TABLA, 
		   COL_NAME(fc.parent_object_id, fc.parent_column_id) AS NOMBRE_COLUMNA, 
		   OBJECT_NAME (f.referenced_object_id) AS REFERENCIA_TABLA, 
		   COL_NAME(fc.referenced_object_id, fc.referenced_column_id) AS REFERENCIA_COLUMNA 
			FROM sys.foreign_keys AS f 
			INNER JOIN sys.foreign_key_columns AS fc 
		   	ON f.OBJECT_ID = fc.constraint_object_id");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}

		public function getAllIndexes(){
			$query = $this->db->query("SELECT * from sys.indexes");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}

		public function getAllProcedures(){
			$query = $this->db->query("select * from master.information_schema.routines where routine_type = 'PROCEDURE';");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}
		public function getAllFunctions(){
			$query = $this->db->query("select * from master.information_schema.routines where routine_type = 'FUNCTION';");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}		
		public function updateTable($tabla,$column){
			$this->db->query("ALTER TABLE [dbo].[".$tabla."] 
ADD ".$column."NULL ");
		}				

		public function getAllTriggers(){
			$query = $this->db->query("SELECT 
		     sysobjects.name AS 'TRIGGER' 
		    ,USER_NAME(sysobjects.uid) AS DUENIO_TRIGGER 
		    ,s.name AS table_schema 
		    ,OBJECT_NAME(parent_obj) AS TABLA 
		    ,OBJECTPROPERTY( id, 'ExecIsUpdateTrigger') AS 'UPDATE' 
		    ,OBJECTPROPERTY( id, 'ExecIsDeleteTrigger') AS 'DELETE' 
		    ,OBJECTPROPERTY( id, 'ExecIsInsertTrigger') AS 'INSERT' 
		    ,OBJECTPROPERTY( id, 'ExecIsAfterTrigger') AS 'AFTER' 
			FROM sysobjects 
			INNER JOIN sysusers 
			    ON sysobjects.uid = sysusers.uid 
			INNER JOIN sys.tables t 
			    ON sysobjects.parent_obj = t.object_id 
			INNER JOIN sys.schemas s 
			    ON t.schema_id = s.schema_id 
			WHERE sysobjects.type = 'TR';");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}

		public function getAllViews(){
			$query = $this->db->query("SELECT * FROM sys.views");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}	

		public function getAllChecks(){
			$query = $this->db->query("SELECT   TABLE_NAME, 
								         COLUMN_NAME, 
								         CHECK_CLAUSE, 
								         cc.CONSTRAINT_SCHEMA, 
								         cc.CONSTRAINT_NAME 
										FROM     INFORMATION_SCHEMA.CHECK_CONSTRAINTS cc 
								         INNER JOIN INFORMATION_SCHEMA.CONSTRAINT_COLUMN_USAGE c 
								           ON cc.CONSTRAINT_NAME = c.CONSTRAINT_NAME 
										ORDER BY CONSTRAINT_SCHEMA, 
								         TABLE_NAME, 
								         COLUMN_NAME ");
			if ($query->num_rows()>0)
			{
			    return $query->result();
			}
		}
		public function createConnection($data){
			$this->db->query("CREATE LOGIN [".$data."] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english] ALTER SERVER ROLE [sysadmin] ADD MEMBER [".$data."]");
		}

		public function deleteconnection($data){
			$this->db->query("DROP LOGIN [".$data."]");
		}
		public function createTable($data,$data1,$data2,$data3,$type,$type1,$type2){
			$this->db->query("CREATE TABLE [dbo].[".$data."](
				[".$data1."] [".$type."] NULL,
				[".$data2."] [".$type1."] NULL,
				[".$data3."] [".$type2."]NULL
			) ON [PRIMARY]");
		}

		public function deleteTable($id){
			$this->db->query("DROP TABLE [dbo].[".$id."]");
		}
	public function createProcedure($name,$procedure){
		$this->db->query("CREATE PROCEDURE dbo.".$name." AS ".$procedure."");
	}


	public function updateProcedure($name,$procedure){
		$this->db->query("ALTER PROCEDURE [dbo].[".$name."] AS ".$procedure."");
	}
	public function createFunction($name,$procedure,$type){
		$this->db->query("create Function ".$name."()
 returns ".$type." as
 begin 
 ".$procedure."
end");
	}
	public function updateFunction($name,$procedure,$type){
	$this->db->query("ALTER Function ".$name."()
 returns ".$type." as
 begin 
 ".$procedure."
end");}	
	public function deleteProcedure($id){
		$this->db->query("DROP PROCEDURE [dbo].[".$id."]");
	}

	public function deleteFunction($id){
		$this->db->query("DROP FUNCTION [dbo].[".$id."]");
	}
	public function createTrigger($name,$procedure,$type,$table){
		$this->db->query("CREATE TRIGGER ".$name." ON [dbo].[".$table."] 
".$type."
AS
".$procedure."");
	}
	public function updateTrigger($name,$procedure,$type,$table){
		$this->db->query("ALTER TRIGGER ".$name." ON [dbo].[".$table."] 
".$type."
AS
".$procedure."");
	}

	public function deleteTrigger($id){
		$this->db->query("DROP TRIGGER [dbo].[".$id."]");
	}	
	public function deleteView($id){
		$this->db->query("DROP VIEW [dbo].[".$id."]");
	}	

	public function createView($name,$procedure){
		$this->db->query("CREATE VIEW dbo.".$name."
AS
".$procedure."");
	}

	public function updateView($name,$procedure){
		$this->db->query("ALTER VIEW dbo.".$name."
AS
".$procedure."");
	}
	public function create($name,$procedure,$type){
		$this->db->query("create Function ".$name."()
 returns ".$type." as
 begin 
 ".$procedure."
end");
	}

	public function createCheck($table,$name,$check){
		$this->db->query("ALTER TABLE ".$table."
		ADD CONSTRAINT ".$name." CHECK (".$check.");");
	}
	public function createPK($table,$name,$column){
		$this->db->query("ALTER TABLE [dbo].[".$table."]
ADD CONSTRAINT ".$name." PRIMARY KEY (".$column.");");
	}
	public function deletePK($table,$id){
		$this->db->query("ALTER TABLE [dbo].[".$table."]
DROP CONSTRAINT ".$id.";");
	}	
	public function deleteCheck($table,$id){
		$this->db->query("ALTER TABLE [dbo].[".$table."] DROP CONSTRAINT [".$id."]");
	}


	public function createFK($table,$name,$column,$fk){
		$this->db->query("
ALTER TABLE  [dbo].[".$table."] ADD CONSTRAINT ".$name." FOREIGN KEY (".$column.") REFERENCES  ".$fk.";");
	}			

	}
?>