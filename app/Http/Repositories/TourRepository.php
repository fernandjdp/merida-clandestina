<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TourRepositoryInterface;
use App\Http\Interfaces\ImageRepositoryInterface;
use App\Models\Tour;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class TourRepository implements TourRepositoryInterface 
{
    public function __construct(ImageRepositoryInterface $imageRepository) 
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAllTours() 
    {
        if (Auth::guard('admin')->check()) {
            return Inertia::render('Admin/Tours/Index', [
                'items' => Tour::all()->toArray(),
                'create_url' => URL::route('admin.tours.create'),
            ]);
        }

        return Inertia::render('Tours');
    }

    public function getTourById($tourId) 
    {
        return Tour::findOrFail($tourId);
    }

    public function deleteTour($tour) 
    {
        $tour->delete();
        return $this->getAllTours();
    }

    public function storeTour(array $tourData) 
    {
        $tour = Tour::create($tourData);

        $tourImageId = $this->uploadTourImages($tourData['images'], $tour)[0];

        $tour->image_id = $tourImageId;

        $tour->save();

        return $tour;
    }

    public function getTourCreatePage() 
    {
        return Inertia::render('Admin/Tours/CreateUpdate', [
            'index_url' => URL::route('admin.tours'),
            'store_url' => URL::route('admin.tours.store'),
        ]);
    }

    public function updateTour($tourId, array $newData) 
    {
        return Tour::whereId($tourId)->update($newData);
    }

    private function uploadTourImages($imageArray, $tourModel) {
        $imagesArray = [];
        foreach ($imageArray as $imageFile) {
            $image = $this->imageRepository->storeImage($tourModel, $imageFile);
            array_push($imagesArray, $image->id);
        }
        return $imagesArray;
    }
}