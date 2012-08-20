<?php

class static_pages extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index() {}

    public function about() {
        $this->load->helper(array('form', 'url'));

        $this->load->view('templates/header');
        $this->load->view('static_pages/about');
        $this->load->view('templates/footer');

    }
}

?>