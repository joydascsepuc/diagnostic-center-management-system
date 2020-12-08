<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 

	class Departments_Model extends CI_Model{
		
		public function add_department(){
			$data = array(

				'title' => $this->input->post('title')
			);

			return $this->db->insert('departments',$data);
		}

		public function get_departments(){

			$this->db->order_by('departments.id','DESC');
			$query = $this->db->get('departments');
			return $query->result_array();
		}

		public function getsingle($id){

			$this->db->where('id',$id);
			$query = $this->db->get('departments',$id);
			return $query->result_array();
		}
		public function update_department(){
			$id = $this->input->post('id');
			$data = array(	
			'title' => $this->input->post('title'),
			
			);

			$this->db->where('id',$id);
			return $this->db->update('departments',$data);
		}
	}