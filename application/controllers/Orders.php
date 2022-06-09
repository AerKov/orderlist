<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('orders_model');
		$this->load->model('categories_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('orders');
	}

	public function get_orders()
	{
		$orders = $this->orders_model->get_orders();
		//$data['categories'] = $this->categories_model->get_categories();
		echo json_encode($orders);
	}

	public function create_order()
	{
		$data['id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['category_id'] = $this->input->post('category_id');
		$data['date'] = date("Y-n-j"); 
		$result = $this->orders_model->create_order($data);
		echo json_encode($result);
	}

	public function update_execution($id, $execution) {
		$data['execution'] = $execution;
		$result = $this->orders_model->update_order($id, $data);
		echo json_encode($result);
	}

	public function delete_order($id)
	{
		$result = $this->orders_model->delete_order($id);
		echo json_encode($result);
	}

}
