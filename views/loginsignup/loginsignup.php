<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 9:09 AM
 * To change this template use File | Settings | File Templates.
 */
$this->load->helper('url');
?>


<ul class="gate_login_signup_links">
    <li>
	    <form style="display: inline" action="/CodeIgniter_2.1.1/index.php/signup/signups" method="get">
	 		<button class="btn btn-primary btn-large">Sign Up</button>
		</form>
	</li>
    <li>
	    <form style="display: inline" action="/CodeIgniter_2.1.1/index.php/signup/login" method="get">
	 		<button class="btn btn-info btn-large">Login</button>
		</form>
	</li>
</ul>


<div class="gate_image"> 
	<img  src="<?php echo base_url() ?>application/CIFormTutorial/views/assets/images/green-business-graph.jpg" alt="Smiley face" height="400" width="700" />
</div>


