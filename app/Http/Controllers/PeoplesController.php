<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeoplesRequest;
use App\Http\Requests\UpdatePeoplesRequest;
use App\Models\Peoples;
use App\Models\SchoolClass;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;


class PeoplesController extends Controller
{
    public function create(SchoolClass $schoolClass)
    {
        return view('peoples.create',compact('schoolClass'));
    }

    public function store(StorePeoplesRequest $request, SchoolClass $schoolClass, FileService $fileService): RedirectResponse
    {
        $storeData = $request->validated();

        $filePath = $fileService->handleFileUpload($request);

        if ($filePath) {
            $storeData['photo'] = $filePath;
        }
        $schoolClass->peoples()->create($storeData);

        return redirect()->route('school_classes.index')->with('success', 'Запись успешно создана');
    }

    public function show_class(SchoolClass $schoolClass)
    {
        $peoples = $schoolClass->peoples()->paginate(5);
        return view('school_classes.show_peoples', compact('schoolClass', 'peoples'));
    }

    public function edit(Peoples $people)
    {
        $schoolClasses = SchoolClass::select('id','name')->get();
        return view('peoples.edit',compact('people','schoolClasses'));
    }

    public function update(UpdatePeoplesRequest $request, Peoples $people,FileService $fileService): RedirectResponse
    {
        $updateData = $request->validated();
        $filePath = $fileService->handleFileUpload($request);
        if ($filePath) {
            $updateData['photo'] = $filePath;
        }
        $people->update($updateData);
        return redirect()->route('school_classes.index');
    }


    public function destroy(Peoples $people): JsonResponse
    {
        $people->delete();
        return response()->json(['success' => 'Данные удалены']);
    }
}
