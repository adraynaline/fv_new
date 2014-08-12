<?php
class User_model extends CI_Model{

	protected $table = 'users';

	public function add_user()
	{
		$this->load->database('fv');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->set('username', $username)
			->set('password', md5($password))
			->insert($this->table);


	}

    public function get_user() {
        $this->db->select('username');
        $this->db->from('users');
        $query = $this->db->get();
        return $result = $query->result();
    }


}