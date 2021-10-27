<?php
namespace App\Controller;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;
use App\Entity\GeolocationZipCodes;
use App\Repository\GeolocationZipCodesRepository;
use Doctrine\ORM\EntityManagerInterface;
class GeolocationController extends AbstractController
{
    public $url="";
    public function addressToGeolocation($address)
    {
        $this->url="https://maps.googleapis.com/maps/api/geocode/json";
        $client = new Client();
        $headers=['key'=>$_ENV['APP_GEOLOCATIONAPIKEY'],'address'=>$address];
        $response = $client->request('GET',$this->url,['query'=>$headers]);
        $object=json_decode($response->getBody()->getContents());
        $geolocation = ($object->results[0]->geometry->location);
        dd($geolocation);
        if (!empty($geolocation)&& ''!=$geolocation && is_object($geolocation))
        {
            return $geolocation;
        }
        else
        {
            return $geolocation->error='unknown error';
        }
    }

    /**
     * @param float $lat
     * @param float $lng
     * @param string $zipcode
     */
    public function createGeolocationRecord(EntityManagerInterface $em,float $lat,float $lng, string $zipCode)
    {
        $geolocationDBModel=new GeolocationZipCodes();
        $geolocationDBModel->setLatitude($lat);
        $geolocationDBModel->setLongtitude($lng);
        $geolocationDBModel->setZipCode($zipCode);
        $em->persist($geolocationDBModel);
        $em->flush();
        return new Response('Saved successfully');
    }
    public function loadEntity(EntityManagerInterface $em,string $zipCode)
    {

                $geolocation=$em->find(GeolocationZipCodes::class,$zipCode);
                return $geolocation;
    }

}