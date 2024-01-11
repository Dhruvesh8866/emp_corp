<?php 

session_start();
if(!isset($_SESSION['id'])){	header("Location: ..//alogin.html");}
//$id = (isset($_SESSION['id']) ? $_SESSION['id'] : '');

require_once ('process/dbh.php');
$sql = "SELECT id, firstName, lastName, dept, skills,  points FROM employee, rank WHERE rank.eid = employee.id order by employee.id asc";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Admin Panel | EMP Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
<!--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>
<body>
	
	<header>
		<nav>
			<h1>EMP Corp.</h1>
			<ul id="navli">
				<!--
			<li><a class="homered" href="#">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="#">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="#">Log Out</a></li> -->

                
				<li><a class="homered" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="viewemp.php">Manage Employees</a></li>
				<li><a class="homeblack" href="assign.php">Create Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
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
							$query="SELECT * FROM employee WHERE CONCAT(id,firstName,lastName,dept,skills) LIKE '%$filtervalues%' ";
							$query_run = mysqli_query($conn, $query);

							if(mysqli_num_rows($query_run) > 0){ 
								?>
								<table class="table table-bordered">
								<thead>
								<th align = "center">Emp. ID</th>
								<th align = "center">First Name</th>
								<th align = "center">Last Name</th>
								<th align = "center">Department</th>
								<th align = "center">Skills</th>
								</thead>
								<tbody>		
								<?php	
								foreach($query_run as $items)
								{
									?>
									<tr>
										<td><?=$items['id'];   ?></td>
										<td><?=$items['firstName'];   ?></td>
										<td><?=$items['lastName'];   ?></td>
										<td><?=$items['dept'];   ?></td>
										<td><?=$items['skills'];   ?></td>
									</tr>
									<?php
								}
							}
							else{
								?>
								<tr>
									<td colspan="5"><Center>No Record Found</center></td>
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

		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>
		<table>

			<tr bgcolor="#000">
				<th align = "center">Seq.</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Department</th>
				<th align = "center">Skills</th>
				<th align = "center">Points</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['skills']."</td>";
					echo "<td>".$employee['points']."</td>";
					
					$seq+=1;
				}

				#if(isset($_POST["submit"])){
				#	$str=$_POST["search"];
				#	$abc= "SELECT id, firstName, lastName, dept, skills FROM employee WHERE firstname = '$str' or lastName = '$str' dept = '$str' or skills = 'str' order by employee.id asc"; 
				#	$result= mysqli_query($conn,$abc);
                 #   $seq = 1;
					# while ($employee = mysqli_fetch_assoc($result)) {

				#   echo "<tr>";
				#	echo "<td>".$seq."</td>";
				#	echo "<td>".$employee['id']."</td>";
				#	
				#	echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
				#	echo "<td>".$employee['dept']."</td>";
				#	echo "<td>".$employee['skills']."</td>";
				#
				#	
				#	$seq+=1;
				#}
				#}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
		</div>

		
	</div>

</body>
</html>