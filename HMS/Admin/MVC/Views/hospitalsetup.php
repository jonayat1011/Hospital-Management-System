<?php
session_start();
require_once('../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../Controllers/hospitalsetupController.php');

if (isset($_GET['logout'])) {
    // Perform logout actions, such as destroying session variables
   session_destroy();
    // Redirect to the home page
    header("location: ../../../Home/MVC/Views/home.php");
    exit; // Make sure to exit after redirection to prevent further script execution
}

   // unset($_SESSION['AddDoctormess']);

if (isset($_POST['addDoctor'])) {
     unset($_SESSION['AddDoctormess']);
    // Retrieve form data
    $doctorName = $_POST['doctorName'];
    $doctorId = $_POST['doctorId'];
    $doctorPassword = $_POST['doctorPassword'];
    $doctorAge = $_POST['doctorAge'];
    $doctorGender = $_POST['doctorGender'];
    $doctorPhone = $_POST['doctorPhone'];
    $doctorEmail = $_POST['doctorEmail'];

    $res = addDoctorToDatabase($doctorName, $doctorId, $doctorPassword, $doctorAge, $doctorGender, $doctorPhone, $doctorEmail);
    if (!$res) {
        $mass = $_SESSION['AddDoctormess'];
        unset($_SESSION['AddDoctormess']);
    }
    else{
        $mass = $_SESSION['AddDoctormess'];
        unset($_SESSION['AddDoctormess']);
    }
}

if(isset($_GET['searchByIdButton'])){
  
  $SearchbyID=$_GET['SearchbyID'];

$SearcheddoctorName=Search($SearchbyID,"user_name","doctor");

}

$SearcheddoctorName="ddddddd"

?>




<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="Styles.css">
    
    <link rel="stylesheet" href="hospitalSetupBodyStyles.css">
    <style>
        .mass p {
    color: red;
}
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <div class="search-container">
        <input type="text" class="search-bar" placeholder="Search...">
        <button class="search-btn">Search</button>
    </div>
    <div class="Profile">
        <img src="img/notification.jpeg" alt="Notification" class="round-btn" onclick="openNotification()">
        <img src="img/profile.png" alt="Profile" class="round-btn" onclick="openProfile()">
    </div>
