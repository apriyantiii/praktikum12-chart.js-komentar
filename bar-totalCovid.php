<?php
//perintah memuat isi koneksi.php
include('koneksi.php');
//melakukan deklarasi untuk memanggil isi dari tabel covid melalui query
$case = mysqli_query($conn, "SELECT * FROM tb_covid");
//perulangan untuk menampilkan array
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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Membuat Grafik Menggunakan Chart JS</title>
    <!-- memanggil chart.js -->
    <script type="text/javascript" src="Chart2.js"></script>

</head>

<body>
    <!-- mendeklarasikan canvas yang digunakan sebagai tempat chart nantinya -->
    <div style="width : 800px; height: 800px">
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
                    label: 'Grafik Total Covid',
                    //memanggil jumlah produk untuk ditampilkan pada sumbu Y grafik
                    data: <?php echo json_encode($jumlah_kasus); ?>,
                    //mengatur warna pada bar
                    backgroundColor: 'rgba(204, 178, 29, 0.2)',
                    //memberikan warna pada border bar
                    borderColor: 'rgba(204, 178, 29, 1)',
                    borderWidth: 1
                }]
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