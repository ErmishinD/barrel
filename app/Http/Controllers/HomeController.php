<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetrolItemResource;
use App\Models\PetrolItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getPetrolItems()
    {
        $petrol_items = PetrolItem::get();
        return PetrolItemResource::collection($petrol_items);
    }
}
