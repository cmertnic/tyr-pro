<?php

namespace App\Http\Controllers;

use App\Models\Requestt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
class RequesttController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestt = Requestt::where('user_id', Auth::id())->paginate(10);
        
        return view('requestt.index', ['requestt' => $requestt]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('requestt.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => ['required', 'number', 'max:255'],
            'cost' => ['required', 'number', 'max:255'],
            'tour_id' => ['required', 'number', 'max:255'],
            'user_id' => ['required', 'number', 'max:255'],
        ]);
        Requestt::create([
            'number' => $request->number,
            'cost' => $request->cost,
            'tour_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('info','запрос отправлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Requestt $requestt)
    {
        return view('repquestt.edit', compact('requestt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requestt $requestt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $request->validate([
            'tour_id' => ['required'],
            'id' => ['required']
        ]);
        Requestt::where('id', $request->id)->update([
            'tour_id' => $request->tour_id,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requestt $requestt)
    {
        //
    }
}
