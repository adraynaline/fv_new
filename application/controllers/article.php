<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','article');

class Article extends CI_Controller {

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
      

      $this->load->model('article_model');
      $article1 = array();
      $article1['article1'] = $this->article_model->show_article_actif();
      $article = array();
      $article['article'] = $this->article_model->show_article_inactif();
      $this->load->view('layout/header',$data);
      $this->load->view('article',$article1,$article);
      $this->load->view('layout/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
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
