<?php

require_once 'model_helper.php';

class User_persistance extends model_helper
{
    function __construct()
    {
        parent::__construct();
    }

    function user_has_identity()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $res = $this->db->get('users');
        foreach ($res->result() as $user) {
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('username', $user->username);
            return true;
        }
        return false;
    }
}

?>