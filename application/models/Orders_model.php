<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_orders() {
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('categories', 'categories.id_category = orders.category_id');
		$orders = $this->db->get();
		return $orders->result_array();
	}

	public function create_order($data) {
		$this->db->insert('orders', $data);
	}

	public function update_order($id, $data) {

		$this->db->where('id', $id);
		$this->db->update('orders', $data);
	}

	public function delete_order($id) {
		$this->db->where('id', $id);
		$this->db->delete('orders');
	}
}
