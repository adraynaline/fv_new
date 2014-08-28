<?php
class User_model extends CI_Model{

	protected $table = 'users';

	public function add_user()
	{
		$this->load->database('fv');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$grade = $this->input->post('grade');
		$mail = $this->input->post('mail');
		$this->db->set('username', $username)
			->set('password', md5($password))
			->set('grade', $grade)
			->set('mail',$mail)
			->insert($this->table);


	}

    public function get_user() {
        $this->db->select('id,username,password,grade,mail')->from('users');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function delete_user($id){
    	$this->db->delete('users', array('id' => $id));
    	$this->session->set_flashdata('result', 'Successfully deleted !');

    }


}