<?php
if  (!isset($_COOKIE['session_name'])){
	session_start();
    setcookie('session_name', $_SESSION['name'],time()+3600);
}else{
	session_id($_COOKIE['session_name']);
    session_start();
}

// authorization of users
function isValidCredentials($login, $password) {
$users=unserialize(file_get_contents('users.txt'));
$countUsers=count($users);
for ($i=0; $i<$countUsers ;$i++){
   if ( $password == $users[$i]['pass'] and $login == $users[$i]['name'] ) {
	      return true;
   }
}  
return false;
}

if(isset($_POST['aresult'])){
	if(empty($_POST['alogin']) || empty( $_POST['apass'])){
		echo "Enter you login and password";
	}else{
	if(isValidCredentials(strip_tags( $_POST['alogin']), strip_tags ( $_POST['apass']))){
	    $_SESSION['logged'] = 'true';
        $_SESSION['name'] = strip_tags( $_POST['alogin']);
		header('Location: /index.php');
        die;
	}
}
}
// log in
function isLoggedIn(){
     if ( isset($_SESSION['logged']) && $_SESSION['logged'] == 'true') {
        return true;
    }

    return false;

}
$loggedUser = isLoggedIn();

//  log out
function logout(){

	setcookie('session_name', $_SESSION['name'],1);
	session_destroy();
	header('Location: index.php');
}

if(isset($_POST['logout'])) {
    logout();
}
// change the appearance for users
function changePosition(){
    if (isset($_POST['posSubmit'])) {
        if ($_POST['position'] == 'center') {
            $style = ' <style>
	.table{
      text-align:center;
	  color:red;}
	</style>';
        } elseif ($_POST['position'] == 'right') {
            $style = ' <style>
	.table{
      text-align:right;
	  color:green;}
	</style>';
        } else {
            $style = ' <style>
	.table{
      text-align:left;
	  color:black;}
	</style>';
        }
    }
	return $style;
}
?>