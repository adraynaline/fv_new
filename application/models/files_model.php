<?php

class Files_Model extends CI_Model {
 
    public function insert_file($filename, $title, $description, $filter, $forh)
    {
        $data = array(
            'img'      => base_url().'assets/upload/'.$filename,
            'title'         => $title,
            'description'   => $description,
            'filter' 		=> $filter,
            'forh'  		=> $forh
        );
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }
    public function get_files()
{
    return $this->db->select()
            ->from('images')
            ->get()
            ->result();
}
 
}