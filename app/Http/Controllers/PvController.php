<?php

namespace App\Http\Controllers;

use App\Models\Pv;
use Illuminate\Http\Request;

/**
 * Class PvController
 * @package App\Http\Controllers
 */
class PvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pvs = Pv::all();

        return view('pv.index', compact('pvs'))
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pv = new Pv();
        return view('pv.create', compact('pv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pv::$rules);

        $pv = Pv::create($request->all());

        return redirect()->route('pv.index')
            ->with('success', 'Pv created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pv = Pv::find($id);

        return view('pv.show', compact('pv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pv = Pv::find($id);

        return view('pv.edit', compact('pv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pv $pv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pv $pv)
    {
        request()->validate(Pv::$rules);

        $pv->update($request->all());

        return redirect()->route('pv.index')
            ->with('success', 'Pv updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pv = Pv::find($id)->delete();

        return redirect()->route('pv.index')
            ->with('success', 'Pv deleted successfully');
    }
}
