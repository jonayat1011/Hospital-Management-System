<?php
require_once('../Controllers/dashboardController.php');
function BarChartMonthly() {
    // Actual patient data for each month$year = date('Y');
$year = date('Y');
$jan = getMonthlyAppointmentCounts($year, 1);
$feb = getMonthlyAppointmentCounts($year, 2);
$mar = getMonthlyAppointmentCounts($year, 3);
$apr = getMonthlyAppointmentCounts($year, 4);
$may = getMonthlyAppointmentCounts($year, 5);
$jun = getMonthlyAppointmentCounts($year, 6);
$jul = getMonthlyAppointmentCounts($year, 7);
$aug = getMonthlyAppointmentCounts($year, 8);
$sep = getMonthlyAppointmentCounts($year, 9);
$oct = getMonthlyAppointmentCounts($year, 10);
$nov = getMonthlyAppointmentCounts($year, 11);
$dec = getMonthlyAppointmentCounts($year, 12);

    // Array of month labels and patient data
    $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $patientsData = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];

    // Outputting JavaScript code to generate the chart
    echo "<script>
            const labels = " . json_encode($labels) . ";
            const patientsData = " . json_encode($patientsData) . ";
            
            const ctx = document.getElementById('websitePerformanceChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: 'Number of Appointmentes',
                        data: patientsData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>";
}

function BarChartWeekly() {
    // Actual patient data for each week
$year = date('Y');
$month = date('n'); // n returns the month without leading zeros (1 to 12)
$week1 = getWeeklyAppointmentCounts($year, $month, 1);
$week2 = getWeeklyAppointmentCounts($year, $month, 2);
$week3 = getWeeklyAppointmentCounts($year, $month, 3);
$week4 = getWeeklyAppointmentCounts($year, $month, 4);
echo $week1;
    // Array of week labels and patient data
    $labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
    $patientsData = [$week1, $week2, $week3, $week4];

    // Outputting JavaScript code to generate the chart
    echo "<script>
            const labels = " . json_encode($labels) . ";
            const patientsData = " . json_encode($patientsData) . ";
            
            const ctx = document.getElementById('websitePerformanceChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: 'Number of Appointmentes',
                        data: patientsData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>";
}



?>

