<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditLetterRequest;
use App\Http\Requests\StoreLetterRequest;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::all();

        $letters->transform(function($letter) {
            $letter->path_file = Storage::url($letter->path_file);
            return $letter;
        });

        return Inertia::render('Letter/Index', [
            'letters' => $letters,
        ]);
    }


    public function create()
    {  
        return Inertia::render('Letter/Create');
    }


    public function store(StoreLetterRequest $request)
    {
        $filePath = $request->file->store('public/letters');

        $letter = Letter::create([
            'name' => $request->name,
            'path_file' => $filePath,
        ]);

        return redirect()->route('letters.index')->with([
            'message' => 'Surat berhasil disimpan',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        $letter->path_file = Storage::url($letter->path_file);
        return Inertia::render('Letter/Update', [
            'letter' => $letter,
        ]);
    }


    public function update(EditLetterRequest $request, Letter $letter)
    {
        $letter->update([
            'name' => $request->name,
        ]);

        if ($request->file) {
            $oldPathFile = $letter->path_file;
            $pathFile = $request->file->store('public/letters');
            
            Storage::delete($oldPathFile);
            
            $letter->update([
                'path_file' => $pathFile,
            ]);
        }

        return redirect()->route('letters.index')->with([
            'message' => 'Surat berhasil diubah',
        ]);
    }

    public function destroy(Letter $letter)
    {
        Storage::delete($letter->path_file);
        $letter->delete();

        return redirect()->route('letters.index')->with([
            'message' => 'Surat berhasil dihapus',
        ]);
    }
}
