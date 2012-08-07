<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/22/12
 * Time: 10:09 PM
 * To change this template use File | Settings | File Templates.
 */
class User_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_users($username = false) {
        if ($username === false) {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

    public function update_user($username, $email, $cash) {
        $this->db->where('username', $username);
        $data = array('username' => $username, 'email' => $email, 'cash' => $cash);
        $this->db->update('users', $data);
    }

    public function update_user_password($username, $password) {
        $this->db->where('username', $username);
        $data = array('password' => md5($password));
        $this->db->update('users', $data);
    }

    public function delete_user($username) {
        $this->db->where('username', $username);
        $this->db->delete('users');
    }

    public function insert_user($username, $password, $email, $cash) {
        $data = array('username' => $username, 'email' => $email, 'password' => md5($password), 'cash' => $cash);
        $this->db->insert('users', $data);
    }
}
