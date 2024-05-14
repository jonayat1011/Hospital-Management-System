<?php

session_start();
require_once('../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../Controllers/dashboardController.php');
if (isset($_GET['logout'])) {
    // Perform logout actions, such as destroying session variables
   session_destroy();
    // Redirect to the home page
    header("location: ../../../Home/MVC/Views/home.php");
    exit; // Make sure to exit after redirection to prevent further script execution
}
if (isset($_GET['SearchappointmentListTable'])) {
    // Get the selected date
    $date = $_GET['Date'];
     //echo $date;
    // Fetch appointment list based on the selected date
    $rows = appointmentList($date);
   // $r = appointmentList($date);
   //print_r($r);
    // Output the appointment list as JSON
    //header('Content-Type: application/json');
    //echo json_encode($rows);
   // exit; // Stop further execution
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"  href="Styles.css">
    <link rel="stylesheet"  href="dashboardStyles.css">
    <style>
    .Date {
         /* Adjust the margin-top as needed */
        margin-left: 500px;
    }
    .inputDate {
        font-size: 25px;
        margin-bottom: 10px;
        background-color: #d5f8ff;
        border-radius: 2px;
        margin-left: 500px;
    }
   .Search {
        background-color: #4CAF50; /* Green background */
        border: none; /* Remove border */
        color: white; /* White text */
        padding: 10px 20px; /* Add some padding */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Make it inline block */
        font-size: 16px; /* Font size */
    }

    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <div class="search-container">
        <input  type="text" class="search-bar" placeholder="Search...">
        <button class="search-btn">Search</button>
    </div>
    <div class="Profile">
        
        <img src="img/notification.jpeg" alt="Notification" class="round-btn" onclick="openNotification()" title="Notification">
       
        
        <img src="img/profile.png" alt="Profile" class="round-btn" onclick="openProfile()" title="Profile">
    
    </div>
</header>
<section>
    <nav>
        <div>
           
            <button class="navButton" onclick="openHome()">
                <img src="img/home" alt="Home">
                <span>Home</span>
            </button>
            <button class="navButtonOpen" onclick="openDashboard()">
                <img src="img/dashboard.png" alt="Dashboard">
                <span>Dashboard</span>
            </button>
            <button class="navButton" onclick="openHospitalSetup()">
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
            <button class="navButton" onclick="logout()" name="logout">
                <img src="img/logout.png" alt="Logout">
                <span>Logout</span>
            </button>
            
        </div>
    </nav>

    <aside>
        <section class="dashboardBody">
            <div class="userIdentity">
                <?php $UserName= $_SESSION['name']; ?>
                <p><b>Hey! <?php echo $UserName; ?> -</b> here's what's happening with your dashboard today ..</p>
            </div>
            <div class="statistics">
                <!-- Content for Statistics -->
                <div class="TotalDoctors">
                    <div class="statisticsHaed"> 
                        <img src="img/doctor.png" alt="Total Doctors Image">
                        <h3>Total Doctors</h3>
                    </div>
                    <?php $totalDoctors=totalDoctors();?>
                    <p><b><?php echo $totalDoctors ?></b></p>
                    <div class="statisticstail" title="Click to view list of Doctors">
                        <img src="img/next.png" alt=" DRlist" class="round-btn" onclick="openDoctorsList()">
                    </div>
                </div>
                <div class="TotalPatients">
                    <div class="statisticsHaed">
                        <img src="img/patient.png" alt="Total Patients Image">
                        <h3>Total Patients</h3>
                    </div>
                    <?php $totalPatients=totalPatients();?>
                    <p><b><?php echo $totalPatients ?></b></p>
                    <div class="statisticstail" title="Click to view list of Patients">
                       <img src="img/next.png" alt=" PAList" class="round-btn" onclick="openPatientList()">
                    </div>
                </div>
            <div class="TotalAppointments">
                <div class="statisticsHaed">
                    <img src="img/appointment.png" alt="Total Appointments Image">
                    <h3>Total Appointments</h3>
                </div>
                <?php $totalAppointments=totalAppointments();?>
                <p><b><?php echo $totalAppointments ?></b></p>
                <div class="statisticstail" title="Click to view list of Appointments">
                    <img src="img/next.png" alt="AppointmentList" class="round-btn" onclick="openAppointmentList()">
                </div>
            </div>

            <div class="TotalEarning">
                <div class="statisticsHaed">
                    <img src="img/earning.png" alt="Total Earning Image">
                    <h3>Total Earning </h3>
                </div>
                <?php $totalEarning= totalEarning();?>
                <p><b>$ <?php echo $totalEarning ?></b></p>
                <div class="statisticstail" title="Click to view details of Earning">
                    <img src="img/next.png" alt="EarningDetails" class="round-btn" onclick="openEarningDetails()">
                </div>
            </div>

            </div>

            <div class="graphicalStatistics">
<div class="box patienceStats">
    <div class="patienceStatsHead">
        <!-- Content for Patience Statistics -->
        <h2>Patience Statistics</h2>
        <button class="Month" onclick="showMonthlyChart()">Monthly</button>
        <button class="Week" onclick="showWeeklyChart()">Weekly</button>
    </div>
    <div class="BarChart">
        <canvas class="BarChartcanvas" id="websitePerformanceChart" width="1200" height="400"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <?php
            // Include BarChart.php
            require_once 'BarChart.php';
            // By default, show the monthly chart
            if (!isset($_POST['chartType']) || $_POST['chartType'] === 'monthly') {
                BarChartMonthly();
            } elseif ($_POST['chartType'] === 'weekly') {
                BarChartWeekly();
            }
        ?>
        <form method="post" style="display: none;">
            <input type="hidden" name="chartType" value="monthly">
        </form>
        <script>
            function showMonthlyChart() {
                document.querySelector('input[name="chartType"]').value = 'monthly';
                document.querySelector('form').submit();
            }

            function showWeeklyChart() {
                document.querySelector('input[name="chartType"]').value = 'weekly';
                document.querySelector('form').submit();
            }
        </script>
    </div>
</div>



                <div class="box appointmentChart">
                    <!-- Content for Appointment Pie Chart -->
                    <h2>Appointment Pie Chart</h2>
            <div class="PieChart">
                <!-- Add a canvas for the pie chart -->
                <canvas id="appointmentPieChart" width="200" height="400"></canvas>
            </div>

            <script>
                // Get the canvas element
                var pieChartCanvas = document.getElementById('appointmentPieChart');
                var pieChartCtx = pieChartCanvas.getContext('2d');
                <?php  $canceledAppointment=canceledAppointment(); ?>
                    <?php  $confirmedAppointment=confirmedAppointment(); ?>
                // Data for the pie chart
             var confirmedAppointment = <?php echo $confirmedAppointment; ?>;
                    var canceledAppointment = <?php echo $canceledAppointment; ?>;

                // Create a new Chart instance for the pie chart
                var appointmentPieChart = new Chart(pieChartCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Confirmed','Canceled' ],
                        datasets: [{
                            data: [confirmedAppointment,canceledAppointment],
                            backgroundColor: [ '#309634','#f8184a']
                        }]
                    },
                    options: {
                        // Add options if needed
                    }
                });
            </script>

                </div>


            </div>

            <div class="appointmentList">
                <!-- Content for Appointment List -->
                <div class="appointmentListHaed">
                    <!-- Content for Patience Statistics -->
                    <h2>Appointment list of patients:</h2>
                    <form>
                    <h2 class="Date">Date :</h2><input class="inputDate" type="Date" name="Date"> 
                    <button type="submit" name="SearchappointmentListTable" class="Search">Search </button>  
                    </form> 
                </div>
                 <div class="appointmentListTable">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Status</th>
                <th>Record</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $numOFappointmentList=0;
            // Assuming $rows is an array fetched from the database
            foreach ($rows as $row) {
                 $name=finduserName($row["patient_id"]);
                 $gender=finduserGender($row["patient_id"]);
                 $age=finduserAge($row["patient_id"]);
                 $numOFappointmentList=$numOFappointmentList+1;
                echo "<tr>";
                echo "<td>" . $numOFappointmentList . "</td>";
                echo "<td>" . $name . "</td>";
                echo "<td>" . $row["appointment_date"] . "</td>";
                echo "<td>" . $gender . "</td>";
                echo "<td>" . $age . "</td>";
                echo "<td>" . $row["appointment_status"] . "</td>";
                echo "<td>" . "Views" . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

                

            </div>
        </section>
    </aside>



</section>

<script>
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
      // window.location.href = '../../../Home/MVC/Views/home.php';
        
    }

    function openDoctorsList() {
        // Add functionality to open doctors list
    }

    function openPatientList() {
        // Add functionality to open patient list
    }

    function openAppointmentList() {
        // Add functionality to open appointment list
    }

    function openEarningDetails() {
        // Add functionality to open earning details
    }
</script>
</body>
</html>
