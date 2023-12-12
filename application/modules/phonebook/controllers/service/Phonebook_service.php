<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phonebook_service extends MY_Controller
{
	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object)get_userdata(USER);

		// if(is_empty_object($this->session)){
		// 	redirect(base_url().'login/authentication', 'refresh');
		// }

		$model_list = [
			'phonebook/service/Phonebook_services_model' => 'psModel'
			
		];
		$this->load->model($model_list);
	}

	public function save(){

		$this->psModel->Fname = $this->input->post("Fname");
		$this->psModel->Lname = $this->input->post("Lname");
		$this->psModel->Cnum = $this->input->post("Cnum");

		// print($this->input->post("Fname"));
		// echo "Controller for save method";
		$response = $this->psModel->save_method_from_model();
		echo json_encode($response);
	}

	public function delete(){
		$this->psModel->ID = $this->input->post("ID");

		$response = $this->psModel->delete();
		echo json_encode($response);
	} 

	public function update(){
		$this->psModel->ID = $this->input->post("ID");
		$this->psModel->Fname = $this->input->post("Fname");
		$this->psModel->Lname = $this->input->post("Lname");
		$this->psModel->Cnum = $this->input->post("Cnum");

		$response = $this->psModel->update();
		echo json_encode($response);
	} 

	public function search(){
		$this->psModel->Search_text = $this->input->post("Search_text");

		$this->data['details'] = $this->psModel->search();
		$this->data['content'] = 'grid/load_contacts';
		$this->load->view('layout',$this->data);
	} 
}
