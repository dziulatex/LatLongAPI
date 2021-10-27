<?php

namespace App\Controller;

use App\Entity\HistoryOfApifetching;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HistoryOfGeolocationController extends AbstractController
{
    public function createGeolocationRecord(EntityManagerInterface $em, $postCode)
    {
        $geolocationRecord = new HistoryOfApifetching();
        $geolocationRecord->setZipCode($postCode);
        $now = new DateTimeImmutable(false);
        $geolocationRecord->setDatetime($now);
        $em->persist($geolocationRecord);
        $em->flush();
    }

    public function fetchGeolocationRecords(EntityManagerInterface $em)
    {
        $conn = $em->getConnection();
        $sql = "SELECT * FROM history_of_apifetching LEFT JOIN geolocation_zip_codes USING (zipcode)";
        $history = $conn->fetchAllAssociative($sql);
        return $history;
    }
}