</header>
<section>
    <nav>
        <div>
            
            <button class="navButton" onclick="openHome()">
                <img src="img/home" alt="Home">
                <span>Home</span>
            </button>
            <button class="navButton" onclick="openDashboard()">
                <img src="img/dashboard.png" alt="Dashboard">
                <span>Dashboard</span>
            </button>
            <button class="navButtonOpen" onclick="openHospitalSetup()">
                <img src="img/hospital.png" alt="Hospital Setup">
                <span>Hospital Setup</span>
            </button>
            <button class="navButton" onclick="openInventory()">
                <img src="img/inventory.png" alt="Inventory">
                <span>Inventory</span>
            </button>
            <button class="navButton" onclick="openReport()">
                <img src="img/report.png" alt="Report">
                <span>Report</span>
            </button>
            <button class="navButton" onclick="openSettings()">
                <img src="img/settings.png" alt="Settings">
                <span>Settings</span>
            </button>
            <button class="navButton" onclick="logout()">
                <img src="img/logout.png" alt="Logout">
                <span>Logout</span>
            </button>
            
        </div>
    </nav>

      <aside>
        <section class="hospitalSetupBody">

           <div class="userIdentity">
                <?php $UserName= $_SESSION['name']; ?>
                <p><b>Hey! <?php echo $UserName; ?> -</b> here's what's happening with your hospital Setup today ..</p>
            </div>

            <div class="userAndSetupContainer">
                <div class="userButtons">
                    <button class="DoctorSetupbtn active" onclick="showSection('DoctorSetup')">Doctor Setup</button>
                    <button class="StaffSetupbtn" onclick="showSection('StaffSetup')">Staff Setup</button>
                    <button class="PatientSetupbtn" onclick="showSection('PatientSetup')">Patient Setup</button>
                    <button class="DepartmentSetupbtn" onclick="showSection('DepartmentSetup')">Department Setup</button>
                </div>
                <div class="setupBox">
                    <!-- Content inside the box goes here -->
                </div>
                        
            </div>


            <div class="SetupSection active" id="DoctorSetup">
                <div class="operationBackgroundBox backgroundBox">
                    <div class="operationChosen">
                        <div class="doctorButtons">
                            <!-- Buttons with data-operation attribute -->
                            <button class="DoctorSetupbtn active" data-operation="AddNewDoctor">Add New Doctor</button>
                            <button class="DoctorSetupbtn" data-operation="UpdateDoctorInfo">Update Doctor Info.</button>
                            <button class="DoctorSetupbtn" data-operation="RemoveDoctor">Remove Doctor</button>
                            <button class="DoctorSetupbtn" data-operation="ListOfDoctors">List of Doctors</button>
                        </div>
                    </div>
                    <div class="operationBody">
                        <!-- Content divs for different operations -->
                        <div class="AddNewDoctor">
                            <h1>ADD new  Doctor .</h1>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="doctorName">Name:</label>
                                    <p>Enter the name of the doctor</p>
                                    <input type="text" id="doctorName" name="doctorName">
                                </div>
                                <div class="form-group">
                                    <label for="doctorId">ID:</label>
                                    <p>Enter the unique ID of the doctor</p>
                                    <input type="text" id="doctorId" name="doctorId">
                                </div>
                                <div class="form-group">
                                    <label for="doctorPassword">Password:</label>
                                    <p>Enter a secure password for the doctor</p>
                                    <input type="password" id="doctorPassword" name="doctorPassword">
                                </div>
                                <div><p><?php echo $massID;?></p></div>
                                <div class="form-group">
                                    <label for="doctorAge">Age:</label>
                                    <p>Enter the age of the doctor</p>
                                    <input type="number" id="doctorAge" name="doctorAge">
                                </div>
                                <div class="form-group">
                                    <label for="doctorGender">Gender:</label>
                                    <p>Select the gender of the doctor</p>
                                    <select id="doctorGender" name="doctorGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="doctorPhone">Phone:</label>
                                    <p>Enter the phone number of the doctor</p>
                                    <input type="text" id="doctorPhone" name="doctorPhone">
                                </div>
                                <div class="form-group">
                                    <label for="doctorEmail">Email:</label>
                                    <p>Enter the email address of the doctor</p>
                                    <input type="email" id="doctorEmail" name="doctorEmail">
                                </div>
                                <div class="mass"><p><?php echo $mass;?></p></div>
                                <button type="submit" name="addDoctor">Submit</button>
                            </form>
                        </div>

                        <div class="UpdateDoctorInfo" style="display: none;">
                            <div class="updateHeader">
                                <h1>Update The Doctor Info.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID" name="SearchbyID">
                                    <button id="searchByIdButton" name="searchByIdButton">Search</button>
                                </div>
                            </div>
                            
                            <form>
                               <div class="form-group">
    <label for="doctorName">Name:</label>
    <p>Enter the updated name of the doctor</p>
    <input type="text" id="doctorName" name="doctorName" value="<?php echo $SearcheddoctorName; ?>" placeholder="Enter updated name">
</div>
<div class="form-group">
    <label for="doctorId">ID:</label>
    <p>This is the unique ID of the doctor</p>
    <input type="text" id="doctorId" name="doctorId" placeholder="Enter doctor ID" value="<?php echo 
    $SearcheddoctorId; ?>" readonly>
</div>
<div class="form-group">
    <label for="doctorAge">Age:</label>
    <p>Enter the updated age of the doctor</p>
    <input type="number" id="doctorAge" name="doctorAge" value="<?php echo $SearcheddoctorAge; ?>" placeholder="Enter updated age">
