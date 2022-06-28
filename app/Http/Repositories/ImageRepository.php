<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ImageRepositoryInterface;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class ImageRepository implements ImageRepositoryInterface 
{
    public function storeImage($modelData, $imageFile) 
    {   
        $imageName = $this->formatImageName($modelData->name);

        $imageSrc = Storage::disk('public')->put($imageName, $imageFile);

        $metadata = $this->processImageMetadata($imageName, $imageSrc, $imageFile, $modelData);

        return Image::create($metadata);
    }

    private function processImageMetadata($imageName, $imageSrc, $imageFile, $modelData) {
        return [
            'title' => $imageName.Carbon::now()->format('Y-m-d-h-i-s'),
            'src' => $imageSrc,
            'tour_id' => $modelData->id,
            'mime_type' => $imageFile->getMimeType(),
            'description' => $modelData->description,
            'alt' => 'Una imagen del tour',
        ];
    }

    private function formatImageName($imageName) {
        return $imageName.Carbon::now()->format('Y-m-d-h-i-s');
    }
}