@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="blanc">
            <h1 style="text-align: center">Evolution des montants pour les 5 plus grands clients</h1>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="width: 25%; text-align:center">Nom Client</th>
                <th style="width: 25%; text-align:center">Total engendré</th>
            </tr>
            </thead>
            @foreach ($mesProduits as $unClient)
                <tr>
                    <td style="text-align:center">{{$unClient->NomClient}}</td>
                    <td style="text-align:center">{{$unClient->total_amount}}</td>
                </tr>
            @endforeach
        </table>

        <!-- Graphique -->
        <canvas id="graphique"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('graphique').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($mesProduits as $unClient)
                            '{{$unClient->NomClient}}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Montant Total (€)',
                        data: [
                            @foreach ($mesProduits as $unClient)
                                {{$unClient->total_amount}},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
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
    </div>
@stop
