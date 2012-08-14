<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 10:00 AM
 * To change this template use File | Settings | File Templates.
 */ ?>

<!--



<ul>
    <li><?php echo $user['username'] ?></li>
    <li><?php echo $user['email'] ?></li>
    <li><?php echo $user['cash'] ?></li>
</ul>
-->


<table class="table table-striped">
	<tr>
		<td>Username</td>
		<td>Email</td>
		<td>Cash</td>
	</tr>
	<tr>
		<td><?php echo $user['username'] ?></td>
		<td><?php echo $user['email'] ?></td>
		<td><?php echo $user['cash'] ?></td>
	</tr>

</table>
