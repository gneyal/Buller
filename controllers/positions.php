<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/24/12
 * Time: 8:24 AM
 * To change this template use File | Settings | File Templates.
 */
class Positions extends CI_Controller
{
    public $calc;
    public function __construct() {
        parent::__construct();
        $this->load->model('position_model');
        $this->calc = new Calculator();
    }

    public function index() {}

    public function show_positions($username = false) {
        if ($username) {
            $data['title'] = $username . " Positions";
            $positions_to_present = $this->position_model->read_positions($username);
        } else {
            $data['title'] = "All Positions";
            $positions_to_present = $this->position_model->read_positions();
        }

        $data['positions_to_present'] = $positions_to_present;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar');
        $this->load->view('stocks/positions', $data);
        $this->load->view('templates/footer');
    }
    public function stocks_per_user($username) {
        $data['stocks_array'] = $this->stocks_model->read_stocks($username);
        $data['title'] = "User Positions";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar');
        // $this->load->view('stocks/stocks_list', $data);
        $this->load->view('templates/footer');
    }

}
