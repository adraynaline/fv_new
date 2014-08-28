<?php

class Article_model extends CI_Model {
    protected $table = 'images';
    protected $table2 = 'complementary_info';
    //ARTICLE ACTIF
	public function show_article_actif()
 		{
  			$this->db->select('*');
        	$this->db->from('images');
        	$this->db->where('actif', '1');
        	$query = $this->db->get();
        	return $article1 = $query->result();
   
 		}
    //ARTICLE UNACTIF
 	public function show_article_inactif()
 		{
  			$this->db->select('*');
        	$this->db->from('images');
        	$this->db->where('actif', '0')->order_by("date_crea", "desc"); ;
        	$query = $this->db->get();
        	return $article2 = $query->result();
   
 		}
    //ALL ARTICLE
    
     public function show_article(){
        return $this->db->select('*')
                        ->from('images')
                        ->order_by('date_crea','desc')
                        ->get()
                        ->result();
    }
    //ADD ARTICLE
   /* public function add_article($filename, $title, $description, $filter,$forh){
        

        $data = array(
            'img'      => base_url().'assets/upload/'.$filename,
            'title'         => $title,
            'description'   => $description,
            'filter'        => $filter,
            'forh'          => $forh
        );
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    
        /*
        $this->load->database('fv');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $forh = $this->input->post('forh');
        $category = $this->input->post('filter');
        $this->db->set('title',$title)
                ->set('description',$description)
                ->set('forh',$forh)
                ->set('filter',$category)
                ->insert($this->table);
*/
       // $this->session->set_flashdata('result', 'Successfully added !');
    /*}*/
    //SHOW ARTICLE
    /*public function show_article($id){
         $this->db->select('*')->from('images')->where('id', $id);
        $query = $this->db->get();


        if ($query->num_rows() > 0)
        { return $query->row_array();
        }
        else {return NULL;}

        
    }*/
    //UPDATE ARTICLE
   /* public function update_article($data){
        extract($data);
        $this->db->where('id' , $id);
        $this->db->update($table_name, array('title' => $title,'description' => $description,'forh' => $forh,'filter' => $filter));
        $this->session->set_flashdata('result', 'Successfully updated !');
        return true;
        
    }
    //DELETE ARTICLE
    public function delete_article($id){
        $this->db->delete('images', array('id' => $id));
        $this->session->set_flashdata('result', 'Successfully deleted !');
    }
//COMPLEMENTARY INFORMATION CONTROL
    //ADD
    public function add_complementary_info(){
        $this->load->database('fv');
        $id = $this->input->post('id');
        $photographer = $this->input->post('photographer');
        $stylist = $this->input->post('stylist');
        $makeup = $this->input->post('makeup');
        $hair = $this->input->post('hair');
        $description = $this->input->post('description');
        $this->db->set('id_article',$id)
                 ->set('photographer', $photographer)
                 ->set('stylist',$stylist)
                 ->set('makeup',$makeup)
                 ->set('hair',$hair)
                 ->set('description',$description)
                 ->insert($this->table2);

        $this->session->set_flashdata('result', 'Successfully Added !');
    }
    //UPDATE
    public function update_com_info($data)
    {
        extract($data);
        $this->db->where('id' , $id);
        $this->db->update($table_name, array('photographer' => $photographer,'stylist' => $stylist,'makeup' => $makeup,'hair' => $hair,'description' => $description));
        return true;
        $this->session->set_flashdata('result', 'Successfully Updated !');
    }
    //SHOW
    public function show_info_com($id){
        //$this->load->database('fv');
        $this->db->select('*')->from('complementary_info');
        $this->db->where('id_article', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) { 
            return $query->row_array();
        }
        else {
            return NULL;
        };  */
    }
    
        
    
}

