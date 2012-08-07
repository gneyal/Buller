<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/24/12
 * Time: 8:29 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<?php foreach($positions_to_present as $index => $row) {?>
    <ul>
        <li>
            <a href="/CodeIgniter_2.1.1/index.php/presentStocks/single_stock/<?php echo $row['symbol']; ?>">
                Symbol: <?php echo $row['symbol']; ?>
            </a>
        </li>
        <li>Amount: <?php echo $row['amount']; ?></li>
        <li>BuyPrice: <?php echo $row['buy_price']; ?></li>
        <?php $current_price = $current_prices[$row['id']] ?>
        <li>Current Price: <?= $current_price ?></li>
        <?php $profit = $profits_for_position_id[$row['id']]; ?>
        <li>Profit (not random): <?php echo $profit; ?></li>
        <?php $session_data = $this->session->all_userdata(); ?>
        <?php if ($session_data['activeuser'] == $user['username']) { ?>
        <li>
            <form method="POST" action="/CodeIgniter_2.1.1/index.php/users/sell">
                <input name="username" value="<?php echo $row['username']; ?>" type="hidden" />
                <input name="position_id" value="<?php echo $row['id']; ?>" type="hidden" />

                <!--
                // the profit should be calculated on the moment that we pressed "Sell"
                // the profit that i am now updating is on the moment the page was loaded
                // this obviously should change later on
                -->
                <input name="add_to_cash" value="<?php echo ($current_price * $row['amount']) ?>" type="hidden" />

                <input type="submit" value="Sell">
            </form>
        </li>
        <?php } ?>
    </ul>

<?php } ?>