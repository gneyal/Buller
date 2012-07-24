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
<ul>
    <li>
        <a href="/CodeIgniter_2.1.1/index.php/users/single/<?php echo $user['username'] ?>">
        <?php echo $user['username'] ?>
        </a>
    </li>

    <li><?php echo $user['email'] ?></li>
    <li>Cash: <?php echo $user['cash']; ?></li>
</ul>
<?php } ?>
