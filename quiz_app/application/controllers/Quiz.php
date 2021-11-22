<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('quiz_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function add_user()
	{

		$email_id      = $this->input->post('email_id');
		$mobile_number = $this->input->post('mobile_number');

		if($this->input->post('user_name') == ''){
			$response = response("","Enter user name");
			echo json_encode($response);
			exit;
		}elseif($email_id == ''){
			$response = response("","Enter email id");
			echo json_encode($response);
			exit;
		}elseif($mobile_number == ''){
			$response = response("","Enter mobile number");
			echo json_encode($response);
			exit;
		}

		$check_exist_user = $this->quiz_model->check_exist_user($email_id,$mobile_number);

		if($check_exist_user != ''){
			$this->session->set_userdata('user_id', $check_exist_user['id']);
			$response = response("show_result","");
			echo json_encode($response);
			exit;
		}

		//user Data
		$data = array(  
	        'user_name' => $this->input->post('user_name'), 
	        'email_id' => $email_id,
	        'mobile_number' => $mobile_number,
	        'created_date' =>  date('Y-m-d H:i:s')
        );  
       	//to insert user data
        $result = $this->quiz_model->insert_user_data($data);

        //set user id ( Session )
        $this->session->set_userdata('user_id', $result);

        $response = response("Successfully Submitted!","");
        echo json_encode($response);
        exit;
	}

	public function question(){
		$this->load->view('question');
	}

	public function get_questions(){
		$get_list = $this->quiz_model->get_questions();
		echo json_encode($get_list);
		exit;
	}

	public function answer(){
		$get_data = json_decode(file_get_contents('php://input'), true);

		$data = array(  
	        'score' => $get_data['score']
        );  
      
       	//update result
        $this->quiz_model->update_score($get_data['user_id'], $data);
	}

	public function result(){
		$this->load->view('result');
	}

	public function get_result(){
		$user_id = $this->session->userdata('user_id');
		$result =  $this->quiz_model->get_result($user_id);
		
		// $this->session->unset_userdata('user_id');
		echo json_encode($result);
		exit;
	}

}
