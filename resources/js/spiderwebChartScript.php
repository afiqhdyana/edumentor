<?php
header("Content-type: application/javascript"); // Set the content type to JavaScript
?>

document.addEventListener('DOMContentLoaded', function () {
    // Get the canvas element
        var ctx = document.getElementById('spiderwebChart').getContext('2d');

        // Define your data points and labels
        var data = {
            labels: ['CSK', 'GK', 'TW', 'CT', 'PS', 'LLL', 'CS', 'TSK', 'IM', 'CRT'],
            datasets: [{
                label: 'Skill Points',
                data: [
                    <?php echo $cskValue; ?>,
                    <?php echo $gkValue; ?>,
                    // ... repeat for other variables
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            }]
        };

        // Create the spiderweb chart
        var myRadarChart = new Chart(ctx, {
            type: 'radar',
            data: data,
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true,
                        max: 5
                    }
                }
            }
        });
    });
