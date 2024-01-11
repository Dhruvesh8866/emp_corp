<?php

session_start();
if(!isset($_SESSION['id'])){	header("Location: ..//alogin.html");}

require_once ('process/dbh.php');

//$sql = "SELECT * from `employee_leave`";
$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token From employee, employee_leave Where employee.id = employee_leave.id order by employee_leave.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Employee Leave | Admin Panel | EMP Corporation</title>
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
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homered" href="empleave.php">Employee Leave</a></li>
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
							$query="SELECT * FROM employee_leave WHERE CONCAT(id,token) LIKE '%$filtervalues%' ";
							$query_run = mysqli_query($conn, $query);

							if(mysqli_num_rows($query_run) > 0){ 
								?>
								<table class="table table-bordered">
								<thead>
								<th align = "center">Emp. ID</th>
								<th align = "center">Token</th>
								<th align = "center">Start Date</th>
								<th align = "center">End Date</th>
								<th align = "center">Reason</th>
								<th align = "center">Status</th>
								</thead>
								<tbody>		
								<?php	
								foreach($query_run as $items)
								{
									?>
									<tr>
										<td><?=$items['id'];   ?></td>
										<td><?=$items['token'];   ?></td>
										<td><?=$items['start'];   ?></td>
										<td><?=$items['end'];   ?></td>
										<td><?=$items['reason'];   ?></td>
										<td><?=$items['status'];   ?></td>
									</tr>
									<?php
								}
							}
							else{
								?>
								<tr>
									<td colspan="2">No Record Found</td>
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

	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave applications</h2>	
	<table>
			<tr>
				<th>Emp. ID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";

				}


			?>

		</table>
		
	</div>
</body>
</html>