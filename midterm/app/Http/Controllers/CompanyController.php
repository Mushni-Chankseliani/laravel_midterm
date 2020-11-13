<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanies() {
        $data = Company::orderBy('id', 'DESC')->get();

        return view('pages.companies-page')->with('companies', $data);
    }

    public function createCompany(Request $request) {
        Company::create([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        return redirect()->back();
    }

    public function deleteCompany(Request $request) {
        Company::where('id', $request->id)->delete();

        return redirect()->back();
    }

    public function editCompany($id) {
        $data = Company::where('id', $id)->firstOrFail();
        return view('edit.company-edit')->with('company', $data);
    }

    public function updateCompany(Request $request) {
        Company::where('id', $request->id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        return redirect()->back();
    }
}
