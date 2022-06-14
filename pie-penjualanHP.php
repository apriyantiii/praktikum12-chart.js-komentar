<?php
//perintah memuat isi koneksi.php
include('koneksi.php');
//melakukan deklarasi untuk memanggil isi dari tabel barang melalui query
$produk = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($row = mysqli_fetch_array($produk)) {
    $nama_produk[] = $row['barang'];

    $query = mysqli_query($conn, "select sum(jumlah) as jumlah from tb_penjualan where id_barang='" . $row['id_barang'] . "'");
    $row = $query->fetch_array();
    $jumlah_produk[] = $row['jumlah'];
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
        <h3>Jumlah Produk</h3>
        <canvas id="myChart"></canvas>
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
                labels: <?php echo json_encode($nama_produk); ?>,
                datasets: [{
                    //memunculkan label grafik penjualan di atas grafik
                    label: 'Total Kasus',
                    //memanggil jumlah produk untuk ditampilkan pada sumbu Y grafik
                    data: <?php echo json_encode($jumlah_produk); ?>,
                    //memberikan warna background pada tiap produk
                    backgroundColor: [
                        'rgb(19, 11, 64)',
                        'rgb(153, 21, 98)',
                        'rgb(153, 21, 21)',
                        'rgb(58, 133, 115)'
                    ],
                    //memberikan warna bar pada tiap produk
                    borderColor: [
                        'rgb(19, 11, 64, 1)',
                        'rgb(153, 21, 98, 1)',
                        'rgb(153, 21, 21, 1)',
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