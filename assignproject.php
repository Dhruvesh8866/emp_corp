<?php

session_start();
if(!isset($_SESSION['id'])){	header("Location: ..//alogin.html");}

require_once ('process/dbh.php');
$sql = "SELECT * from `project` order by subdate desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Project Status |  Admin Panel | EMP Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	<header>
		<nav>
			<h1>EMP Corp.</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<!-- <li><a class="homeblack" href="addemp.php">Add Employee</a></li> -->
				<li><a class="homeblack" href="viewemp.php">Manage Employees</a></li>
				<li><a class="homeblack" href="assign.php">Create Project</a></li>
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

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
							$query="SELECT * FROM project WHERE CONCAT(pid,eid,pname) LIKE '%$filtervalues%' ";
							$query_run = mysqli_query($conn, $query);

							if(mysqli_num_rows($query_run) > 0){ 
								?>
								<table class="table table-bordered">
								<thead>
								<th align = "center">Project ID</th>	
								<th align = "center">Emp. ID</th>
								<th align = "center">Role</th>
								<th align = "center">Project Name</th>
								<th align = "center">Due Date</th>
								<th align = "center">Submissioin Date</th>
								<th align = "center">Marks</th>
								<th align = "center">Status</th>
								</thead>
								<tbody>		
								<?php	
								foreach($query_run as $items)
								{
									?>
									<tr>
										<td><?=$items['pid'];   ?></td>
										<td><?=$items['eid'];   ?></td>
										<td><?=$items['emp_role'];   ?></td>
										<td><?=$items['pname'];   ?></td>
										<td><?=$items['duedate'];   ?></td>
										<td><?=$items['subdate'];   ?></td>
										<td><?=$items['mark'];   ?></td>
										<td><?=$items['status'];   ?></td>
									</tr>
									<?php
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

	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Projects</h2>
		<table>
			<tr>

				<th align = "center">Project ID</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Role</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Submission Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
				
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['eid']."</td>";
					echo "<td>".$employee['emp_role']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['duedate']."</td>";
					echo "<td>".$employee['subdate']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Mark</a>"; 

				}


			?>

		</table>
		
	
</body>
</html>