<!-- product_volume_chart.blade.php -->
@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Evolution des volumes des produits 1_1 et 1_4 de janvier 2021 à avril 2022</h1>
        <canvas id="productVolumeChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('productVolumeChart').getContext('2d');
        var productVolumes = @json($productVolumes);

        var months = [];
        var product1_1Volumes = [];
        var product1_4Volumes = [];

        productVolumes.forEach(data => {
            months.push(data.mois);
            if (data.nature === '1_1') {
                product1_1Volumes.push(data.volume);
            } else if (data.nature === '1_4') {
                product1_4Volumes.push(data.volume);
            }
        });

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Produit 1_1',
                    data: product1_1Volumes,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    fill: false
                }, {
                    label: 'Produit 1_4',
                    data: product1_4Volumes,
                    borderColor: 'green',
                    backgroundColor: 'rgba(0, 255, 0, 0.2)',
                    fill: false
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
