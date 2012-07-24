<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 4:39 PM
 * To change this template use File | Settings | File Templates.
 */
include_once "obj/YahooStock.php";

class Stocks_model extends CI_Model
{
    public $yahooStock;

    public function __construct() {
        parent::__construct();

        $this->yahooStock = new YahooStock();
        $this->populateStocksList();
    }

    public function populateStocksList() {
        $this->yahooStock->addFormat("snl1d1t1cv");

        $this->yahooStock->addStock("msft");
        $this->yahooStock->addStock("amzn");
        $this->yahooStock->addStock("yhoo");
        $this->yahooStock->addStock("goog");
        $this->yahooStock->addStock("vgz");
    }
    // CRUD

    // returns an array $objYahooStock->getQuotes() as $code => $stock
    public function read_stocks() {
        return $this->yahooStock->getQuotes();
    }


    public function read_stock($symbol) {
        return $this->yahooStock->getQuote($symbol);
    }
}
