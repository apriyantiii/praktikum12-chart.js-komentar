<?php
include('koneksi.php');
//perintah memuat isi koneksi.php
$case = mysqli_query($conn, "SELECT * FROM tb_covid");

//melakukan deklarasi untuk memanggil isi dari tabel covid melalui query
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
        <title> Bar Chart Tabel Covid</title>
        <!-- memanggil chart.js -->
        <script type="text/javascript" src="Chart2.js"></script>
    </head>

    <body>
        <!-- mendeklarasikan canvas yang digunakan sebagai tempat chart nantinya -->
        <div style="width : 800px; height:800px">
            <canvas id="myChart"></canvas>
        </div>

        <!-- syntax javascript -->
        <script>
            //mendeklarasikan variabel ctx untuk memanggil canvas yang telah  dibuat
            var ctx = document.getElementById("myChart").getContext('2d');
            //mendeklarasikan isi canvas
            var myChart = new Chart(ctx, {
                //menggunakan type bar, karena yang ingin dibuat adalah bar-chart
                type: 'bar',
                data: {
                    //label untuk memanggil nama-nama produk yang nantinya ditampilkan pada sumbu x grafik
                    labels: <?php echo json_encode($country); ?>,
                    datasets: [{
                            //memunculkan label grafik penjualan di atas grafik
                            label: 'Total Kasus',
                            //memanggil jumlah produk untuk ditampilkan pada sumbu Y grafik
                            data: <?php echo json_encode($jumlah_kasus); ?>,
                            //mengatur warna pada bar
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            //memberikan warna pada border bar
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Kasus Baru',
                            data: <?php echo json_encode($kasus_baru); ?>,
                            backgroundColor: 'rgb(46, 139, 87, 0.2)',
                            borderColor: 'rgb(46, 139, 87, 1)',
                            borderWidth: 1
                        },

                        {
                            label: 'Jumlah Kematian',
                            data: <?php echo json_encode($jumlah_kematian); ?>,
                            backgroundColor: 'rgb(66, 245, 72, 0.2)',
                            borderColor: 'rgb(66, 245, 72, 1)',
                            borderWidth: 1
                        },

                        {
                            label: 'Kematian Baru',
                            data: <?php echo json_encode($kematian_baru); ?>,
                            backgroundColor: 'rgb(245, 227, 66, 0.2)',
                            borderColor: 'rgb(245, 227, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Kesembuhan',
                            data: <?php echo json_encode($total_kesembuhan); ?>,
                            backgroundColor: 'rgb(233, 66, 245, 0.2)',
                            borderColor: 'rgb(233, 66, 245, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Sembuh Baru',
                            data: <?php echo json_encode($sembuh_baru); ?>,
                            backgroundColor: 'rgb(66, 75, 245 0.2)',
                            borderColor: 'rgb(66, 75, 245, 1)',
                            borderWidth: 1
                        },
                    ]
                },

                options: {
                    scales: {
                        //untuk membentuk garis-garis pada grafik
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>

    </html>