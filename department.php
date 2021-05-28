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
        border: 1px solid black;

      }

</style>
<body>
	<br><br>
 <h1 style="text-align: center">Department Homepage</h1>
 <?php
        $conn=mysqli_connect('localhost','tj_root','tj_root','volunteerlogin');
        $sql = "SELECT id,firstname,resum,aoi,department,email, recruit, approved FROM volunteer";
        $result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));
      
        ?>
<br><br><br><br><br><br>
<form action="dapproval.php" method="post" id="reform">
	<div id ="userctn">
		<table class ="user-list">
			<thead class = "user-table-head">
				<tr class="colum" style="background-color: grey;">
          <th>Selected</th>
                    <th>Name</th>
					<th>Area of interest</th>
					<th>Department</th>
					<th>Email</th>
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
                    <td>{$row['aoi']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['email']}</td>
                    <td >{$row['recruit']}</td>
                    <td>{$row['approved']}</td>
                    
                </tr>";
                
                }
                ?>
				
			</tbody>


		</table>
    <button type="submit"  class="button">Approve</button>
	</div>
</form>

</body>
</html>