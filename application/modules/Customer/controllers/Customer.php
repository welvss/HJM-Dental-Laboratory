<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MX_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->view('template/header');
		$this->load->model('mdlCustomer');
	}
	
	public function index(){
		$data['dentists'] = $this->mdlCustomer->getDentist(array());	
		$this->load->view('app-customer',$data);
		$this->load->view('template/footer');
	}

	public function login()
	{
		
     	$this->load->view('users/login');
  		 
	}
	public function AddDentist()
	{
	
		if($this->input->post('submit'))
		{
			if($_POST['same'] != Null)
			{
						$dentist = array(
									'title'=>$_POST['title'],
									'firstname'=>$_POST['firstname'],
									'lastname' => $_POST['lastname'],
									'middlename' => $_POST['middlename'],
									'company' =>$_POST['company'],
									'email' => $_POST['email'],
									'telephone' => $_POST['telephone'],
									'mobile' => $_POST['mobile'],
									'website' => $_POST['website'],
									'bstreet' => $_POST['bstreet'],
									'bbrgy' => $_POST['bbrgy'],
									'bcity' => $_POST['bcity'],
									'shipstreet' => $_POST['bstreet'],
									'shipcity' => $_POST['bcity'],
									'shipbrgy' => $_POST['bbrgy'],
									'notes' => $_POST['notes'] );
						
						if($this->mdlCustomer->AddDentist($dentist))
							redirect('Customer');
			}
			else
			{
						$dentist = array(
									'title'=>$_POST['title'],
									'firstname'=>$_POST['firstname'],
									'lastname' => $_POST['lastname'],
									'middlename' => $_POST['middlename'],
									'company' =>$_POST['company'],
									'email' => $_POST['email'],
									'telephone' => $_POST['telephone'],
									'mobile' => $_POST['mobile'],
									'website' => $_POST['website'],
									'bstreet' => $_POST['bstreet'],
									'bbrgy' => $_POST['bbrgy'],
									'bcity' => $_POST['bcity'],
									'shipstreet' => $_POST['shipstreet'],
									'shipcity' => $_POST['shipcity'],
									'shipbrgy' => $_POST['shipbrgy'],
									'notes' => $_POST['notes'] );
						
						if($this->mdlCustomer->AddDentist($dentist))
							redirect('Customer');
			}
		}
		else
		{
			$this->load->view('users/register');
		}

	}
	
	
	public function edituser(){	
		$this->load->model('mdlUsers');
		
		$data['page_title'] = "Modify Users";
		
		if($this->input->post('submit'))
		{
			$user = array(
						'username'=>$_POST['username'],
						'users_id'=>$_POST['users_id'],
						'password'=>md5($_POST['username']),
						'permission'=> $_POST['permission']
						);

			if($this->mdlUsers->modify($user))
				redirect('Student_management');
		}
		else
		{
			$data['user'] = $this->mdlUsers->get(array('users_id'=>$this->uri->segment(3)));
			//print_r($data['user']); die($this->db->last_query());
			$this->load->view('users/edituser', $data);
		}
	}
	
	public function deleteuser()
	{	
		$this->load->model('mdlUsers');
		
		$this->mdlUsers->deleteUser($this->uri->segment(3));
			
		redirect('Student_management');
	}
	
	function validate_credentials()
	{
		$this->load->model('mdlHome');
		$query=$this->mdlHome->validate();

		if($query)
		{
			$data=array(
				'username'=>$this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('Home/Register');


		}
		else
		{
			$this->login();
		}


	}
}
?>