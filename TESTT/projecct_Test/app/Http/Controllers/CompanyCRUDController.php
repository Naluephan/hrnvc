<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyCRUDController extends Controller
{
    //
    public function index(){
        $data['companies'] = Company::orderBy('id','desc')->paginate(5);
        return view('companies.index',$data);
    }

    public function create(){
        return view('companies.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'tel'=>'required',
            
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->tel = $request->tel;
        $company->save();
        return redirect()->route('companies.index')->with('success','Company has been create successfully');
    }

    public function edit(Company $company) {
        return view('companies.edit',compact('company'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tel'=>'required',
        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->tel = $request->tel;
        $company->save();
        
        return redirect()->route('companies.index')->with('success','Company has been update successfully');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been delete successfully');
    }
}
