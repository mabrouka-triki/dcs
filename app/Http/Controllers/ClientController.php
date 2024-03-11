<?php

namespace App\Http\Controllers;

use App\dao\serviceClient;
use App\dao\serviceProduits;
use Illuminate\Support\Facades\Session;

use Exception;
use App\Exceptions\MonException;

class ClientController
{

    public function getclient()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceClient = new serviceClient();
            $mesClients = $unServiceClient->getClient();
            return view('vues/listeClient', compact('mesClients', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function getTopApplications()
    {
        try {
            $topApplicationsDao = new serviceClient();
            $topApplications = $topApplicationsDao->getTopApplicationsByClient();
            return view('vues/top_applications', compact('topApplications'));
        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function getproduits()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceProduit = new serviceClient();
            $mesProduits = $unServiceProduit->getTop5ClientsAmounts();
            return view('vues/graphique', compact('mesProduits', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function getProductVolumes()
    {
        try {
            $productVolumeDao = new serviceClient();
            $productVolumes = $productVolumeDao->getProductVolumes();
            return view('vues/product_volume_chart', compact('productVolumes'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

}
