<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 11:21 AM
 * To change this template use File | Settings | File Templates.
 */
class populate extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('position_model');
    }

    public function index() {
        $this->user_model->insert_user("eyaleyal", "eyalpass", "eyal@email.com", 1000);
        $this->user_model->insert_user("assafassaf", "assafpass", "assaf@email.com", 1000);
        $this->user_model->insert_user("elramelram", "elrampass", "elram@email.com", 1000);
        $this->user_model->insert_user("daviddavid", "davidpass", "david@email.com", 1000);
        echo "Populated table \"users\" ";
    }

    public function delete_all_users() {
        $users = $this->user_model->get_users();

        foreach ($users as $index => $user) {
            $this->user_model->delete_user($user['username']);
        }

        echo "All users from the table \"users\" were deleted";
    }
    public function populate_positions() {
        $this->position_model->create_position("eyaleyal", "MSFT", 400, 150);
        $this->position_model->create_position("eyaleyal", "Goog", 326, 131);
        $this->position_model->create_position("eyaleyal", "APPL", 403, 5550);
        $this->position_model->create_position("eyaleyal", "INTL", 120, 840);

        echo "Populated positions table";
    }

    public function delete_all_positions() {
        $positions = $this->position_model->read_positions();

        foreach ($positions as $index => $position) {
            $this->position_model->delete_position($position['id']);
        }

        echo "All positions from the table \"positions\" were deleted";
    }

}
