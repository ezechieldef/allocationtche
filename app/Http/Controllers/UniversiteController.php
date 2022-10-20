<?php

namespace App\Http\Controllers;

use App\Models\Universite;
use Illuminate\Http\Request;

/**
 * Class UniversiteController
 * @package App\Http\Controllers
 */
class UniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universites = Universite::paginate();

        return view('universite.index', compact('universites'))
            ->with('i', (request()->input('page', 1) - 1) * $universites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universite = new Universite();
        return view('universite.create', compact('universite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Universite::$rules);

        $universite = Universite::create($request->all());

        return redirect()->route('universites.index')
            ->with('success', 'Universite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $universite = Universite::find($id);

        return view('universite.show', compact('universite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $universite = Universite::find($id);

        return view('universite.edit', compact('universite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Universite $universite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Universite $universite)
    {
        request()->validate(Universite::$rules);

        $universite->update($request->all());

        return redirect()->route('universites.index')
            ->with('success', 'Universite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $universite = Universite::find($id)->delete();

        return redirect()->route('universites.index')
            ->with('success', 'Universite deleted successfully');
    }
}
