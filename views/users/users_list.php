<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 8:53 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<?php foreach ($users as $user) { ?>
<div class="user_summary">
	<ul>
		<li class="user_name">
		    <a href="/CodeIgniter_2.1.1/index.php/users/single/<?php echo $user['username'] ?>">
		        <?php echo $user['username'] ?>
	        </a>
	    </li>
	    <li class="user_email"><?php echo $user['email'] ?></li>
	    <li class="user_cash">Cash: <?php echo $user['cash']; ?></li>
	    <li class="user_profit">Profit: <?php echo $users_by_profit[$user['username']]; ?></li>
	</ul>
</div>
<?php } ?>
