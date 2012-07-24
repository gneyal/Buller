<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 5:16 PM
 * To change this template use File | Settings | File Templates.
 */
include_once "/var/www/CodeIgniter_2.1.1/application/CIFormTutorial/models/obj/YahooStock.php";

class PresentStocks extends CI_Controller
{
    public $yahooStock;

    public function __construct() {
        parent::__construct();
        $this->yahooStock = new YahooStock();

        $this->load->model('stocks_model');

        $this->stocks_model->populateStocksList();
    }

    public function index() {
        $this->show_stock_list();
    }

    public function show_stock_list() {
        $data['stocks_array'] = $this->stocks_model->read_stocks();
//        var_dump($data);
        $data['title'] = "Stocks List";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar');
        $this->load->view('stocks/stocks_list', $data);
        $this->load->view('templates/footer');
    }

    public function single_stock($symbol) {
        $data['stock_data'] = $this->stocks_model->read_stock($symbol);

        $data['title'] = "Single Stock Page";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation_bar');
        $this->load->view('stocks/single_stock', $data);
        $this->load->view('templates/footer');
    }
}
