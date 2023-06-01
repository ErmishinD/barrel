<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetrolItemResource;
use App\Http\Resources\PromotionResource;
use App\Models\PetrolItem;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getPetrolItems()
    {
        $petrol_items = PetrolItem::get();
        return PetrolItemResource::collection($petrol_items);
    }

    public function getPromotions()
    {
        $promotions = Promotion::get();
        return PromotionResource::collection($promotions);
    }
}
