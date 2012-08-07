<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/24/12
 * Time: 12:56 PM
 * To change this template use File | Settings | File Templates.
 */

include_once "/var/www/CodeIgniter_2.1.1/application/CIFormTutorial/models/obj/YahooStock.php";

class Calculator
{
    public $yahooInfo;

    public function __construct() {
        $this->yahooInfo = new YahooStock();

        $this->yahooInfo->addFormat("snl1d1t1cv");

        $this->yahooInfo->addStock("msft");
        $this->yahooInfo->addStock("amzn");
        $this->yahooInfo->addStock("yhoo");
        $this->yahooInfo->addStock("goog");
        $this->yahooInfo->addStock("vgz");
    }


    public function get_current_price($symbol) {
        $stock_info = $this->yahooInfo->getQuote($symbol);
        $current_price = $stock_info[2];

        return $current_price;
    }

    public function get_current_prices($positions) {
        $current_prices = array();
        foreach($positions as $index => $position) {
            $current_price = $this->get_current_price($position['symbol']);
            $current_prices[$position['id']] = $current_price;
        }

        return $current_prices;
    }

    public function get_profit($symbol, $amount, $buy_price) {
        $current_price = $this->get_current_price($symbol);

        $profit = ($current_price - $buy_price) * $amount;

        return $profit;
    }

    public function get_profits($positions) {
        $profits = array();
        foreach($positions as $index => $position) {
            $profit = $this->get_profit($position['symbol'], $position['amount'], $position['buy_price']);
            $profits[$position['id']] = $profit;
        }

        return $profits;
    }



}
