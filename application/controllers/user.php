<?php

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['user'] = $this->user_model->get_user();
		$data['title'] = 'Visar användare';

		$this->load->view('templates/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	// user/join - form for registering a new account
	public function join()
	{
		$this->load->library('form_validation');
		$this->lang->load('form');

		$data['title'] = 'Registrera nytt konto';

		// Custom validation error messages for registration
		$this->form_validation->set_message('is_unique', $this->lang->line('form_is_unique'));
		$this->form_validation->set_message('matches', $this->lang->line('form_password_matches'));

		// Form validation
		$this->form_validation->set_rules('username', 'lang:form_name_username', 'trim|required|is_unique[user.username]|valid_email');
		$this->form_validation->set_rules('password', 'lang:form_name_password', 'required|min_length[6]|matches[verify_password]');
		$this->form_validation->set_rules('verify_password', 'lang:form_name_verify_password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('user/join');
			$this->load->view('templates/footer');
		}
		else
		{
			// Validation passed, add user
			$this->user_model->set_user();

			$this->load->view('templates/header', $data);
			$this->load->view('user/success');
			$this->load->view('templates/footer');
		}
	}

	// Route /user/logout - destroy user session
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect(base_url());
	}

	// Route /user/login - create user session
	public function login()
	{

	}

	// Route /home - view your personal page
	public function home()
	{
		$data['title'] = 'Min profil';

		$this->load->view('templates/header', $data);
		$this->load->view('user/home');
		$this->load->view('templates/footer');
	}

	// edit(), user/edit - edit your own profile
	public function edit()
	{
		
	}

}

?>