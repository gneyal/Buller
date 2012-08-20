<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 5:37 PM
 * To change this template use File | Settings | File Templates.
 */?>

<?php foreach ($stocks_array as $code => $stock) { ?>
    <div class="stock_summary">
        <ul class="stock_market_details">
            <?php //$sym = substr($stock[0],1,-1); ?>

            <?php $symbol = str_replace('"', "", $stock[0]); ?>
            <?php $name = str_replace('"', "", $stock[1]); ?>
            <?php $price = str_replace('"', "", $stock[2]); ?>
            <?php $last_trade_date = str_replace('"', "", $stock[3]); ?>
            <?php $last_trade_time = str_replace('"', "", $stock[4]); ?>
            <?php $change = str_replace('"', "", $stock[5]); ?>
            <?php $volume = str_replace('"', "", $stock[6]); ?>
            <li>
                <a href="/CodeIgniter_2.1.1/index.php/presentStocks/single_stock/<?php echo $symbol; ?>">
                    Code: <?php echo $symbol; ?>
                </a>
            </li>
            <li>
                Name: <?php echo $name; ?>
            </li>
            <li>Last Trade Price: <?php echo $price; ?> </li>
            <li>Last Trade Date: <?php echo $last_trade_date; ?>  </li>
            <li>Last Trade Time: <?php echo $last_trade_time; ?> </li>
            <li>Change and Percent Change: <?php echo $change; ?> </li>
            <li>Volume: <?php echo $volume; ?> </li>
            <?php $session_data = $this->session->all_userdata(); ?>
            <li>
                <form method="post" action="/CodeIgniter_2.1.1/index.php/users/buy">
                    <input type="text" name="amount" />
                    <input type="hidden" name="username" value="<?php echo $session_data['activeuser']; ?>" />

                    <input type="hidden" name="symbol" value="<?php echo($symbol);?>" />
                    <input type="hidden" name="buy_price" value="<?php echo $price; ?>" />
                    <input class="btn btn-primary" type="submit" value="Buy" />
                </form>
            </li>
        </ul>
    </div>
<?php } ?>