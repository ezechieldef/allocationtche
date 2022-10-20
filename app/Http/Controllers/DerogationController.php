<?php

namespace App\Http\Controllers;

use App\Models\Derogation;
use Illuminate\Http\Request;

/**
 * Class DerogationController
 * @package App\Http\Controllers
 */
class DerogationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $derogations = Derogation::paginate();

        return view('derogation.index', compact('derogations'))
            ->with('i', (request()->input('page', 1) - 1) * $derogations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $derogation = new Derogation();
        return view('derogation.create', compact('derogation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Derogation::$rules);

        $derogation = Derogation::create($request->all());

        return redirect()->route('derogations.index')
            ->with('success', 'Derogation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $derogation = Derogation::find($id);

        return view('derogation.show', compact('derogation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $derogation = Derogation::find($id);

        return view('derogation.edit', compact('derogation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Derogation $derogation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Derogation $derogation)
    {
        request()->validate(Derogation::$rules);

        $derogation->update($request->all());

        return redirect()->route('derogations.index')
            ->with('success', 'Derogation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $derogation = Derogation::find($id)->delete();

        return redirect()->route('derogations.index')
            ->with('success', 'Derogation deleted successfully');
    }
}
