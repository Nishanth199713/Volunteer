<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
</head>
<!--<style >
	#userctn{
	background-color: white;
	width: 100%;
	margin:auto;
	border-collapse: collapse;
    border-spacing: 0;
	

}
.user-list{
	display: table;
	padding: .2rem;
}

.user-table-head > tr >th{
	padding: 15px 13px;
	border-top: 0;
	width:.5%;
}

table,
      th,
      td {
        padding: 10px;
        border: 1px ;
        border-collapse: collapse;
      }
    tr:nth-child(odd)   { background-color:#eee; }

 tr:nth-child(even)    { background-color:#fff; }

</style>-->
<style>
table, th, td {
  border: 1px solid black;
}    
</style>
<body style="background-color:coral;">
	<br><br>
 <h1 style="text-align: center">Professor Homepage</h1>
 <?php
        $conn=mysqli_connect('localhost:3308','root','','registration');
        $sql = "SELECT id,firstname,interest,department,email, recruited, approval FROM persons";
        $result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));
      
        ?>
<br><br><br><br><br><br>
<form action="approve.php" method="post" id="reform">
	<div id ="userctn">
		<table class ="user-list" align="center">
			<thead class = "user-table-head">
				<tr class="colum" style="background-color: yellow;">
                    <th>Approve</th>
                    <th>Name</th>
					<th>Email</th>
					<th>Department</th>
					<th>Interest</th>
					<th>Recruited</th>
                    <th>Department Approval</th>
				</tr>
			</thead>
			<tbody class="user-table-body">
    			<?php while($row = $result->fetch_assoc()) {
				echo "
					<tr>      
                    <td>
                    <input type='checkbox' name ='checkboxx[]'  value ='{$row['id']}' >
                    
                    </td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['interest']}</td>
                    <td >{$row['recruited']}</td>
                    <td>{$row['approval']}</td>
                    
                </tr>";
                }
                ?>
			</tbody>
		</table><br>
    <center><button type="submit"  name="recruit" class="button">Recruit</button></center> <br>
    <center><button type="submit"  name="task" class="button">Assign task</button></center><br>
    <center><a href="loginmain.php"> Logout </a></center>
	</div>
</form>

</body>
</html>