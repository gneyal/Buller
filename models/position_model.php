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

    /**
     * @return an array, key=>value, where key is username and value is total_profit
     * @param $users
     */
    public function get_user_total_profit($user) {
        $calc = new Calculator();

        $positions = $this->read_positions($user['username']);
        $profits = $this->calc->get_profits($positions);

        $total = 0;
        foreach($profits as $id => $position_profit) {
            $total += $position_profit;
        }

        return $total;
    }
    public function get_all_users_total_profit($users) {
        $total_profits = array();

        foreach($users as $index => $user) {
            $user_total_profit = $this->get_user_total_profit($user);
            $total_profits[$user['username']] = $user_total_profit;
        }

        return $total_profits;
    }

}
