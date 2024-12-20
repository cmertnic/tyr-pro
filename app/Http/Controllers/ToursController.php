<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tours::where('tour_id')->paginate(10);
        
        return view('tours.index', ['tours' => $tours]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'path_img' => ['required', 'string', 'max:255'],
            'datte' => ['required', 'date', 'max:255'],
            'price' => ['required', 'number', 'max:255'],
        ]);
        tours::create([
            'title' => $request->title,
            'path_img' => $request->path_img,
            'datte' => $request->datte,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('info','запрос отправлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(tours $tours)
    {
        return view('tours.edit', compact('tours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tours $tours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $request->validate([
            'id' => ['required']
        ]);
        tours::where('id', $request->id)->update([
            'id' => $request->id,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tours $tours)
    {
        //
    }
}
