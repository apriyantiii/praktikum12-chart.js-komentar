<?php
include('koneksi.php');
$case = mysqli_query($conn, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($case)) {
    $country[] = $row['country'];
    $jumlah_kasus[] = $row['total_cases'];
    $kasus_baru[] = $row['new_cases'];
    $jumlah_kematian[] = $row['total_deaths'];
    $kematian_baru[] = $row['new_deaths'];
    $total_kesembuhan[] = $row['total_recovered'];
    $sembuh_baru[] = $row['new_recovered'];
}

?>
<!doctype html>
<html>

<head>
    <title>Pie Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div id="canvas-holder" style="width:50%">
        <canvas id="chart-area"></canvas>
    </div>
    <script>
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: <?php echo json_encode($jumlah_kasus); ?>,
                    backgroundColor: [
                        'rgb(19, 11, 64, 0.2)',
                        'rgb(153, 21, 98, 0.2)',
                        'rgb(153, 21, 21, 0.2)',
                        'rgb(204, 178, 29, 0.2)',
                        'rgb(204, 178, 29, 0.2)',
                        'rgb(100, 161, 110, 0.2)',
                        'rgb(160, 190, 232, 0.2)',
                        'rgb(186, 135, 121, 0.2)',
                        'rgb(66, 75, 245, 0.2)',
                        'rgb(58, 133, 115, 0.2)'
                    ],
                    borderColor: [
                        'rgb(19, 11, 64, 1)',
                        'rgb(153, 21, 98, 1)',
                        'rgb(153, 21, 21, 1)',
                        'rgb(204, 178, 29, 1)',
                        'rgb(204, 178, 29, 1)',
                        'rgb(100, 161, 110, 1)',
                        'rgb(160, 190, 232, 1)',
                        'rgb(186, 135, 121, 1)',
                        'rgb(66, 75, 245, 1)',
                        'rgb(58, 133, 115, 1)'
                    ],
                    label: 'Total Kasus'
                }],
                labels: <?php echo json_encode($country); ?>
            },
            options: {
                responsive: true
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('chart-area').getContext('2d');
            window.myPie = new Chart(ctx, config);
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myPie.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var newDataset = {
                backgroundColor: [],
                data: [],
                label: 'New dataset ' + config.data.datasets.length,
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());

                var colorName = colorNames[index % colorNames.length];
                var newColor = window.chartColors[colorName];
                newDataset.backgroundColor.push(newColor);
            }

            config.data.datasets.push(newDataset);
            window.myPie.update();
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myPie.update();
        });
    </script>
</body>

</html>