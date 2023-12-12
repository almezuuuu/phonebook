<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phonebook extends MY_Controller
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
			'phonebook/Phonebook_model' => 'pModel',
		];
		$this->load->model($model_list);
	}

	/** load main page */
	public function index()
	{
		// if (
		// 	!check_permission($this->session->User_type, ['admin'])
		// ) {
		// 	redirect(base_url() . 'landing_page', 'refresh');
		// }

		$this->data['session'] =  $this->session;
		$this->data['content'] = 'index';
		$this->load->view('layout', $this->data);
	}

	public function get_contacts(){
		$this->data['details'] = $this->pModel->get_contacts();
		$this->data['content'] = 'grid/load_contacts';
		$this->load->view('layout',$this->data);
	}

	public function contact_profile(){
		$ID = $this->uri->segment(3);
		$this->pModel->ID = $ID;
		
		$this->data['details'] = $this->pModel->contact_profile();
		$this->data['content'] = 'profile';
		$this->load->view('layout',$this->data);
	}
}
