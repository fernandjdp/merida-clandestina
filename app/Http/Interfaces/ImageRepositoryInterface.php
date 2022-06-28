<?php

namespace App\Http\Interfaces;

interface ImageRepositoryInterface 
{
    public function storeImage($imageName, $imageFile);
}