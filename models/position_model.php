<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 4:41 PM
 * To change this template use File | Settings | File Templates.
 */
class Position_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    // CRUD - Create(insert), Read(select), Update(update), Delete(delete)
    public function create_position($username, $symbol, $amount, $buy_price){
        $data = array('username' => $username, 'symbol' => $symbol, 'amount' => $amount, 'buy_price' => $buy_price);
        $this->db->insert('positions', $data);
    }

    public function read_positions($username = false) {
        if ($username === false) {
            $query = $this->db->get('positions');
            return $query->result_array();
        }

        $query = $this->db->get_where('positions', array('username' => $username));
        return $query->result_array();
    }

    public function update_position($id) {}

    public function delete_position($id) {
        $this->db->where('id', $id);
        $this->db->delete('positions');
    }
}
