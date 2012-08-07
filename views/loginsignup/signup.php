<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/22/12
 * Time: 1:05 PM
 * To change this template use File | Settings | File Templates.
 */

?>

<?php echo validation_errors(); ?>

<!--<?php // echo form_open('signup/signup'); ?> -->

<form method="post" action="/CodeIgniter_2.1.1/index.php/signup/signups" >
    <h5>Username</h5>
    <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

    <h5>Password</h5>
    <input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

    <h5>Password Confirm</h5>
    <input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

    <h5>Email Address</h5>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

    <div><input type="submit" value="Submit" /></div>
</form>
