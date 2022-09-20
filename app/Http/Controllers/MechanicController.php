<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mechanics = match ($request->sort) {
            'name_asc' => Mechanic::orderBy('name', 'asc')->paginate(5)->withQueryString(),
            'name_desc' => Mechanic::orderBy('name', 'desc')->paginate(5)->withQueryString(),
            'surname_asc' => Mechanic::orderBy('surname', 'asc')->paginate(5)->withQueryString(),
            'surname_desc' => Mechanic::orderBy('surname', 'desc')->paginate(5)->withQueryString(),
            default => Mechanic::paginate(5)->withQueryString()
        };



       return view('mechanic.index', [
        'mechanics' => $mechanics,
        'sortSelect' => $request->sort
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMechanicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mechanic = new Mechanic;
        $mechanic->name = $request->name;
        $mechanic->surname = $request->surname;
        $mechanic->save();
        return redirect()->route('m_index')
        ->with('success_msg', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        return view('mechanic.show', [
            'mechanic' => $mechanic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanic.edit', [
            'mechanic' => $mechanic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMechanicRequest  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        $mechanic->name = $request->name;
        $mechanic->surname = $request->surname;
        $mechanic->save();
        return redirect()->route('m_index')
        ->with('success_msg', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if ($mechanic->getTrucks()->count()) {
            return redirect()->back()->with('info_msg', 'Negalima istrinti');
        }
        $mechanic->delete();
        return redirect()->route('m_index');
    }
}