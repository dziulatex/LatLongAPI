<?php

namespace App\Controller;

use App\Entity\HistoryOfApifetching;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class APIController extends AbstractController
{
    #[Route('/api/geolocation/{postcode}', method: 'GET')]
    public function translate(Request $request, EntityManagerInterface $em): Response
    {
        $response = new Response();
        $postCode = $request->attributes->get('postcode');
        $zipCodeCheckerController = new ZipCodesCheckerController();

        if (strtolower($request->headers->get('content-type')) != 'application/json') {
            $response = $this->json('Bad content-type', 400);
        }
        else if ($zipCodeCheckerController->checkIfAnyZipCode($postCode) == false) {
            $response = $this->json('This isnt any known zipCode', 402);
        } else {
            $geolocationController = new GeolocationController();
            $geolocationZipCode = $geolocationController->loadEntity($em, $postCode);
            if (null != $geolocationZipCode) {
                $response = $this->json($geolocationZipCode);
            } else {
                $zipCodeController = new ZipCodeController($postCode);
                $addressArray = $zipCodeController->ZipCodeToAddressArray();
                if (isset($addressArray['error'])) {
                    $response = $this->json($addressArray['error'], 404);
                } else {
                    $addressString = $zipCodeController->AddressToAddressString($addressArray);
                    $geolocation = $geolocationController->addressToGeolocation($addressString);
                    if (property_exists($geolocation, 'error')) {
                        $response = $this->json($geolocation->error, 404);
                    } else {
                        $geolocationController->createGeolocationRecord($em, $geolocation->lat, $geolocation->lng, $postCode);
                        $response = $this->json($geolocationZipCode);
                    }

                }
            }
        }
        if ($response->getStatusCode() == 200) {
            $historyOfGeolocationController = new HistoryOfGeolocationController();
            $historyOfGeolocationController->createGeolocationRecord($em, $postCode);
        }
        return $response;
    }

    #[Route('/api/geolocation/history', method: 'GET')]
    public function fetchHistory(Request $request, EntityManagerInterface $em): Response
    {
        if (strtolower($request->headers->get('content-type')) != 'application/json') {
            $response = $this->json('Bad content-type',400);
        } else {
            $historyOfGeolocationController = new HistoryOfGeolocationController();
            $records = $historyOfGeolocationController->fetchGeolocationRecords($em);
            if (!empty($records)) {
                $response = $this->json($records);
            } else {
                $response = $this->json('No history yet', 404);
            }
        }
        return $response;
    }
}