</div>
<div class="form-group">
    <label for="doctorGender">Gender:</label>
    <p>Select the updated gender of the doctor</p>
    <select id="doctorGender" name="doctorGender">
        <option value="male" <?php if ($SearcheddoctorGender == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($SearcheddoctorGender == 'female') echo 'selected'; ?>>Female</option>
        <option value="other" <?php if ($SearcheddoctorGender == 'other') echo 'selected'; ?>>Other</option>
    </select>
</div>
<div class="form-group">
    <label for="doctorPhone">Phone:</label>
    <p>Enter the updated phone number of the doctor</p>
    <input type="text" id="doctorPhone" name="doctorPhone" value="<?php echo $SearcheddoctorPhone; ?>" placeholder="Enter updated phone number">
</div>
<div class="form-group">
    <label for="doctorEmail">Email:</label>
    <p>Enter the updated email address of the doctor</p>
    <input type="email" id="doctorEmail" name="doctorEmail" value="<?php echo $SearcheddoctorEmail; ?>" placeholder="Enter updated email address">
</div>


                                <div class="mass"><p><?php echo $mass;?></p></div>
                                <button type="submit" name="updateDoctor">Submit</button>
                            </form>
                        </div>

                        <div class="RemoveDoctor" style="display: none;">
                            <div class="updateHeader">
                                <h1>Remove a Doctor.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>
                            
                            <form>
                                <div class="form-group">
                                    <label for="doctorName">Name:</label>
                                    <p>Enter the name of the doctor</p>
                                    <input type="text" id="doctorName" name="doctorName">
                                </div>
                                <div class="form-group">
                                    <label for="doctorId">ID:</label>
                                    <p>Enter the unique ID of the doctor</p>
                                    <input type="text" id="doctorId" name="doctorId">
                                </div>
                                <div class="form-group">
                                    <label for="doctorPassword">Password:</label>
                                    <p>Enter a secure password for the doctor</p>
                                    <input type="password" id="doctorPassword" name="doctorPassword">
                                </div>
                                <div class="form-group">
                                    <label for="doctorAge">Age:</label>
                                    <p>Enter the age of the doctor</p>
                                    <input type="number" id="doctorAge" name="doctorAge">
                                </div>
                                <div class="form-group">
                                    <label for="doctorGender">Gender:</label>
                                    <p>Select the gender of the doctor</p>
                                    <select id="doctorGender" name="doctorGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="doctorPhone">Phone:</label>
                                    <p>Enter the phone number of the doctor</p>
                                    <input type="text" id="doctorPhone" name="doctorPhone">
                                </div>
                                <div class="form-group">
                                    <label for="doctorEmail">Email:</label>
                                    <p>Enter the email address of the doctor</p>
                                    <input type="email" id="doctorEmail" name="doctorEmail">
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="ListOfDoctors" style="display: none;">
                            <div class="updateHeader">
                                <h1>List Of Doctors</h1>
                            </div>
                            <div class="centeredBox">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>00</td>
                                            <td>Doctor Name</td>
                                            <td>Doctor ID</td>
                                            <td>Doctor Age</td>
                                            <td>Doctor Gender</td>
                                            <td>Doctor Phone</td>
                                            <td>Doctor Email</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        
            <div class="SetupSection" id="StaffSetup">
                <div class="operationBackgroundBox backgroundBox">
                    <div class="operationChosen">
                        <div class="staffButtons">
                            <!-- Buttons with data-operation attribute -->
                            <button class="StaffSetupbtn active" data-operation="AddNewStaff">Add New Staff</button>
                            <button class="StaffSetupbtn" data-operation="UpdateStaffInfo">Update Staff Info.</button>
                            <button class="StaffSetupbtn" data-operation="RemoveStaff">Remove Staff</button>
                            <button class="StaffSetupbtn" data-operation="ListOfStaff">List of Staff</button>
                        </div>
                    </div>
                    <div class="operationBody">
                        <!-- Content divs for different operations -->
                        <div class="AddNewStaff" style="display: none;">
                            <form id="addNewStaffForm">
                                <div class="form-group">
                                    <label class="hade"><b><u>Add a New  Staff</u></b> </label>
                                </div>
                                <div class="form-group">
                                    <label for="staffName">Name:</label>
                                    <p>Enter the name of the staff</p>
                                    <input type="text" id="staffName" name="staffName">
                                </div>
                                <div class="form-group">
                                    <label for="staffId">ID:</label>
                                    <p>Enter the unique ID of the staff</p>
                                    <input type="text" id="staffId" name="staffId">
                                </div>
                                <div class="form-group">
                                    <label for="staffPassword">Password:</label>
                                    <p>Enter a secure password for the staff</p>
                                    <input type="password" id="staffPassword" name="staffPassword">
                                </div>
                                <div class="form-group">
                                    <label for="staffRole">Role:</label>
                                    <p>Select the role of the staff</p>
                                    <select id="staffRole" name="staffRole">
                                        <option value="nurse">Nurse</option>
                                        <option value="technician">Technician</option>
                                        <option value="administrator">Administrator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="staffAge">Age:</label>
                                    <p>Enter the age of the staff</p>
                                    <input type="number" id="staffAge" name="staffAge">
                                </div>
                                <div class="form-group">
                                    <label for="staffGender">Gender:</label>
                                    <p>Select the gender of the staff</p>
                                    <select id="staffGender" name="staffGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="staffPhone">Phone:</label>
                                    <p>Enter the phone number of the staff</p>
                                    <input type="text" id="staffPhone" name="staffPhone">
                                </div>
                                <div class="form-group">
                                    <label for="staffEmail">Email:</label>
                                    <p>Enter the email address of the staff</p>
                                    <input type="email" id="staffEmail" name="staffEmail">
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="UpdateStaffInfo" style="display: none;">
                            <div class="updateHeader">
                                <h1>Update Staff Info.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>
                            
                            <form>
                                <div class="form-group">
                                    <label for="staffName">Name:</label>
                                    <p>Enter the name of the staff</p>
                                    <input type="text" id="staffName" name="staffName">
                                </div>
                                <div class="form-group">
                                    <label for="staffId">ID:</label>
                                    <p>Enter the unique ID of the staff</p>
                                    <input type="text" id="staffId" name="staffId">
                                </div>
                                <div class="form-group">
                                    <label for="staffPassword">Password:</label>
                                    <p>Enter a secure password for the staff</p>
                                    <input type="password" id="staffPassword" name="staffPassword">
                                </div>
                                <div class="form-group">
                                    <label for="staffAge">Age:</label>
                                    <p>Enter the age of the staff</p>
                                    <input type="number" id="staffAge" name="staffAge">
                                </div>
                                <div class="form-group">
                                    <label for="staffGender">Gender:</label>
                                    <p>Select the gender of the staff</p>
                                    <select id="staffGender" name="staffGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="staffPhone">Phone:</label>
                                    <p>Enter the phone number of the staff</p>
                                    <input type="text" id="staffPhone" name="staffPhone">
                                </div>
                                <div class="form-group">
                                    <label for="staffEmail">Email:</label>
                                    <p>Enter the email address of the staff</p>
                                    <input type="email" id="staffEmail" name="staffEmail">
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="RemoveStaff" style="display: none;">
                            <h1>Remove Staff</h1>
                            <div class="updateHeader">
                                <h1>Remove a Staff Member.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>
                            
                            <form>
                                <div class="form-group">
                                    <label for="staffName">Name:</label>
                                    <p>Enter the name of the staff member</p>
                                    <input type="text" id="staffName" name="staffName">
                                </div>
                                <div class="form-group">
                                    <label for="staffId">ID:</label>
                                    <p>Enter the unique ID of the staff member</p>
                                    <input type="text" id="staffId" name="staffId">
                                </div>
                                <div class="form-group">
                                    <label for="staffPassword">Password:</label>
                                    <p>Enter a secure password for the staff member</p>
                                    <input type="password" id="staffPassword" name="staffPassword">
                                </div>
                                <div class="form-group">
                                    <label for="staffAge">Age:</label>
                                    <p>Enter the age of the staff member</p>
                                    <input type="number" id="staffAge" name="staffAge">
                                </div>
                                <div class="form-group">
                                    <label for="staffGender">Gender:</label>
                                    <p>Select the gender of the staff member</p>
                                    <select id="staffGender" name="staffGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="staffPhone">Phone:</label>
                                    <p>Enter the phone number of the staff member</p>
                                    <input type="text" id="staffPhone" name="staffPhone">
                                </div>
                                <div class="form-group">
                                    <label for="staffEmail">Email:</label>
                                    <p>Enter the email address of the staff member</p>
                                    <input type="email" id="staffEmail" name="staffEmail">
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="ListOfStaff" style="display: none;">
                            <div class="updateHeader">
                                <h1>List of Staff</h1>
                            </div>
                            <div class="centeredBox">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Staff Name</td>
                                            <td>Staff ID</td>
                                            <td>Staff Age</td>
                                            <td>Staff Gender</td>
                                            <td>Staff Phone</td>
                                            <td>Staff Email</td>
                                        </tr>
                                        <!-- Additional rows for other staff can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="SetupSection" id="PatientSetup">
                <div class="operationBackgroundBox backgroundBox">
                    <div class="operationChosen">
                        <div class="patientButtons">
                            <!-- Buttons with data-operation attribute -->
                            <button class="PatientSetupbtn active" data-operation="AddNewPatient">Add New Patient</button>
                            <button class="PatientSetupbtn" data-operation="UpdatePatientInfo">Update Patient Info.</button>
                            <button class="PatientSetupbtn" data-operation="RemovePatient">Remove Patient</button>
                            <button class="PatientSetupbtn" data-operation="ListOfPatients">List of Patients</button>
                        </div>
                    </div>
                    <div class="operationBody">
                        <!-- Content divs for different operations -->
                        <div class="AddNewPatient" style="display: none;">
                            <h1>Add New Patient</h1>
                            <!-- Form for adding new patient -->
                            <form id="addNewPatientForm">
                                <div class="form-group">
                                    <label for="patientName">Name:</label>
                                    <p>Enter the name of the patient</p>
                                    <input type="text" id="patientName" name="patientName">
                                </div>
                                <div class="form-group">
                                    <label for="patientId">ID:</label>
                                    <p>Enter the unique ID of the patient</p>
                                    <input type="text" id="patientId" name="patientId">
                                </div>
                                <div class="form-group">
                                    <label for="patientAge">Age:</label>
                                    <p>Enter the age of the patient</p>
                                    <input type="number" id="patientAge" name="patientAge">
                                </div>
                                <div class="form-group">
                                    <label for="patientGender">Gender:</label>
                                    <p>Select the gender of the patient</p>
                                    <select id="patientGender" name="patientGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patientPhone">Phone:</label>
                                    <p>Enter the phone number of the patient</p>
                                    <input type="text" id="patientPhone" name="patientPhone">
                                </div>
                                <div class="form-group">
                                    <label for="patientEmail">Email:</label>
                                    <p>Enter the email address of the patient</p>
                                    <input type="email" id="patientEmail" name="patientEmail">
                                </div>
                                <!-- Add other input fields as needed -->
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="UpdatePatientInfo" style="display: none;">
                            <div class="updateHeader">
                                <h1>Update Patient Info.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>

                            <form>
                                <div class="form-group">
                                    <label for="patientName">Name:</label>
                                    <p>Enter the name of the patient</p>
                                    <input type="text" id="patientName" name="patientName">
                                </div>
                                <div class="form-group">
                                    <label for="patientId">ID:</label>
                                    <p>Enter the unique ID of the patient</p>
                                    <input type="text" id="patientId" name="patientId">
                                </div>
                                <div class="form-group">
                                    <label for="patientAge">Age:</label>
                                    <p>Enter the age of the patient</p>
                                    <input type="number" id="patientAge" name="patientAge">
                                </div>
                                <div class="form-group">
                                    <label for="patientGender">Gender:</label>
                                    <p>Select the gender of the patient</p>
                                    <select id="patientGender" name="patientGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patientPhone">Phone:</label>
                                    <p>Enter the phone number of the patient</p>
                                    <input type="text" id="patientPhone" name="patientPhone">
                                </div>
                                <div class="form-group">
                                    <label for="patientEmail">Email:</label>
                                    <p>Enter the email address of the patient</p>
                                    <input type="email" id="patientEmail" name="patientEmail">
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="RemovePatient" style="display: none;">
                            <h1>Remove Patient</h1>
                            <div class="updateHeader">
                                <h1>Remove a Patient.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>

                            <form>
                                <div class="form-group">
                                    <label for="patientName">Name:</label>
                                    <p>Enter the name of the patient</p>
                                    <input type="text" id="patientName" name="patientName">
                                </div>
                                <div class="form-group">
                                    <label for="patientId">ID:</label>
                                    <p>Enter the unique ID of the patient</p>
                                    <input type="text" id="patientId" name="patientId">
                                </div>
                                <div class="form-group">
                                    <label for="patientAge">Age:</label>
                                    <p>Enter the age of the patient</p>
                                    <input type="number" id="patientAge" name="patientAge">
                                </div>
                                <div class="form-group">
                                    <label for="patientGender">Gender:</label>
                                    <p>Select the gender of the patient</p>
                                    <select id="patientGender" name="patientGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patientPhone">Phone:</label>
                                    <p>Enter the phone number of the patient</p>
                                    <input type="text" id="patientPhone" name="patientPhone">
                                </div>
                                <div class="form-group">
                                    <label for="patientEmail">Email:</label>
                                    <p>Enter the email address of the patient</p>
                                    <input type="email" id="patientEmail" name="patientEmail">
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="ListOfPatients" style="display: none;">
                            <div class="updateHeader">
                                <h1>List of Patients</h1>
                            </div>
                            <div class="centeredBox">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Patient Name</td>
                                            <td>Patient ID</td>
                                            <td>Patient Age</td>
                                            <td>Patient Gender</td>
                                            <td>Patient Phone</td>
                                            <td>Patient Email</td>
                                        </tr>
                                        <!-- Additional rows for other patients can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="SetupSection" id="DepartmentSetup">
                <div class="operationBackgroundBox backgroundBox">
                    <div class="operationChosen">
                        <div class="departmentButtons">
                            <!-- Buttons with data-operation attribute -->
                            <button class="DepartmentSetupbtn active" data-operation="AddNewDepartment">Add New Department</button>
                            <button class="DepartmentSetupbtn" data-operation="UpdateDepartmentInfo">Update Department Info.</button>
                            <button class="DepartmentSetupbtn" data-operation="RemoveDepartment">Remove Department</button>
                            <button class="DepartmentSetupbtn" data-operation="ListOfDepartments">List of Departments</button>
                        </div>
                    </div>
                    <div class="operationBody">
                        <!-- Content divs for different operations -->
                        <div class="AddNewDepartment" style="display: none;">
                            <h1>Add New Department</h1>
                            <!-- Form for adding new department -->
                            <form id="addNewDepartmentForm">
                                <div class="form-group">
                                    <label for="departmentName">Department Name:</label>
                                    <p>Enter the name of the department</p>
                                    <input type="text" id="departmentName" name="departmentName">
                                </div>
                                <div class="form-group">
                                    <label for="departmentHead">Department Head:</label>
                                    <p>Enter the name of the department head</p>
                                    <input type="text" id="departmentHead" name="departmentHead">
                                </div>
                                <!-- Add other input fields as needed -->
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="UpdateDepartmentInfo" style="display: none;">
                            <div class="updateHeader">
                                <h1>Update Department Info.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>
                            
                            <form>
                                <div class="form-group">
                                    <label for="departmentName">Name:</label>
                                    <p>Enter the name of the department</p>
                                    <input type="text" id="departmentName" name="departmentName">
                                </div>
                                <div class="form-group">
                                    <label for="departmentId">ID:</label>
                                    <p>Enter the unique ID of the department</p>
                                    <input type="text" id="departmentId" name="departmentId">
                                </div>
                                <div class="form-group">
                                    <label for="departmentHead">Head:</label>
                                    <p>Enter the name of the department head</p>
                                    <input type="text" id="departmentHead" name="departmentHead">
                                </div>
                                <div class="form-group">
                                    <label for="departmentDescription">Description:</label>
                                    <p>Enter a description of the department</p>
                                    <textarea id="departmentDescription" name="departmentDescription" rows="4"></textarea>
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="RemoveDepartment" style="display: none;">
                            <h1>Remove Department</h1>
                            <div class="updateHeader">
                                <h1>Remove a Department.</h1>
                                <div class="searchById">
                                    <!-- Search by ID option goes here -->
                                    <input type="text" id="searchByIdInput" placeholder="Search by ID">
                                    <button id="searchByIdButton">Search</button>
                                </div>
                            </div>
                            
                            <form>
                                <div class="form-group">
                                    <label for="departmentName">Name:</label>
                                    <p>Enter the name of the department</p>
                                    <input type="text" id="departmentName" name="departmentName">
                                </div>
                                <div class="form-group">
                                    <label for="departmentId">ID:</label>
                                    <p>Enter the unique ID of the department</p>
                                    <input type="text" id="departmentId" name="departmentId">
                                </div>
                                <div class="form-group">
                                    <label for="departmentDescription">Description:</label>
                                    <p>Enter the description of the department</p>
                                    <textarea id="departmentDescription" name="departmentDescription"></textarea>
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                        <div class="ListOfDepartments" style="display: none;">
                            <div class="updateHeader">
                                <h1>List of Departments</h1>
                            </div>
                            <div class="centeredBox">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Department Name</th>
                                            <th>Head of Department</th>
                                            <th>Location</th>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Department 1</td>
                                            <td>Head of Department 1</td>
                                            <td>Location 1</td>
                                            <!-- Add more rows for additional departments -->
                                        </tr>
                                        <!-- Additional rows for other departments can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
      </aside>
</section>

        <<script>
            // JavaScript functions

            function openNotification() {
                // window.open('notification-page.html', '_blank');
            }

            function openProfile() {
                // window.open('profile-page.html', '_blank');
            }

            function openHome() {
                // Add functionality to open home page
                window.open('../../../Home/MVC/Views/home.php', '_blank');
            }

            function openDashboard() {
                // Add functionality to open dashboard page
                window.location.href = 'dashboard.php';
            }

            function openHospitalSetup() {
                // Add functionality to open hospital setup page
                window.location.href = 'hospitalsetup.php';
            }

            function openInventory() {
                // Add functionality to open inventory page
                window.location.href = 'inventory.php';
            }

            function openReport() {
                // Add functionality to open report page
                window.location.href = 'report.php';
            }

            function openSettings() {
                // Add functionality to open settings page
                window.location.href = 'settings.php';
            }

            function logout() {
                // Add functionality to logout
                window.location.href = '../../../Home/MVC/Views/home.php';
            }

            function operateInSection(sectionId) {
                // Perform operation on the setup section
                console.log("Operating on section:", sectionId);
                // Example: Change content based on sectionId
                var setupBox = document.querySelector('.setupBox');
                setupBox.innerHTML = `<h3>${sectionId}</h3>`;
            }

            function showSection(sectionId) {
                // Hide all setup sections
                var setupSections = document.querySelectorAll('.SetupSection');
                setupSections.forEach(function(section) {
                    section.classList.remove('active');
                });

                // Show the selected setup section
                var selectedSection = document.getElementById(sectionId);
                selectedSection.classList.add('active');

                // Operate on the setup section within the setup box
                operateInSection(sectionId);
            }

            // Initially, we want to show the Doctor Setup section and make the DoctorSetupbtn active
            showSection('DoctorSetup');

            // Function to handle showing different setup sections
            function showSetupSection(sectionId) {
                showSection(sectionId);
                // Add functionality to make the respective setup button active if needed
            }

            // Event listeners for buttons within each setup section
            document.addEventListener("DOMContentLoaded", function() {
                // Doctor Setup section
                var doctorButtons = document.querySelectorAll('.DoctorSetupbtn');
                doctorButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var operationType = this.getAttribute('data-operation');
                        showOperationContent(operationType);
                    });
                });

                // Staff Setup section
                var staffButtons = document.querySelectorAll('.StaffSetupbtn');
                staffButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var operationType = this.getAttribute('data-operation');
                        showOperationContent(operationType);
                    });
                });

                // Patient Setup section
                var patientButtons = document.querySelectorAll('.PatientSetupbtn');
                patientButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var operationType = this.getAttribute('data-operation');
                        showOperationContent(operationType);
                    });
                });

                // Department Setup section
                var departmentButtons = document.querySelectorAll('.DepartmentSetupbtn');
                departmentButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var operationType = this.getAttribute('data-operation');
                        showOperationContent(operationType);
                    });
                });
            });

            function showOperationContent(operationType) {
                // Hide all operation content first
                var operationContents = document.querySelectorAll('.operationBody > div');
                operationContents.forEach(function(content) {
                    content.style.display = 'none';
                });

                // Show the operation content based on the operation type
                var operationContent = document.querySelector('.operationBody .' + operationType);
                if (operationContent) {
                    operationContent.style.display = 'block';
                } else {
                    // If neither Add New Doctor nor Update Doctor Info nor Remove Doctor is clicked, default to showing Add New Doctor
                    document.querySelector('.operationBody .AddNewDoctor').style.display = 'block';
                }
            }
            // JavaScript for search by ID feature
        document.addEventListener("DOMContentLoaded", function() {
            var searchByIdInput = document.getElementById('searchByIdInput');
            var searchByIdButton = document.getElementById('searchByIdButton');

            searchByIdButton.addEventListener('click', function() {
                var doctorId = searchByIdInput.value.trim();
                if (doctorId !== '') {
                    // Perform search operation based on the entered doctor ID
                    console.log('Searching for doctor with ID:', doctorId);
                    // Implement your search logic here
                } else {
                    alert('Please enter a valid doctor ID.');
                }
            });
        });


        </script>


        </body>
        </html>
