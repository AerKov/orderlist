<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model');
		$this->load->helper('url');
	}

	public function get_categories()
	{
		$categories = $this->categories_model->get_categories();
		echo json_encode($categories);
	}

	public function create_category()
	{
		$data['id_category'] = $this->input->post('id_category');
		$data['category_name'] = $this->input->post('category_name');
		$result = $this->categories_model->create_category($data);
		echo json_encode($result);
	}

}
