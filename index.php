<?php
require('autorization.php');
require('func_index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
 </head>
<body>
<header>

<?php if(isLoggedIn()) {?>

    <h2>Hi, <?php echo $_SESSION['name'] ?>!</h2>
	  
     <p><form action=""method="post">
        <input type="submit" name="logout" value="Log Out">
    </form></p>
	
	<h2>Сhoose your style </h2>
	<p><form action=""method="post">
	   <input type="radio" name="position" value="left" >left and color "black"<Br>
       <input type="radio" name="position" value="center">center and color "red"<Br>
       <input type="radio" name="position" value="right">right and color "green"<Br>
	   <input type="submit" name="posSubmit" value="Edit">
	</form></p>
	 
	     <?php 
		 $users=unserialize(file_get_contents('users.txt'));
		 for ($i=0; $i<count($users);$i++){
	     if(isLoggedIn() and $_SESSION['name'] == $users[$i]["name"] and $users[$i]["checked"] == 1) {
		 ?>
	  
	  <p> <form>
        <input type="button" value="Admin" onClick='location.href="adm.php"'>
	  </form></p>
	<?php } 
	      } 
          }else{ 
	?>
    <p> <form>
        <input type="button" value="Sign In" onClick='location.href="login1.php"'>
        <input type="button" value="Create Accaunt" onClick='location.href="reg.php"'>
    </form></p> 
<?php } ?>

</header>
 <?php if(isLoggedIn()) {?>
      <h2>Post a comment</h2>
         <form action="" method="POST" enctype="multipart/form-data" >
	     <p><input type="textarea" name="comment" value=""> Comment</p>
	     <p><input type="submit" name="result" value="Send"></p>
         </form>
     <?php } ?>
 <div><h2>Comments</h2></div>
	<table class="table"  border="1px" >
		<?php echo changePosition();?>
        <thead>
            <th>User</th>
            <th>Comment</th>
			<th>time</th>
        </thead>
		
         <?php for ($i=0; $i<count($comments);$i++){
		  $login = $comments[$i]['login'];
		  $comment = $comments[$i]['comment'];
		  $dateCom = $comments[$i]['time'];
		  $checkComment= $comments[$i]['check'];
		  ?>
		 
       <tbody>
		<tr  class="hide" <?php echo viewComments($checkComment); ?>  >
		    <td><?php echo $login;?></td>
            <td><?php echo $comment ;?></td>
			<td><?php echo $dateCom;?></td>
            <td hidden ><?php echo $checkComment;?></td>
        </tr>
		</tbody>
		 <?php } ?>
    </table>
    
</body>
</html>