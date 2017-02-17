<?php
session_start();
require('func_index.php');

 function getUsers(){
     return unserialize(file_get_contents('users.txt'));
 }
 if (file_exists('users.txt')){
     $usersSave=getUsers();
 }
function saveUsers($a){
     return file_put_contents('users.txt',serialize($a));
 }
if (isset($_POST['regist'])){
 if (empty($_POST['rlogin']) || empty($_POST['rpass']) ){
	 echo "You login or password is empty. Please check it";
 } else {
    $users = [
        "name"  => $_POST['rlogin'] ,
        'pass' => $_POST['rpass'] ,
        'checked' => 0
    ];
	 $usersSave[] = $users;
     saveUsers($usersSave);
	 $_SESSION['logged'] = 'true';
     $_SESSION['name'] = strip_tags ( $_POST['rlogin']);
 header('Location: /index.php');
	}
 
}

?>