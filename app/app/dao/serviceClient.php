<?php

namespace App\dao;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;

class serviceClient
{
    public function getClient(){
        try{
            $lesclients= DB::table('clients')
                ->Select()
                ->get();
            return $lesclients;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getTopApplicationsByClient()
    {
        return DB::table('ligne_facturation')
            ->join('clients', 'ligne_facturation.CentreActiviteID', '=', 'clients.CentreActiviteID')
            ->join('grandclients', 'clients.GrandClientID', '=', 'grandclients.GrandClientID')
            ->join('application', 'ligne_facturation.IRT', '=', 'application.IRT')
            ->select('grandclients.NomGrandClient', 'application.nomAppli', DB::raw('SUM(ligne_facturation.prix) as total_amount'))
            ->groupBy('grandclients.GrandClientID', 'grandclients.NomGrandClient', 'application.IRT', 'application.nomAppli')
            ->orderByDesc('total_amount')
            ->take(10)
            ->get();
    }

    public function getTop5ClientsAmounts()
    {
        return DB::table('ligne_facturation')
            ->join('clients', 'ligne_facturation.CentreActiviteID', '=', 'clients.CentreActiviteID')
            ->select('clients.NomClient', DB::raw('SUM(ligne_facturation.prix) as total_amount'))
            ->groupBy('clients.NomClient')
            ->orderByDesc('total_amount')
            ->limit(5)
            ->get();
    }

    public function getProductVolumes()
    {
        return DB::table('ligne_facturation')
            ->select('mois', 'nature', 'volume')
            ->whereIn('nature', ['1_1', '1_4'])
            ->whereBetween('mois', ['2021-01-01', '2022-04-30'])
            ->orderBy('mois')
            ->get();
    }

}
