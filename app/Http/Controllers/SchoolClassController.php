<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Http\Requests\StoreSchoolClassRequest;
use App\Http\Requests\UpdateschoolClassRequest;
use Illuminate\Http\RedirectResponse;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolClasses = SchoolClass::select('id', 'name')->get();
        return view('school_classes.index',compact('schoolClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolClassRequest $request): RedirectResponse
    {
        $storeData = $request->validated();
        SchoolClass::create($storeData);
        return redirect()->route('school_classes.index')->with('success', 'Класс создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(schoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(schoolClass $schoolClass)
    {
        return view('school_classes.edit', compact('schoolClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateschoolClassRequest $request, schoolClass $schoolClass): RedirectResponse
    {
        $updateData = $request->validated();
        $schoolClass->update($updateData);
        return redirect()->route('school_classes.index')->with('success', 'Инфрормация успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schoolClass $schoolClass): RedirectResponse
    {
        $schoolClass->delete();
        return redirect()->route('school_classes.index')->with('success', 'Класс удален');
    }
}
