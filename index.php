<?php
	require_once 'core/init.php';


	/*$userInsert = DB::getInstance()->insert('users', array(
		'username' => 'Athi',
		'password' => 'pass3',
		'salt' => 'salt'
	));

	//var_dump(Config::get('mysql/username')); //127.0.0.1


//$user = DB::getInstance()->query("SELECT username FROM users WHERE name = ? OR name = ?", array('athi', 'sbu'));

/*$user = DB::getInstance()->get('users',array('name', '=', 'sbu'));

if (!$user->count()) {
	echo "no user";
}else{

	echo $user->first()->name, '<br>';

	$user = DB::getInstance()->insert('users', array(
	'username' => 'Dale',
	'password' => 'pass3',
	'salt' => 'salt'
));

$user = DB::getInstance()->update('users',5, array(
	'password' => 'newpass3',
	'salt' => 'salt'
));

}*/

if (Session::exists('home')) {
	echo "<p>".Session::flash('home')."</p>";
}

$user = new User();
if ($user->isLoggedIn()) {
?>
		<p>Hello <a href="#"><?php echo escape($user->data()->username);?></a></p>
		<ul>
		  <li><a href="logout.php">Log out</a></li>
			<li><a href="update.php">Update details</a></li>
			<li><a href="changepassword.php">Change password</a></li>
		</ul>
<?php
	if ($user->hasPermission('admin')) {
		echo "<p>You are admin</p>";
	}
} else{
	echo "<p>You need to <a href=\"login.php\">login</a> or <a href=\"register.php\">register</a></p>";
}

//$another = new User();
