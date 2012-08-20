<h1>Buller - Follow Profitable Portfolios</h1>

<h4>I will now describe the site features in words:</h4>

<p>Every Signed in user gets 1000$ to her account. With this money she can buy and sell stocks, which will be presented on her single user page. You <strong>can't</strong> buy more stocks than your cash.</p>

<ul>
	<li>
		Navigation bar (Every page has the navigation bar in it):
		<br/>
		The navigation bar functions differently when logged-in Vs. when logged-out.
		<ul>
			<li>
				Logged-in:
					<ul>
						<li>You - access your private acount directly.</li>
						<li>Users - Go to users list.</li>
						<li>Stocks - Go to stocks list.</li>
						<li>Logout - Logout and redirected to the home page.</li>
					</ul>
			</li>
			<li>
				Logged-out:
					<ul>
						<li>Signin - sign in to the site.</li>
						<li>Login - login, go to users page.</li>
					</ul>
			</li>
		</ul>
	</li>

	<li>
		Single User Page:
			You are able to go over other users details in this page.
			If you enter your Single User Page then you can also Sell stocks (or "close" positions)
	</li>

	<li>
		Users page:
			In this page you can see all the users sorted by the user portfolio profit (where most profitable is on top).
			From this page you can access the single user page of each user on that list.
	</li>

	<li>
		Stocks page:
			In this page you can see the stocks that are available to buy. The list is currently maintained by hand, and includs only 5 stocks (Microsoft, Amazon, Google, Vista Gold and Yahoo!). This is due to the high latency from Yahoo!(I use the data from Yahoo!)
	</li>
	<li>
		Single stock page:
		Here you can see more details about a certain stock, you can also Buy it here.
	</li>
</ul>

<p>Under the hood:
	<ul>
		<li>I use MD5 to save password in DB.</li>
		<li>CodeIgniter is used.</li>
		<li>Twitter Bootstrap is used.</li>
	</ul>
</p>

<p>Known issues:
	<ul>
	<li>some url issues - there might be a problem deploying</li>
	<li>HTML validator is complaning about the single user page, where it says there is a missing "p" tag - there isn't!</li>
	<li>HTML validator is complaning about the "about" page (this page), where it says there is a missing "p" tag - there isn't!</li>
	</ul>
</p>
Database setup:

mysql> describe users;
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int(11)     | NO   | PRI | NULL    | auto_increment |
| username | varchar(40) | NO   | UNI | NULL    |                |
| password | varchar(40) | NO   |     | NULL    |                |
| email    | varchar(40) | NO   | UNI | NULL    |                |
| cash     | int(11)     | YES  |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
5 rows in set (0.00 sec)

mysql> describe positions;
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| id        | int(11)     | NO   | PRI | NULL    | auto_increment |
| username  | varchar(40) | NO   |     | NULL    |                |
| symbol    | varchar(20) | NO   |     | NULL    |                |
| amount    | int(40)     | NO   |     | NULL    |                |
| buy_price | double      | YES  |     | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
5 rows in set (0.00 sec)

