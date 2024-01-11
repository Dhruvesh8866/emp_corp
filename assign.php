<!DOCTYPE html>
<html>

<head>
   

    <!-- Title Page-->
    <title>Assign Project | Admin Panel</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <style>
        td .tableinp{
        position: relative;
        margin-bottom: 10px;
        margin-top:10px;
        margin-right:10px;
        border-bottom: 1px solid rgb(20, 19, 19);
        width:80px;
        }
    
    </style>

    <!--<script>
    $(document).ready(function(){
        $('#empid').keyup(function(){
            var query=$(this).val();
            if(query!='')
            {
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#employeeList').fadeIn();
                        $('#employeeList').html(data);
                    }
                });
            }
        });
    });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function(){
           var html='<tr><td><input type="text" placeholder="Employee ID" name="eid[]" id="empid" required="required"></td><td><input type="text" placeholder="Role" name="txtemprole[]" required="required"></td><td><input class="btn btn--radius btn--green" type="button" name="remove" id="remove" value="Remove"></td></tr>'; 
           
           var max=10;
           var x=1;
           $("#add0").click(function(){
                if(x<=max){
                    $("#table_field").append(html);
                    x++;
                }
           });
           $("#table_field").on('click','#remove',function(){
               $(this).closest('tr').remove();
               x--;

           });

        });
    </script>

</head>

<body>
    <header>
        <nav>
            <h1>EMP Corp.</h1>
            <ul id="navli">
                <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
                <!-- <li><a class="homeblack" href="addemp.php">Add Employee</a></li>-->
                <li><a class="homeblack" href="viewemp.php">Manage Employees</a></li>
                <li><a class="homered" href="assign.php">Create Project</a></li>
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
                <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li> 
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="divider"></div>




    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title"><b>Create Project</b></h2>
                    <form action="process/assignp.php" method="POST" enctype="multipart/form-data">
                        

                         <!--<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Employee ID" name="eid" required="required">
                         </div>-->


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Project Name" name="pname" required="required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Project Description" name="pdesc" required="required">
                        </div>

                        <!--<div class="input-group">
                          <input class="input--style-1" type="number" placeholder="Number of Employees" name="no_emp" onkeyup="showTeamInput(this.value)">
                            
                        </div>
                        <div id="teamInput" >  </div> -->
                        <div>
                        <table width="500" id="table_field">
                            <!--<tr>
                                <th>Employee id</th>
                                <th>Role</th>
                                <th>Add or Remove</th> -->
                            </tr>
                            <tr>
                               <td><input type="text" placeholder="Employee ID" name="eid[]" id="empid" required="required"></td>
                               <td><input type="text" placeholder="Role" name="txtemprole[]" required="required"></td>
                               <td><input class="btn btn--radius btn--green" type="button" name="add" id="add0" value="Add"></td> 
                            </tr>
                        </table>
                        <div id="employeeList"></div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="date" name="duedate" required="required">
                                   
                                </div>
                                <div class="input-group">
                                    <input class="input--style-1" type="file" placeholder="file" name="file">
                                </div>
                            </div>
                            
                        </div>
                        
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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



<!-- end document-->
