<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_categories() {
		$categories = $this->db->get('categories');
		return $categories->result_array();
	}

	public function create_category($data) {
		$this->db->insert('categories', $data);
	}

	public function update_category($id, $data) {
		$this->db->update('categories', $data, array('id' => $id));
	}

	public function delete_category($id) {
		$this->db->where('id', $id);
		$this->db->delete('categories');
	}
}
