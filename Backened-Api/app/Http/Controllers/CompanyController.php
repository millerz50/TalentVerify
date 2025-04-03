<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'registration_number' => 'required|string|unique:companies',
            'address' => 'required|string',
            'contact_person' => 'required|string',
            'email' => 'required|email|unique:companies',
        ]);

        $company = Company::create($validated);
        return response()->json(['message' => 'Company created!', 'data' => $company]);
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);

        return response()->json(['message' => 'Company updated!', 'data' => $company]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json(['message' => 'Company deleted!']);
    }
}
