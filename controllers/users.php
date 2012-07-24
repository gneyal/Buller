<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 9:38 AM
 * To change this template use File | Settings | File Templates.
 */
include_once "/var/www/CodeIgniter_2.1.1/application/CIFormTutorial/models/obj/Calculator.php";

class users extends CI_Controller
{
    public $calc;

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('position_model');
        //$this->load->file('/CodeIgniter_2.1.1/models/obj/Calculator', true);
        $this->calc = new Calculator();
    }



    // index shows the users list
    public function index() {
        // 1. load the model


        // 2. get all the users list

        // 3. put that list in $data

        // 4. load the relevant view
        $data['title'] = "Users List";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar', $data);

        $data['users'] = $this->user_model->get_users();
        $this->load->view('users/users_list', $data);

        $this->load->view('templates/footer');
    }

    public function single($username) {
        // 1. load the model (moved to ctor)

        // 2. get the user info && 3. put that info in data
        $user = $this->user_model->get_users($username);

        $positions_to_present = $this->position_model->read_positions($username);

        $data['user'] = $user;
        $data['title'] = "Single user page";
        $data['positions_to_present'] = $positions_to_present;

        $data['profits_for_position_id'] = $this->calc->get_profits($positions_to_present);

//        // 4. load the view with data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar', $data);
        $this->load->view('users/user_profile', $data);
        $this->load->view('stocks/positions', $data);
        $this->load->view('templates/footer');
    }

    public function sell() {
        $position_id = $_POST['position_id'];
        $username = $_POST['username'];
        $profit = $_POST['profit'];

        $this->position_model->delete_position($position_id);
        $user = $this->user_model->get_users($username);

        $this->user_model->update_user($user['username'], $user['email'], $user['cash'] + $profit );
        $this->single($username);
    }

    public function buy() {
        $username = $_POST['username'];
        $symbol = $_POST['symbol'];
        $amount = $_POST['amount'];
        $buy_price = $_POST['buy_price'];
        $deal = $amount * $buy_price;

        $user = $this->user_model->get_users($username);

        $this->position_model->create_position($username, $symbol, $amount, $buy_price);
        $this->user_model->update_user($username, $user['email'], $user['cash'] - $deal);

        $this->single($username);
    }
}
