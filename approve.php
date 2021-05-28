<?php 
// Connection info.
$conn=mysqli_connect('localhost:3308
	','root','','registration');
session_start();
	$intr = '';
	if(!empty($_POST['checkboxx'])) {
		foreach($_POST['checkboxx'] as $check) {
			$intr.=$check;
			if ($intr) $intr .= ',';
		}
	}
	$newarraynama = rtrim($intr, ", ");
	echo $newarraynama;
	$r = "Yes";
	$a = "Pending Approval";
	if ($q = $conn->prepare("UPDATE persons SET recruited = ?,approval = ? WHERE id IN (?) ")) {
		$q->bind_param('sss', $r, $a, $newarraynama);
		$q->execute();
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else{
		echo "sql error";
	}
	$conn->close();
	$q->close();

?>