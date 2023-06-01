<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::paginate();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(StorePromotionRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = $this->storePhoto($request);
        
        Promotion::create($data);
        return redirect()->route('promotions.index');
    }

    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', ['promotion' => $promotion]);
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', ['promotion' => $promotion]);
    }

    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $data = $request->validated();
        $data['photo'] = $this->storePhoto($request, $promotion);

        $promotion->update($data);
        return redirect()->route('promotions.index');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('petrol_items.index');
    }

    private function storePhoto($request, $promotion=null) {
        if (!$request->hasFile('photo')) {
            if ($promotion) return $promotion->photo;
            return null;
        }

        $file_name = now()->timestamp . '-' . $request->photo->getClientOriginalName();
        Storage::disk('public')->putFileAs('promotions', $request->photo, $file_name);
        return 'storage/promotions/' . $file_name;
    }
}
