<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PetsExport;
use App\Imports\PetImport;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::paginate(20);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'photo' => ['required', 'image'],
            'kind' => ['required'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'breed' => ['required', 'string'],
            'location' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        if($validation) {
            if($request->hasFile('photo')) {
                $photo = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images/pets'), $photo);
            }
            
            $pet = new Pet();
            $pet->name        = $request->name;
            $pet->photo       = $photo;
            $pet->kind        = $request->kind;
            $pet->weight      = $request->weight;
            $pet->age         = $request->age;
            $pet->breed       = $request->breed;
            $pet->location    = $request->location;
            $pet->description = $request->description;
            $pet->active      = $request->active ?? 1;
            $pet->status      = $request->status ?? 'available';

            if($pet->save()) {
                return redirect('pets')
                    ->with('message', 'The pet: '.$pet->name.' was successfully created!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'kind' => ['required'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'breed' => ['required', 'string'],
            'location' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        if($validation) {
            if($request->hasFile('photo')) {
                $photo = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images/pets'), $photo);
                if($pet->photo != 'no-photo.webp') {
                    unlink(public_path('images/pets/').$pet->photo);
                }
            } else {
                $photo = $pet->photo;
            }

            $pet->name = $request->name;
            $pet->photo = $photo;
            $pet->kind = $request->kind;
            $pet->weight = $request->weight;
            $pet->age = $request->age;
            $pet->breed = $request->breed;
            $pet->location = $request->location;
            $pet->description = $request->description;
            $pet->active = $request->active;
            $pet->status = $request->status;

            if($pet->save()) {
                return redirect('pets')
                    ->with('message', 'The pet: '.$pet->name.' was successfully updated!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if($pet->photo != 'no-photo.webp') {
            unlink(public_path('images/pets/').$pet->photo);
        }

        if($pet->delete()) {
            return redirect('pets')
                ->with('message', 'The pet: '.$pet->name.' was successfully deleted!');
        }
    }

    public function search(Request $request)
    {
        $pets = Pet::where('name', 'LIKE', '%'.$request->q.'%')->paginate(20);
        return view('pets.search')->with('pets', $pets);
    }

    public function pdf()
    {
        $pets = Pet::all();
        $pdf = PDF::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    // public function excel()
    // {
    //     return Excel::download(new PetsExport, 'allpets.xlsx');
    // }

    // public function import(Request $request)
    // {
    //     $file = $request->file('file');
    //     Excel::import(new PetImport, $file);
    //     return redirect()->back()->with('message', 'Pets imported successfully');
    // }
}