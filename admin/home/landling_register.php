<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Employee Portal</title>
</head>

<body class="bg-gradient-primary">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
            <?php include('../includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include ('../includes/topbar.php'); ?>
                <!-- End of Topbar -->

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-1">
                <!-- Nested Row within Card Body -->

                    <div class="col-sm-12">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Employee Information</h1>
                            </div>
                            <div class="d-flex">
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-1 mb-sm-2">
                                    <input type="employee_code" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Employee Code:"readonly> 
</div>                
                                <div class="col-sm-7">
                                    <div class="col-sm-15 mb-1 mb-sm-2">
                                    <input type="code" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="130"readonly>                             
                                    </div>
                                </div>                          
                                    <div class="col-sm-5 mb-1 mb-sm-2">
                                    <input type="full_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Full Name:"readonly> 
                                                               
                                    </div> 
                                    <div class="col-sm-7">                    
                                    <div class="col-sm-15 mb-1 mb-sm-2">
                                <input type="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Reynaldo Aquit"readonly>                              
                                    </div>
                                </div>
                                <div class="col-sm-5 mb-1 mb-sm-2">
                                    <input type="address" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Address:"readonly>                                 
                                </div>
                                <div class="col-sm-7">
                                <div class="col-sm-15 mb-1 mb-sm-2">
                                <input type="location" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Ozamiz City, Misamis Occidental "readonly>   
                                </div>
                                </div>
                    
                                <div class="col-sm-5 mb-1 mb-sm-2">
                                    <input type="landline" class="form-control form-control-user color: #000" id="exampleFirstName"
                                            placeholder="Landline No.:"readonly>                           
                                   
                                </div>                             
                                <div class="col-sm-7">
                                <div class="col-sm-15 mb-1 mb-sm-2">
                                <input type="land_num" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="NA"readonly>                               
                                    </div>
                                </div>
                                <div class="col-sm-5 mb-1 mb-sm-2">
                                    <input type="mobile" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Mobile No.:"readonly>                         
                                </div>                                 
                                <div class="col-sm-7">
                                <div class="col-sm-15 mb-1 mb-sm-2">
                                <input type="mob_num" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="0938-763-3029"readonly>                              
                                    </div>
                                
                                </div>
                                <div class="col-sm-12 mb-1 mb-sm-2">
                                    <input type="announcement" class="form-control form-control-user" id="exampleFirstName" style ="padding:50px"
                                            placeholder="Announcement:"readonly>
</div> 
                            </form>                       
                        </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-2 mb-sm-1">
                                        <input type="ID" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" ID No.: "readonly>                                                    
                                    </div>
                                    <div class="col-sm-2 mb-2 mb-sm-2">
                                    <input type="id_no" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" 22-130 "readonly>                              
                                    </div>
                                    <div class="col-sm-4 mb-1 mb-sm-2">
                                    <input type="biometric" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Biometric No.: "readonly>      
                                                                                           
                                    </div>
                                    <div class="col-sm-2 mb-1 mb-sm-2">
                                    <input type="bio_no" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" 22-130 "readonly>      
                                                                         
                                    </div>
                                    <div class="col-sm-4 mb-1 mb-sm-2">
                                    <input type=" company" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Company:"readonly>      
                                                                   
                                    </div>
                                    <div class="col-sm-8 mb-1 mb-sm-2">
                                    <input type="com_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Human Incubator Inc."readonly>      
                                                                 
                                    </div>
                                    <div class="col-sm-4 mb-1 mb-sm-2">
                                    <input type="branch" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Branch: "readonly>      
                                                                         
                                    </div>
                                    <div class="col-sm-8 mb-1 mb-sm-2">
                                    <input type="branch_loc" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Cebu City "readonly>      
                                                                          
                                    </div>
                                    <div class="col-sm-4 mb-1 mb-sm-2">
                                    <input type="position" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Position:  "readonly>      
                                                                          
                                    </div>
                                    <div class="col-sm-8 mb-1 mb-sm-2">
                                    <input type="pos_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Software Engineer "readonly>      
                                                                     
                                    </div>
                                    <div class="col-sm-4 mb-1 mb-sm-2">
                                    <input type="pay_group" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Payroll Group: "readonly>      
                                                          
                                    </div>
                                    <div class="col-sm-8 mb-1 mb-sm-2">
                                    <input type="pay_group_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder=" Resigned  "readonly>        
                                                            
                                    </div>
                                    <div class="col-sm-12 mb-1 mb-sm-2">
                                    <input type="leave_type" class="form-control form-control-user" id="exampleFirstName" style ="padding:50px"
                                            placeholder="Leave Type:"readonly>
                                </div>  
                                </div>  
                            </form>              
                        </div>                     
                    </div>
<style>
    body {font-family: Verdana;}

/* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #000;
        background-color: #f1f1f1;
        border-top:1px solid #000;
        border-style:solid;
        border-radius:0.35rem;
        }

/* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 15px;
        }

/* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
        }

/* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
        }

/* Style the tab content */
    .tabcontent {
        display: none;
        border: 1px solid #000;
        border-style: solid;
        border-radius:0.35rem;
        border-top:none;
        }
</style>
<body>

    <div class="card-body p-1">
        <div class="col-lg-15 ">  
        <div class="tab">
        <div class="form-group row">

            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'DTR')">DTR</button>
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'DTR Logs')">DTR Logs</button>
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'OT Application')">OT Application </button>
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'Change_shift')">Change Shift</button>
            </div>
            <div class="col-sm-1.5 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'Leave_app')">Leave Application</button> 
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'Payroll')">Payroll</button>
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'Income_payslip')">Other Income Payslip</button>
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'Loan')">Loan</button>
            </div>
            <div class="col-sm-1.5 mb-0 mb-sm-0">
                <button class="tablinks" onclick="openCity(event, 'Month')">13th Month</button>
            </div>
        </div>
      
        </div>
      </div>

<div id="DTR" class="tabcontent">
  <h3>DTR Information</h3>
  <p>DTR Information</p> 
</div>

<div id="DTR Logs" class="tabcontent">
    <h3>DTR Logs</h3>
    <p>DTR Logs</p>
</div>

<div id="OT Application" class="tabcontent">
    <h3>OT Application</h3>
    <p>OT Application</p>
</div>

<div id="Leave_app" class="tabcontent">
    <h3>Leave_app</h3>
    <p>Leave_app</p>
</div>

<div id="Change_shift" class="tabcontent">
  <h3>Change_shift</h3>
  <p>Change_shift</p> 
</div>

<div id="Payroll" class="tabcontent">
    <h3>Payroll</h3>
    <p>Payroll</p>
</div>

<div id="Income_payslip" class="tabcontent">
    <h3>Income_payslip</h3>
    <p>Income_payslip</p>
</div>

<div id="Loan" class="tabcontent">
    <h3>Loan</h3>
    <p>Loan</p>
</div>
<div id="Month" class="tabcontent">
    <h3>Month</h3>
    <p>Month</p>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
    <!-- Start of Modal -->
    <?php include ('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
        <?php include ('../includes/bottom.php'); ?>
    <!-- End of Bottom -->

</body>

</html>