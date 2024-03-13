<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $data = Product::orderBy('created_at', 'desc')->get();
            // Log::debug($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = "<a href='" . route('products.show', $row->id) . "' class='edit btn btn-info btn-sm'>View</a>";
                    $btn = $btn . "<a href='" . route('products.edit', $row->id) . "' class='edit btn btn-primary btn-sm'>Edit</a>";;
                    $btn = $btn . "<a href='javascript:void(0)' data-route='" . route('products.destroy', $row->id) . "' data-id='" . $row->id . "' class='delete btn btn-danger btn-sm'>Delete</a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); 
        return view('products.show')->with(['product' => $product]); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response()->json(['success' => 'Product deleted successfully.']);
    }
}
