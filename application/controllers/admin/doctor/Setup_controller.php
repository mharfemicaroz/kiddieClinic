<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setup_controller extends CI_Controller
{

	#--------------------------------
#      __constructor function	
#--------------------------------	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$session_id = $this->session->userdata('session_id');
		if ($session_id == NULL) {
			redirect('logout');
		}
		// $user_type = $this->session->userdata('user_type');
		// if ($user_type != 2) {
		// 	redirect('logout');
		// }

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('admin/doctor/Setup_model', 'setup_model');
	}


	public function add_disease()
	{
		$data['language'] = $this->setup_model->get_language();
		$data['disease'] = $this->setup_model->get_disease();

		$this->load->view('admin/doctor/_header', $data);
		$this->load->view('admin/doctor/_left_sideber');
		$this->load->view('admin/doctor/setup/_add_disease');
		$this->load->view('admin/doctor/_footer');
	}

	public function save_disease()
	{
		$data = array(
			'disease_name' => $this->input->post('disease_name')
		);
		$this->db->insert('disease', $data);
		redirect('admin/doctor/Setup_controller/add_disease');
	}


	public function delete_disease($id)
	{
		$this->db->where('md_id', $id)->delete('disease');
		redirect('admin/doctor/Setup_controller/add_disease');
	}


	public function add_medicine()
	{

		$data['language'] = $this->setup_model->get_language();
		$data['category'] = $this->setup_model->get_category();
		$data['classification'] = $this->setup_model->get_classification();

		$this->load->view('admin/doctor/_header', $data);
		$this->load->view('admin/doctor/_left_sideber');
		$this->load->view('admin/doctor/setup/view_add_medicine');
		$this->load->view('admin/doctor/_footer');
	}
	#--------------------------------
#      Save_Medicine	
#--------------------------------	
	public function save_medicine()
	{

		$medicine = array(
			'medicine' => $this->input->post('medicine_name'),
			'disease_id' => $this->input->post('dis_name'),
			'brand' => $this->input->post('brand'),
			'sign' => $this->input->post('sign'),
			'dosage' => $this->input->post('dosage')
		);

		$this->db->insert('medicine', $medicine);
		$this->session->set_flashdata('message', '<div class="alert alert-success msg">' . display('medicine_add_msg') . '</div><br>');
		redirect('admin/doctor/Setup_controller/add_medicine');

	}


	#--------------------------------
#      View Medicine list	
#--------------------------------
	public function medicine_List()
	{
		$data['title'] = "Medicine List";

		$data['medicine'] = $this->setup_model->get_medicine();


		$this->load->view('admin/doctor/_header', $data);
		$this->load->view('admin/doctor/_left_sideber');
		$this->load->view('admin/doctor/setup/view_medicine_list');
		$this->load->view('admin/doctor/_footer');
	}


	#--------------------------------
#      Delete_Medicine	
#--------------------------------
	public function delete_medicine($id = NULL)
	{
		$this->db->where('medicine_id', $id)->delete('medecine_info');
		$this->session->set_flashdata('exception', '<div class="alert alert-danger msg">' . display('delete_msg') . '</div><br>');
		redirect('Medicine_List');
	}

	#--------------------------------
#      Edit_Medicine view form	
#--------------------------------
	public function edit_medicine($id = NULL)
	{
		$data['language'] = $this->setup_model->get_language();
		$data['category'] = $this->setup_model->get_category();

		$data['med_info'] = $this->setup_model->get_medicine_by_id($id);


		$this->load->view('admin/doctor/_header', $data);
		$this->load->view('admin/doctor/_left_sideber');
		$this->load->view('admin/doctor/setup/view_medicine_edit');
		$this->load->view('admin/doctor/_footer');
	}

	#--------------------------------
#      Save_Edit_Medicine	
#--------------------------------
	public function save_edit_medicine()
	{
		$medicine = array(
			'medicine' => $this->input->post('medicine_name'),
			'disease_id' => $this->input->post('dis_name'),
			'brand' => $this->input->post('brand'),
			'sign' => $this->input->post('sign'),
			'dosage' => $this->input->post('dosage')
		);
		$id = $this->input->post('medicine_id');

		$this->db->where('medicine_id', $id);
		$this->db->update('medicine', $medicine);
		$this->session->set_flashdata('message', '<div class="alert alert-success">' . display('update_msg') . '</div><br>');
		redirect('admin/doctor/Setup_controller/medicine_List');
	}


}