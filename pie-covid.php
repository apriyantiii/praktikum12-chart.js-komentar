<?php
//perintah memuat isi koneksi.php
include('koneksi.php');
//melakukan deklarasi untuk memanggil isi dari tabel covid melalui query
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
<DOCTYPE HTML>
    <html>

    <head>
        <title> Line Chart Tabel Covid</title>
        <!-- memanggil chart.js -->
        <script type="text/javascript" src="Chart2.js"></script>
    </head>

    <body>
        <!-- mendeklarasikan canvas yang digunakan sebagai tempat chart nantinya -->
        <div style="width : 800px; height:800px">
            <h3>Total Kasus</h3>
            <canvas id="myChart"></canvas><br><br>
            <br><br>
            <h3>Kasus Baru</h3>
            <canvas id="myChart2"></canvas>
            <br><br>
            <h3>Jumlah Kematian</h3>
            <canvas id="myChart3"></canvas>
            <br><br>
            <h3>Kematian Baru</h3>
            <canvas id="myChart4"></canvas>
            <br><br>
            <h3>Total Kesembuhan</h3>
            <canvas id="myChart5"></canvas>
            <br><br>
            <h3>Sembuh Baru</h3>
            <canvas id="myChart6"></canvas>
        </div>

        <!-- syntax javascript -->
        <script>
            //mendeklarasikan variabel ctx untuk memanggil canvas yang telah  dibuat
            var ctx = document.getElementById("myChart").getContext('2d');
            //mendeklarasikan isi canvas
            var myChart = new Chart(ctx, {
                //menggunakan type pie, karena yang ingin dibuat adalah pie-chart
                type: 'pie',
                data: {
                    //label untuk memanggil nama-nama produk yang nantinya ditampilkan pada sumbu x grafik
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                        //memunculkan label grafik penjualan di atas grafik
                        label: 'Total Kasus',
                        //memanggil jumlah produk untuk ditampilkan pada sumbu Y grafik
                        data: <?php echo json_encode($jumlah_kasus); ?>,
                        //memberikan warna background pada 10 negar
                        backgroundColor: [
                            'rgb(19, 11, 64)',
                            'rgb(153, 21, 98)',
                            'rgb(153, 21, 21)',
                            'rgb(204, 178, 29)',
                            'rgb(66, 245, 72)',
                            'rgb(100, 161, 110)',
                            'rgb(160, 190, 232)',
                            'rgb(186, 135, 121)',
                            'rgb(66, 75, 245)',
                            'rgb(58, 133, 115)'
                        ],
                        //memberikan warna bar pada 10 negara
                        borderColor: [
                            'rgb(19, 11, 64, 1)',
                            'rgb(153, 21, 98, 1)',
                            'rgb(153, 21, 21, 1)',
                            'rgb(204, 178, 29, 1)',
                            'rgb(66, 245, 72, 1)',
                            'rgb(100, 161, 110, 1)',
                            'rgb(160, 190, 232, 1)',
                            'rgb(186, 135, 121, 1)',
                            'rgb(66, 75, 245, 1)',
                            'rgb(58, 133, 115, 1)'
                        ],
                        label: 'Total Kasus'
                    }],

                },

                options: {
                    scales: {}
                }
            });

            var ctx = document.getElementById("myChart2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                        label: 'Total Kasus',
                        data: <?php echo json_encode($kasus_baru); ?>,
                        backgroundColor: [
                            'rgb(19, 11, 64)',
                            'rgb(153, 21, 98)',
                            'rgb(153, 21, 21)',
                            'rgb(204, 178, 29)',
                            'rgb(66, 245, 72)',
                            'rgb(100, 161, 110)',
                            'rgb(160, 190, 232)',
                            'rgb(186, 135, 121)',
                            'rgb(66, 75, 245)',
                            'rgb(58, 133, 115)'
                        ],
                        borderColor: [
                            'rgb(19, 11, 64, 1)',
                            'rgb(153, 21, 98, 1)',
                            'rgb(153, 21, 21, 1)',
                            'rgb(204, 178, 29, 1)',
                            'rgb(66, 245, 72, 1)',
                            'rgb(100, 161, 110, 1)',
                            'rgb(160, 190, 232, 1)',
                            'rgb(186, 135, 121, 1)',
                            'rgb(66, 75, 245, 1)',
                            'rgb(58, 133, 115, 1)'
                        ],
                        label: 'Total Kasus'
                    }],
                },
                options: {
                    scales: {}
                }
            });

            var ctx = document.getElementById("myChart3").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                        label: 'Total Kasus',
                        data: <?php echo json_encode($jumlah_kematian); ?>,
                        backgroundColor: [
                            'rgb(19, 11, 64)',
                            'rgb(153, 21, 98)',
                            'rgb(153, 21, 21)',
                            'rgb(204, 178, 29)',
                            'rgb(66, 245, 72)',
                            'rgb(100, 161, 110)',
                            'rgb(160, 190, 232)',
                            'rgb(186, 135, 121)',
                            'rgb(66, 75, 245)',
                            'rgb(58, 133, 115)'
                        ],
                        borderColor: [
                            'rgb(19, 11, 64, 1)',
                            'rgb(153, 21, 98, 1)',
                            'rgb(153, 21, 21, 1)',
                            'rgb(204, 178, 29, 1)',
                            'rgb(66, 245, 72, 1)',
                            'rgb(100, 161, 110, 1)',
                            'rgb(160, 190, 232, 1)',
                            'rgb(186, 135, 121, 1)',
                            'rgb(66, 75, 245, 1)',
                            'rgb(58, 133, 115, 1)'
                        ],
                        label: 'Total Kasus'
                    }],
                },
                options: {
                    scales: {}
                }
            });

            var ctx = document.getElementById("myChart4").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                        label: 'Total Kasus',
                        data: <?php echo json_encode($kematian_baru); ?>,
                        backgroundColor: [
                            'rgb(19, 11, 64)',
                            'rgb(153, 21, 98)',
                            'rgb(153, 21, 21)',
                            'rgb(204, 178, 29)',
                            'rgb(66, 245, 72)',
                            'rgb(100, 161, 110)',
                            'rgb(160, 190, 232)',
                            'rgb(186, 135, 121)',
                            'rgb(66, 75, 245)',
                            'rgb(58, 133, 115)'
                        ],
                        borderColor: [
                            'rgb(19, 11, 64, 1)',
                            'rgb(153, 21, 98, 1)',
                            'rgb(153, 21, 21, 1)',
                            'rgb(204, 178, 29, 1)',
                            'rgb(66, 245, 72, 1)',
                            'rgb(100, 161, 110, 1)',
                            'rgb(160, 190, 232, 1)',
                            'rgb(186, 135, 121, 1)',
                            'rgb(66, 75, 245, 1)',
                            'rgb(58, 133, 115, 1)'
                        ],
                        label: 'Total Kasus'
                    }],
                },
                options: {
                    scales: {}
                }
            });

            var ctx = document.getElementById("myChart5").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                        label: 'Total Kasus',
                        data: <?php echo json_encode($total_kesembuhan); ?>,
                        backgroundColor: [
                            'rgb(19, 11, 64)',
                            'rgb(153, 21, 98)',
                            'rgb(153, 21, 21)',
                            'rgb(204, 178, 29)',
                            'rgb(66, 245, 72)',
                            'rgb(100, 161, 110)',
                            'rgb(160, 190, 232)',
                            'rgb(186, 135, 121)',
                            'rgb(66, 75, 245)',
                            'rgb(58, 133, 115)'
                        ],
                        borderColor: [
                            'rgb(19, 11, 64, 1)',
                            'rgb(153, 21, 98, 1)',
                            'rgb(153, 21, 21, 1)',
                            'rgb(204, 178, 29, 1)',
                            'rgb(66, 245, 72, 1)',
                            'rgb(100, 161, 110, 1)',
                            'rgb(160, 190, 232, 1)',
                            'rgb(186, 135, 121, 1)',
                            'rgb(66, 75, 245, 1)',
                            'rgb(58, 133, 115, 1)'
                        ],
                        label: 'Total Kasus'
                    }],
                },
                options: {
                    scales: {}
                }
            });

            var ctx = document.getElementById("myChart6").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                        label: 'Total Kasus',
                        data: <?php echo json_encode($sembuh_baru); ?>,
                        backgroundColor: [
                            'rgb(19, 11, 64)',
                            'rgb(153, 21, 98)',
                            'rgb(153, 21, 21)',
                            'rgb(204, 178, 29)',
                            'rgb(66, 245, 72)',
                            'rgb(100, 161, 110)',
                            'rgb(160, 190, 232)',
                            'rgb(186, 135, 121)',
                            'rgb(66, 75, 245)',
                            'rgb(58, 133, 115)'
                        ],
                        borderColor: [
                            'rgb(19, 11, 64, 1)',
                            'rgb(153, 21, 98, 1)',
                            'rgb(153, 21, 21, 1)',
                            'rgb(204, 178, 29, 1)',
                            'rgb(66, 245, 72, 1)',
                            'rgb(100, 161, 110, 1)',
                            'rgb(160, 190, 232, 1)',
                            'rgb(186, 135, 121, 1)',
                            'rgb(66, 75, 245, 1)',
                            'rgb(58, 133, 115, 1)'
                        ],
                        label: 'Total Kasus'
                    }],
                },
                options: {
                    scales: {}
                }
            });
        </script>
    </body>

    </html>