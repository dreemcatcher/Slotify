<?php
if(isset($_POST['loginButton'])){
  //echo "loginbutton was pressed";
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true){
		header("Location: index.php");
	}
}
?>