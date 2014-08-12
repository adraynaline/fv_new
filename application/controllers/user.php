<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','home');
//session_start(); //we need to call PHP's session object to access it through CI
class User extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];

     $result   = array();
     $this->load->model('user_model');
     
     $result['result'] = $this->user_model->get_user();
     

     $this->load->view('layout/header',$data);
     $this->load->helper(array('form'));
     $this->load->view('user',$result);
     $this->load->view('layout/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
   
 }
 function add_user(){
    $this->load->model('user_model'); 
    if($this->input->post('username','password')){
      $this->user_model->add_user('username','password');
      redirect('user', 'refresh');
    }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
