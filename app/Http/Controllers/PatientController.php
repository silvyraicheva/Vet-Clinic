<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $patients = Patient::all();
        $patients = Patient::paginate(10);
        return view('index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'species' => 'required|max:255',
            'color' => 'required|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|max:255',
            'weight' => 'required|numeric',


        ]);

        $patient = Patient::create($validatedData);

        return redirect('/patients')->with('success', 'Пациентът е успешно регистриран.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/patients')->with('error', 'Нямате достъп!');
        $patient = Patient::findOrFail($id);

        return view('edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/patients')->with('error', 'Нямате достъп!');
        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'species' => 'required|max:255',
            'color' => 'required|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|max:255',
            'weight' => 'required',


        ]);


        Patient::whereId($id)->update($validatedData);

        return redirect('/patients')->with('success', 'Данните са обновени успешно.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/patients')->with('error', 'Нямате достъп!');
        $patient = Patient::findOrFail($id);

        $patient->delete();

        return redirect('/patients')->with('success', 'Пациентът е изтрит.');
    }
}
