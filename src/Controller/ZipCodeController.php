<?php

namespace App\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
class ZipCodeController
{
    public $zipCode;
    function __construct(string $zipCode)
    {
        $zipCodesChecker=new ZipCodesCheckerController();
        if ( $zipCodesChecker->checkIfAnyZipCode($zipCode)==true) {
            $this->zipCode = $zipCode;
        }
        else
        {
            throw new \Exception('This isnt valid zipcode for any country');
        }
    }
public function ZipCodeToAddressArray(): array
{
    $url="http://kodpocztowy.intami.pl/api/".$this->zipCode;
    $client = new Client();
    try {
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() == 200) {
            $address = (json_decode($response->getBody()->getContents(), true))[0];
        }
    }
    catch(GuzzleException $e)
    {
        $address['error']=$e->getMessage();
    }
    return $address;

}
public function AddressToAddressString(array $address):string
{
    $addressStr=$address['miejscowosc']." ".$address['ulica'];
    return $addressStr;
}
}