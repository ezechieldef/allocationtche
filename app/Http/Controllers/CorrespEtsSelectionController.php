<?php

namespace App\Http\Controllers;

use App\Models\CorrespEtsSelection;
use Illuminate\Http\Request;

/**
 * Class CorrespEtsSelectionController
 * @package App\Http\Controllers
 */
class CorrespEtsSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correspEtsSelections = CorrespEtsSelection::paginate();

        return view('corresp-ets-selection.index', compact('correspEtsSelections'))
            ->with('i', (request()->input('page', 1) - 1) * $correspEtsSelections->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $correspEtsSelection = new CorrespEtsSelection();
        return view('corresp-ets-selection.create', compact('correspEtsSelection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CorrespEtsSelection::$rules);

        $correspEtsSelection = CorrespEtsSelection::create($request->all());

        return redirect()->route('correspondance-ets-selection.index')
            ->with('success', 'CorrespEtsSelection created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correspEtsSelection = CorrespEtsSelection::find($id);

        return view('corresp-ets-selection.show', compact('correspEtsSelection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correspEtsSelection = CorrespEtsSelection::find($id);

        return view('corresp-ets-selection.edit', compact('correspEtsSelection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CorrespEtsSelection $correspEtsSelection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorrespEtsSelection $correspEtsSelection)
    {
        request()->validate(CorrespEtsSelection::$rules);

        $correspEtsSelection->update($request->all());

        return redirect()->route('correspondance-ets-selection.index')
            ->with('success', 'CorrespEtsSelection updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $correspEtsSelection = CorrespEtsSelection::find($id)->delete();

        return redirect()->route('correspondance-ets-selection.index')
            ->with('success', 'CorrespEtsSelection deleted successfully');
    }
}
