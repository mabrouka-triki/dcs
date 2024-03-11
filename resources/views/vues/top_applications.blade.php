<!-- resources/views/top_applications.blade.php -->

@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Top 10 des applications par grand client en euros</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align:center">Nom du Grand Client</th>
                <th style="text-align:center">Nom de l'Application</th>
                <th style="text-align:center">Total (€)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($topApplications as $application)
                <tr>
                    <td style="text-align:center">{{ $application->NomGrandClient }}</td>
                    <td style="text-align:center">{{ $application->nomAppli }}</td>
                    <td style="text-align:center">{{ $application->total_amount }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
