<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/24/12
 * Time: 11:18 AM
 * To change this template use File | Settings | File Templates.
 */

$symbol = str_replace('"', "", $stock_data[0]);
$name = str_replace('"', "", $stock_data[1]);
$price = str_replace('"', "", $stock_data[2]);
$last_trade_date = str_replace('"', "", $stock_data[3]);
$last_trade_time = str_replace('"', "", $stock_data[4]);
$change = str_replace('"', "", $stock_data[5]);
$volume = str_replace('"', "", $stock_data[6]);

$session_data = $this->session->all_userdata();
?>

<ul>
    <li>Symbol: <?php echo $symbol ?></li>
    <li>Name: <?php echo $name ?></li>
    <li>Price: <?php echo $price?></li>
    <li>Volume: <?php echo $volume?></li>

    <form method="post" action="/CodeIgniter_2.1.1/index.php/users/buy">
        <input type="text" name="amount" />
        <input type="hidden" name="username" value="<?php echo $session_data['activeuser']; ?>" />

        <input type="hidden" name="symbol" value="<?php echo($symbol);?>" />
        <input type="hidden" name="buy_price" value="<?php echo $price; ?>" />
        <input type="submit" value="Buy" />
    </form>
</ul>