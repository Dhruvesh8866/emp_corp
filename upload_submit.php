<?php
$pid = $_GET['pid'];
$id = $_GET['id'];
?>
<html>
<head>
  <title>Submit Project | EMP Corporation</title>
  <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
  <header>
    <nav>
      <h1>EMP Corp.</h1>
      <ul id="navli">
        <li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
        <li><a class="homered" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
        <li><a class="homeblack" href="#">Apply Leave</a></li>
        <li><a class="homeblack" href="elogout.php">Log Out</a></li>
      </ul>
    </nav>
  </header>

 <div class="divider"></div>
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Submit Task</h2>
                    <form id = "registration" action="psubmit.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="file" name="pid" value="<?php echo $pid; ?>" style="display:none">
                    <input type="text" placeholder="file" name="id" value="<?php echo $id; ?>" style="display:none">

                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="file" name="file">
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>

 <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>