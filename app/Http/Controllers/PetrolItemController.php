<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetrolItemRequest;
use App\Models\PetrolItem;
use Illuminate\Support\Facades\Storage;

class PetrolItemController extends Controller
{
    public function index()
    {
        $petrol_items = PetrolItem::paginate();
        return view('admin.petrol_items.index', compact('petrol_items'));
    }

    public function create()
    {
        return view('admin.petrol_items.create');
    }

    public function store(PetrolItemRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = $this->storePhoto($request);
        
        PetrolItem::create($data);
        return redirect()->route('petrol_items.index');
    }

    public function show(PetrolItem $petrolItem)
    {
        return view('admin.petrol_items.show', ['petrol_item' => $petrolItem]);
    }

    public function edit(PetrolItem $petrolItem)
    {
        return view('admin.petrol_items.edit', ['petrol_item' => $petrolItem]);
    }

    public function update(PetrolItemRequest $request, PetrolItem $petrolItem)
    {
        $data = $request->validated();
        $data['photo'] = $this->storePhoto($request, $petrolItem);

        $petrolItem->update($data);
        return redirect()->route('petrol_items.index');
    }

    public function destroy(PetrolItem $petrolItem)
    {
        $petrolItem->delete();
        return redirect()->route('petrol_items.index');
    }

    private function storePhoto($request, $petrol_item=null) {
        if (!$request->hasFile('photo')) {
            if ($petrol_item) return $petrol_item->photo;
            return null;
        }

        $file_name = now()->timestamp . '-' . $request->photo->getClientOriginalName();
        Storage::disk('public')->putFileAs('petrol_items', $request->photo, $file_name);
        return 'storage/petrol_items/' . $file_name;
    }
}
