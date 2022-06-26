<?php

namespace App\Http\Interfaces;

interface TourRepositoryInterface 
{
    public function getAllTours();
    public function getTourById($tourId);
    public function deleteTour($tourId);
    public function storeTour(array $tourData);
    public function getTourCreatePage();
    public function updateTour($tourId, array $newData);
}