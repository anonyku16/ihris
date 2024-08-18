<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();

        $sortField = $request->input('sort', 'ID');
        $sortDirection = $request->input('direction', 'asc'); // Default to 'asc' if not provided
        $query->orderBy($sortField, $sortDirection);

        $searchString = $request->input('search');
        if ($searchString) {
            $query->where('name', 'like', '%' . $searchString . '%');
            $query->orWhere('code', 'like', '%' . $searchString . '%');
        }

        $companies = $query->paginate(12)->withQueryString();
        return Inertia::render('ihris/company', [
            'companies' => fn () => $companies,
            'sort' => fn () => $sortField,
            'direction' => fn () => $sortDirection,
            'filters' => fn () => $searchString
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        try {
            Company::create($validate);
        } catch (\Throwable $th) {
        }

        return to_route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $record = Company::findOrFail($id);
        $record->update($request->all());
        return to_route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = Company::findOrFail($id);

        // Delete the record
        $record->delete();
        return to_route('company.index');
    }
}
