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
        $users = $this->user_model->get_users();

        $users_by_profit = $this->position_model->get_all_users_total_profit($users);
        $users = $this->sort_users_by_profit($users, $users_by_profit);
        $users = array_reverse( $users);
        $data['users'] = $users;
        $data['users_by_profit'] = $users_by_profit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar', $data);
        $this->load->view('templates/buller_title');
        $this->load->view('templates/title', $data);
        $this->load->view('users/users_list', $data);
        $this->load->view('templates/footer');
    }

    private function sort_users_by_profit($users, $users_by_profit) {
        $users_to_return = array();

        foreach ($users_by_profit as $name => $profit) {
            foreach ($users as $index => $user) {
                if ($name == $user['username']) {
                    $users_to_return[] = $user;
                    unset($users[$index]);
                }
            }
        }

        return $users_to_return;
    }


    private function cmp_by_optionNumber($a, $b) {
        return $a["optionNumber"] - $b["optionNumber"];
    }
    public function single($username) {
        // 1. load the model (moved to ctor)

        // 2. get the user info && 3. put that info in data
        $user = $this->user_model->get_users($username);

        $positions_to_present = $this->position_model->read_positions($username);

        $data['user'] = $user;
        $data['title'] = "Single user page";
        $data['positions_to_present'] = $positions_to_present;

        $data['current_prices'] = $this->calc->get_current_prices($positions_to_present);
        $data['profits_for_position_id'] = $this->calc->get_profits($positions_to_present);

//        // 4. load the view with data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar', $data);
        $this->load->view('templates/buller_title');
        $this->load->view('templates/title', $data);
        if ($this->session->userdata('notice')) {
            $data['notice'] = $this->session->userdata('notice');
            $this->session->unset_userdata('notice');
            $this->load->view('templates/notice', $data);
        }
        $this->load->view('users/user_profile', $data);
        $this->load->view('stocks/positions', $data);
        $this->load->view('templates/footer');
    }

    public function sell() {
        $position_id = $_POST['position_id'];
        $username = $_POST['username'];
        $add_to_cash = $_POST['add_to_cash'];

        $this->position_model->delete_position($position_id);
        $user = $this->user_model->get_users($username);

        $this->user_model->update_user($user['username'], $user['email'], $user['cash'] + $add_to_cash );
        $this->single($username);
    }

    public function buy() {
        $this->load->helper(array('form', 'url'));

        $username = $_POST['username'];
        $symbol = $_POST['symbol'];
        $amount = $_POST['amount'];
        $buy_price = $_POST['buy_price'];
        $deal = $amount * $buy_price;

        $user = $this->user_model->get_users($username);
        if ($user['cash'] < $deal) {
            $msg = "You don't have enough cash for that position";
            $this->session->set_userdata(array('notice' => $msg));
            redirect("/users/single/" . $user['username']);
        } else {
            $this->position_model->create_position($username, $symbol, $amount, $buy_price);
            $this->user_model->update_user($username, $user['email'], $user['cash'] - $deal);
        }

        //$this->single($username);
        redirect("/users/single/$username");
    }
}
