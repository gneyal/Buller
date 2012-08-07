<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 9:02 AM
 * To change this template use File | Settings | File Templates.
 */
?>


<?php echo validation_errors(); ?>

<?php echo form_open('signup/login'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

