<?php
require('func_index.php');
require('autorization.php');
require('func_adm.php');
$users=unserialize(file_get_contents('users.txt'));
for ($i=0; $i<count($users);$i++){
if($_SESSION['name'] == $users[$i]['name'] && $users[$i]["checked"] == 1) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADM</title>
</head>
<body>
<?php print_r($badWords);?>
<h2>Add bad words</h2>
<form action="" method="post">
    <input type="text" name="bad" value="" >add bad word<Br>
    <input type="submit" name="addBad" value="add"><Br>
</form>
<h2>Delete bad words</h2>
<form action="" method="post">
    <input type="text" name="badDel" value="" >delete bad word<Br>
    <input type="submit" name="delBad" value="Delete"><Br>
</form>
<h1>Comment</h1>
<table class="table"  border="1px" >
    <thead>
    <th>User</th>
    <th>Comment</th>
    <th>time</th>
    </thead>
<?php 
	for ($i=0; $i<count($comments);$i++) {
    $login = $comments[$i]['login'];
    $comment = $comments[$i]['comment'];
    $dateCom = $comments[$i]['time'];
	$checkComment = $comments[$i]['check'];
?>
<tbody>
<tr>
<td><?php echo $login;?></td>
<td><?php echo $comment;?></td>
<td><?php echo $dateCom;?></td>
<td><?php echo $checkComment;?></td>
<td>
<form  method="post">
<input type="checkbox" name=<?php echo checkComment.$i." ".checkComments1($checkComment);?> value="1">
<input type="submit" name=<?php echo chooseComment.$i; ?> value="choose">
</form>
</td>
<?php
if (isset($_POST['chooseComment'.$i])) {
	if ($_POST['checkComment'.$i] == 1) {
	   $comments[$i]['check'] = 1;

	} elseif ($_POST['checkComment'.$i] == 0){
        $comments[$i]['check'] = 0;
 	}
	save_comments($comments);
	}
?>
</tr>
</tbody>
<?php } ?>

</table>
<p>Back to main page</p>
<p>
<form>
     <input type="button" value="main" onClick='location.href="index.php"'>
</form>
</p>
</body>
</html>
<?php
}else{
header('Location: /index.php');
}
}
?>

