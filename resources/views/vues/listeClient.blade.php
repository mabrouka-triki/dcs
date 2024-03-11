@extends ('layouts.master')
@section('content')

    <div class="container">
        <div class="blanc">
            <h1 style="text-align: center">Liste des Clients</h1>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="width: 25%; text-align:center">Client ID</th>
                <th style="width: 25%; text-align:center">Nom</th>
                <th style="width: 25%; text-align:center">GrandClientID</th>
                <th style="width: 25%; text-align:center">CentreActiviteID</th>
            </tr>
            </thead>
            @foreach ($mesClients as $unClient)
                <tr>
                    <td>{{$unClient->ClientID}}</td>
                    <td>{{$unClient->NomClient}}</td>
                    <td>{{$unClient->GrandClientID}}</td>
                    <td>{{$unClient->CentreActiviteID}}</td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-6 col-md-offset-3">
            @include('vues/error')
        </div>
@stop

