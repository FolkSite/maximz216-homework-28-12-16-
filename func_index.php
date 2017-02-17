<?php
// save comments in file 
if (file_exists('comments.txt')){
    $comments=get_comments();
}

function get_comments(){
    return unserialize(file_get_contents('comments.txt'));
}
function save_comments($comments){
    return file_put_contents('comments.txt',serialize($comments));
}

if (isset($_POST['result'])){
 if (empty($_POST['comment'])){
	 echo "Введите коментарий";
 } else {
    $data = [
        'login' => $_SESSION['name'],
        'comment' => $_POST['comment'] ,
		'time' => date("Y-m-d H:i:s"),
        'check' => 1
    ];
	 $data = badWord($data);
     $comments[] = $data;
     save_comments($comments);
     header('Location: /index.php');
	}
 
}

// change bad words in comment on ***
function badWord($data){
     $bad= getBadWords();
     for($j=0;$j<count($bad); $j++){ 
     foreach ($data as $key=>$value){
		 $data[$key]=str_replace($bad[$j], 'I write bad words, I am bad((((', $value);   
     }
	 }
     return $data;
}

if (file_exists('bad.txt')){
    $badWords=getBadWords();
}
// save new bad words in file bad.txt
function saveBadWords($badWords){
    return file_put_contents('bad.txt',serialize($badWords));
}
// get bad words from file bad.txt
function getBadWords(){
    return unserialize(file_get_contents('bad.txt'));
}
// define bad words in comments

if (isset($_POST['addBad'])){
     if (isset($_POST['bad'])){
          $badWords[]=$_POST['bad'];
          saveBadWords($badWords);
          header('Location: /adm.php');
     }
}

if (isset($_POST['delBad'])){
     if (isset($_POST['badDel'])){
		 $badWordDelete=$_POST['badDel'];
		 $key1 = array_search($badWordDelete ,$badWords);
		 array_splice($badWords,$key1,1);
        saveBadWords($badWords);
        header('Location: /adm.php');
     }
}

// hide comments in table
function viewComments($checkComment){
	if ($checkComment == 0) {
	  $hideComments = 'hidden';
	}
	return $hideComments;
}

?>