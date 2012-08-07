<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/22/12
 * Time: 1:00 PM
 * To change this template use File | Settings | File Templates.
 */
class Signup extends CI_Controller
{
    public $initial_cash;
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        $this->initial_cash = 1000;
    }

    public function index() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        // TODO: need to change that to the noraml presentation of things using templates.


        $data['title'] = 'Login or Signup'; // for the title template

        $this->load->view('templates/header', $data);
        //$this->load->view('templates/navigation_bar', $data);
        $this->load->view('templates/buller_title');
        $this->load->view('templates/title', $data);
        $this->load->view('loginsignup/loginsignup');
        $this->load->view('templates/footer');
    }

    public function signups() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Signup'; // for the title template

            $this->load->view('templates/header', $data);
            //$this->load->view('templates/navigation_bar', $data);
            $this->load->view('templates/buller_title');
            $this->load->view('templates/title', $data);
            $this->load->view('loginsignup/signup');
            $this->load->view('templates/footer');
        }
        else
        {
            /*
             * adding the user to the database
             */
            $this->load->model('user_model');
            $this->user_model->insert_user($_POST['username'], $_POST['password'], $_POST['email'], $this->initial_cash);

            /*
             * setting the 'activeuser' variable in the session array
             */
            $this->session->set_userdata(array('activeuser' => $_POST['username']));

            /*

            $data['title'] = "Users List";
            $users = $this->user_model->get_users();
            $data['users'] = $users;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation_bar');
            $this->load->view('templates/title', $data);
            $this->load->view('users/users_list', $data);
            $this->load->view('templates/footer');
            */

            /*
             * redirecting to the users controller, to the index action
             */
            redirect('/users/index');
        }
    }


    public function login() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->database();

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Login'; // for the title template

            $this->load->view('templates/header', $data);
            //$this->load->view('templates/navigation_bar', $data);
            $this->load->view('templates/buller_title');
            $this->load->view('templates/title', $data);
            $this->load->view('loginsignup/login');
            $this->load->view('templates/footer');
        }
        else
        {
            $user = $this->user_model->get_users($_POST['username']);
            if ($user) {
                if ($user['password'] == md5($_POST['password'])){
                    $this->session->set_userdata(array('activeuser' => $_POST['username']));

                    header("Location: http://localhost/CodeIgniter_2.1.1/index.php/users");
                }
                else redirect('/signup/login');
            }
            else redirect('/signup/login');

        }
    }

    public function logout() {
        $this->session->unset_userdata('activeuser');

        $this->index();
    }

    public function show_loginsignup_view() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->view('loginsignup/loginsignup');
    }

    public function show_login_view() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->view('loginsignup/login');
    }

    public function show_signup_view() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->view('loginsignup/signup');
    }

    //////////////// TESTs

    public function test_insert() {
        $this->user_model->insert_user("mike", "mike", "mike");
    }

    public function test_delete() {
        $this->user_model->delete_user("mike");
    }

    public function test_update() {
        $this->user_model->update_user("eyal", "eyal", "eyal");
    }

}
