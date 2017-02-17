<?php
require_once('func_index.php');
for ($i=0; $i<count($comments);$i++) {
if (isset($_POST['chooseComment'.$i])){
header('Location: /adm.php');	
}
}
function checkComments1($checkComment){
	if ($checkComment == 1) {
	  $chooseCommentsHidden = 'checked';
	}
	return $chooseCommentsHidden;
}
?>