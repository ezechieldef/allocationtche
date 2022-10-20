<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;

/**
 * Class LotController
 * @package App\Http\Controllers
 */
class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::all();

        return view('lot.index', compact('lots'))
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lot = new Lot();
        return view('lot.create', compact('lot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lot::$rules);

        $lot = Lot::create($request->all());

        return redirect()->route('lots.index')
            ->with('success', 'Lot created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lot = Lot::find($id);

        return view('lot.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lot = Lot::find($id);

        return view('lot.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $lot)
    {
        request()->validate(Lot::$rules);

        $lot->update($request->all());

        return redirect()->route('lots.index')
            ->with('success', 'Lot updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lot = Lot::find($id)->delete();

        return redirect()->route('lots.index')
            ->with('success', 'Lot deleted successfully');
    }
}
