<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Memisahkan Atas Terdiri atas Judul lalu Bawah Terdapat Gambar Kanan dan Kiri</title>
    <style>
        body, h1, h2, h3, p, img {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container img {
            max-width: 50%;
            height: auto;
        }

        canvas {
            max-width: 80%;
            height: auto;
			margin-top : -30%;
			margin-bottom : 80%;
			margin-right : %;
            margin-left : 60%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 align="center">SELAMAT DATANG PESERTA SELEKSI BEASISWA</h1>
        <h3 align="center">STMIK ELRAHMA YOGYAKARTA</h3>
        <div>
            <img src="bg12.jpg" alt="Gambar Kiri">
        	<!--<img src="diagram.png" alt="Gambar Kanan">-->
        </div>
        
        <!-- Chart.js -->
        <canvas id="myChart" width="50" height="25"></canvas>

        <!-- Your existing images -->
        <!-- <div>
            <img src="photo2.jpg" alt="Gambar Kiri">
            <img src="bg12.jpeg" alt="Gambar Kanan">
        </div> -->
    </div>

    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Your script to create a chart -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Sample data
            var data = {
                labels: ['2019', '2020', '2021', '2023', '2024'],
                datasets: [{
                    label: 'tahun',
                    backgroundColor: 'red(75, 192, 192, 0.2)',
                    borderColor: 'red(75, 192, 192, 1)',
                    data: [1, 1, 1, 1, 2],
                }],
            };

            // Get the context of the canvas element we want to select
            var ctx = document.getElementById('myChart').getContext('2d');

            // Create a chart
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
            });
        });
    </script>
</body>
</html>
