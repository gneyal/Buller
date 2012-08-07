<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 11:28 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<nav class="navig">
    <ul>
        <li><a href="/CodeIgniter_2.1.1/index.php/users/single/<?php echo $this->session->userdata('activeuser'); ?>"><?php echo $this->session->userdata('activeuser'); ?></a></li>
        <li><a href="/CodeIgniter_2.1.1/index.php/users/">Users List</a></li>
        <li><a href="/CodeIgniter_2.1.1/index.php/presentStocks/">Stocks List</a></li>
        <li><a href="/CodeIgniter_2.1.1/index.php/signup/logout">Logout</a></li>
    </ul>
</nav>
