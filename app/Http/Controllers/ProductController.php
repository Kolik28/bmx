<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{

    private $disk_product = 'local';
    private $dataItem = 'data/product.json';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('auth')) {
            return redirect('/');
        }

        $product = Storage::disk($this->disk_product)->get($this->dataItem);
        $item = json_decode($product, true);
        
        $coll = collect($item);
        $item1 = $coll->where('type', 'airbrush')->values()->all();
        $item2 = $coll->where('type', 'polosan')->values()->all();
        $item3 = $coll->where('type', 'fullset')->values()->all();

        $item = [
            'airbrush' => $item1,
            'polosan' => $item2,
            'fullset' => $item3,
        ];

        if (
            !Storage::disk($this->disk_product)->exists($this->dataItem) ||
            Storage::disk($this->disk_product)->size($this->dataItem) === 0
        ) {
            Storage::disk($this->disk_product)->put($this->dataItem, '[]');
            return [];
        }

        return view('product', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
         if (!Session::get('auth')) {
            return redirect('/');
        }
        
        $collection = collect(json_decode(Storage::disk($this->disk_product)->get($this->dataItem), true));

        $items = $collection->firstWhere('id', $id);
        return view('detail', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
