<?php

class Article_model extends CI_Model {
	public function show_article_actif()
 		{
  			$this->db->select('*');
        	$this->db->from('images');
        	$this->db->where('actif', '1');
        	$query = $this->db->get();
        	return $article1 = $query->result();
   
 		}
 	public function show_article_inactif()
 		{
  			$this->db->select('*');
        	$this->db->from('images');
        	$this->db->where('actif', '0');
        	$query = $this->db->get();
        	return $article = $query->result();
   
 		}
}

