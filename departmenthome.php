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
<style >

table,
      th,
      td {
      
        border: 1px solid black;

      }

</style>
<body style="background-color:coral;">
	<br><br>
 <h1 style="text-align: center">Department Homepage</h1>
 <?php
        $conn=mysqli_connect('localhost:3308','root','','registration');
        $sql = "SELECT id,firstname,email,department,interest,recruited, approval FROM persons ";
        $result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));
      
        ?>
<br><br><br><br><br><br>
<form action="dapproval.php" method="post" id="reform">
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


		</table>
    <center><button type="submit"  class="button">Approve</button></center>
    <center><a href="loginmain.php"> Logout </a></center>
	</div>
</form>

</body>
</html>