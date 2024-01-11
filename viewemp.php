<?php

session_start();
if(!isset($_SESSION['id'])){	header("Location: ..//alogin.html");}

require_once ('process/dbh.php');
$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Manage Employees |  Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">

</head>
<body>
	<header>
		<nav>
			<h1>EMP Corp.</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homered" href="viewemp.php">Manage Employees</a></li>
				<!--
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="#">Salary Table</a></li>
				<li><a class="homeblack" href="#">Employee Leave</a></li> -->
				<li><a class="homeblack" href="alogout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>
	<div id="divimg">
		
	<!--changes start-->
	<center><div id="searchdiv" class="searchdiv" style="margin-top:10px">
		<form method="GET">
			<input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search data" style="height:44px;width:500px;font-size:18px"> 
			<button type="submit" class="btn btn--radius btn--green">Search</button>
		</form> 
	</div></center>
	<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-body">
					
						<?php 
						require_once ('process/dbh.php');

						if(isset($_GET['search'])){
							$filtervalues= $_GET['search'];
							$query="SELECT * FROM employee WHERE CONCAT(id,firstName,lastName,gender,dept,skills) LIKE '%$filtervalues%' ";
							$query_run = mysqli_query($conn, $query);

							if(mysqli_num_rows($query_run) > 0){ 
								?>
								<table class="table table-bordered">
								<thead>
								<th align = "center">Emp. ID</th>
								<th align = "center">Picture</th>
								<th align = "center">Name</th>
								<th align = "center">Email</th>
								<th align = "center">Birthday</th>
								<th align = "center">Gender</th>
								<th align = "center">Contact</th>
								<th align = "center">NID</th>
								<th align = "center">Skills</th>
								<th align = "center">Department</th>
								<th align = "center">Degree</th>
								<th align = "center">Options</th>
								</thead>
								<tbody>		
								<?php	
								while ($employee = mysqli_fetch_assoc($query_run)) {
									echo "<tr>";
									echo "<td>".$employee['id']."</td>";
									echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
									echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
									echo "<td>".$employee['email']."</td>";
									echo "<td>".$employee['birthday']."</td>";
									echo "<td>".$employee['gender']."</td>";
									echo "<td>".$employee['contact']."</td>";
									echo "<td>".$employee['nid']."</td>";
									echo "<td>".$employee['skills']."</td>";
									echo "<td>".$employee['dept']."</td>";
									echo "<td>".$employee['degree']."</td>";				
									echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
									
								}
							}
							else{
								?>
								<tr>
									<td colspan="5">No Record Found</td>
								</tr>
								<?php

							}
						}
						?>
						
					</tbody>
					</table>
					</div>
				</div>
			</div>
		<!--changes end-->	

		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">List of Empolyees </h2>

		<table>
			<tr>

				<th align = "center">Emp. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">NID</th>
				<th align = "center">Skills</th>
				<th align = "center">Department</th>
				<th align = "center">Degree</th>
				<th align = "center">Point</th>
				

				<th align = "center">Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
					echo "<td>".$employee['nid']."</td>";
					echo "<td>".$employee['skills']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['degree']."</td>";
					echo "<td>".$employee['points']."</td>";

					echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}


			?>

		</table>
	</div>	
	
</body>
</html>