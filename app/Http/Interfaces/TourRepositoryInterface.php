<?php

namespace App\Http\Interfaces;

interface TourRepositoryInterface 
{
    public function getAllTours();
    public function getTourById($tourId);
    public function deleteTour($tourId);
    public function createTour(array $tourData);
    public function updateTour($tourId, array $newData);
}