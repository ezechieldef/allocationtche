<?php

namespace App\Http\Controllers;

use App\Models\CorrespFilSelection;
use Illuminate\Http\Request;

/**
 * Class CorrespFilSelectionController
 * @package App\Http\Controllers
 */
class CorrespFilSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correspFilSelections = CorrespFilSelection::all();

        return view('corresp-fil-selection.index', compact('correspFilSelections'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ini_set("memory_limit","200M");
        $correspFilSelection = new CorrespFilSelection();
        return view('corresp-fil-selection.create', compact('correspFilSelection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CorrespFilSelection::$rules);

        $correspFilSelection = CorrespFilSelection::create($request->all());

        return redirect()->route('correspondance-fil-selection.index')
            ->with('success', 'CorrespFilSelection created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correspFilSelection = CorrespFilSelection::find($id);

        return view('corresp-fil-selection.show', compact('correspFilSelection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correspFilSelection = CorrespFilSelection::find($id);

        return view('corresp-fil-selection.edit', compact('correspFilSelection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CorrespFilSelection $correspFilSelection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorrespFilSelection $correspFilSelection)
    {
        request()->validate(CorrespFilSelection::$rules);

        $correspFilSelection->update($request->all());

        return redirect()->route('correspondance-fil-selection.index')
            ->with('success', 'CorrespFilSelection updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $correspFilSelection = CorrespFilSelection::find($id)->delete();

        return redirect()->route('correspondance-fil-selection.index')
            ->with('success', 'CorrespFilSelection deleted successfully');
    }
}
