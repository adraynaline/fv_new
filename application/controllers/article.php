<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('PAGE_CSS','admin');

class Article extends CI_Controller {

  function __construct()
   {
     parent::__construct();
      $this->load->model('Article_model');
    $this->load->library('form_validation');
    $this->load->library('session');
     
   }
  //this function is for unactivate article
   function index()
   {
     if($this->session->userdata('logged_in'))
     {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        //$article2 = array();
        //$article2['article2'] = $this->Article_model->show_article_inactif();
        $files = $this->Article_model->all_article();
         //$this->load->view('files', array('files' => $files));
        $this->load->view('layout/header',$data);
        $this->load->view('article_inactif',$array('files' => $files));
        $this->load->view('layout/footer');
     }
     else
     {
      //If no session, redirect to login page
      redirect('login', 'refresh');
     }
   }
  
   function actif(){
     if($this->session->userdata('logged_in'))
     {

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $article1 = array();
        $article1['article1'] = $this->Article_model->show_article_actif();

        $this->load->view('layout/header',$data);
        $this->load->view('article',$article1);
        $this->load->view('layout/footer');
     }
     else
     {
       //If no session, redirect to login page
       redirect('login', 'refresh');
     }
   }
   function add_article(){
        if($this->input->post('title', 'description','forh','filter')){
           $this->Article_model->add_article('title', 'description','forh','filter');
          $reponse = 'ok';
         }     
        else {
          $reponse = 'Erreur somewhere';
         } 
      $array['reponse'] = $reponse;
      echo json_encode($array);    
   }
   function add_com_info(){
    if($this->input->post('photographer', 'stylist','makeup','hair','description')){
           $this->Article_model->add_complementary_info('photographer', 'stylist','makeup','hair','description');
          $reponse = 'ok';
          
         }     
        else {
          $reponse = 'Erreur somewhere';
         } 
      $array['reponse'] = $reponse;
      echo json_encode($array); 
   }
   function update_com_info(){

    $data = array(
        'table_name' => 'complementary_info', // pass the real table name
        'id_article' => $this->input->post('id'),
        'photographer' => $this->input->post('photographer'),
        'stylist' => $this->input->post('stylist'),
        'makeup' => $this->input->post('makeup'),
        'hair' => $this->input->post('hair'),
        'description' => $this->input->post('description')
    );

     // load the model first
    if($this->Article_model->update_com_info($data)) // call the method from the model
    {
        $reponse = 'ok';
    }
    else {
          $reponse = 'Erreur somewhere';
         } 
      $array['reponse'] = $reponse;
      echo json_encode($array); 


   }
   function show($id){
     if($this->session->userdata('logged_in'))
     {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        //$test = array();
        //$test['test'] = $this->Article_model->if_com_info_true($id);
      
       // $nbr = count($test);
        $article['article'] = $this->Article_model->show_article($id);
        $article['infocom'] = $this->Article_model->show_info_com($id);
      
        $this->load->view('layout/header',$data);
        $this->load->view('show_article',$article);
        $this->load->view('layout/footer');
     }
     else
     {
       //If no session, redirect to login page
       redirect('login', 'refresh');
     }
   }
   function update_article(){
   $data = array(
        'table_name' => 'images', // pass the real table name
        'id' => $this->input->post('id'),
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
        'forh' => $this->input->post('forh'),
        'filter' => $this->input->post('filter'),
        
    );

     // load the model first
    if($this->Article_model->update_article($data)) // call the method from the model
    {
        $reponse = 'ok';
        
    }
    else {
          $reponse = 'Erreur somewhere';
         } 
      $array['reponse'] = $reponse;
      echo json_encode($array); 

}
   function update($id){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $article['article'] = $this->Article_model->show_article($id);
        $this->load->view('layout/header',$data);
        $this->load->view('edit_article',$article);
        $this->load->view('layout/footer');
      }
   }
   function delete($id){
     $this->Article_model->delete_article($id);
    //$this->session->set_flashdata('message', '<p>Product were successfully deleted!</p>');
      if($this->router->fetch_class() != 'article') {
        redirect('article');
      }
      else if($this->router->fetch_class() != 'article/actif') {
        redirect('article/actif');
      }
   }
   function logout()
   {
     $this->session->unset_userdata('logged_in');
     session_destroy();
     redirect('home', 'refresh');
   }
  function upload_file()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';
         
        
        if ($status != "error")
        {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
     
            $this->load->library('upload', $config);
     
            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $file_id = $this->Article_model->add_article($data['file_name'], $_POST['title'],$_POST['description'],$_POST['filter'],$_POST['forh']);
                if($file_id)
                {
                    $status = "success";
                    $msg = "File successfully uploaded";
                    
                }
                else
                {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
  }


?>
