<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenant.index',compact('tenants'));
    }

    public function search(Request $request){
        $data = $request->input();
        $searchBy = $data['search'];

        if ($searchBy == ""){
            return redirect('tenant');
        }

        $searchByData = "%".$searchBy."%";
        $tenants = Tenant::where('name', 'like', $searchByData)->orWhere('address', 'like', $searchByData)->get();
        return view('tenant.index',compact('tenants'));
    }

    public function create()
    {
        $roles = json_decode(Auth::user()->role);
        if(!in_array('ROLE_EDITOR',$roles)){
            return redirect('tenant')->with('error', 'Only admin and manager can update any tenant.');
        }
        return view('tenant.add');
    }

    public function store(Request $request)
    {
        $roles = json_decode(Auth::user()->role);
        if(!in_array('ROLE_EDITOR',$roles)){
            return redirect('tenant')->with('error', 'Only admin and manager store update any tenant.');
        }

        if ($request->request->get('tenantSubmit') !== null) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'address' => 'required',
                'type' => 'required',
                'purpose' => 'required|max:255',
                'rent_amount' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $request->input();
            unset($data['_token']);

            $insertStatus = Tenant::create($data);

            if ($insertStatus) {
                return redirect('tenant')->with('success', 'Tenant submit successfully.');
            } else {
                return back()->with('error', 'Something went wrong.');
            }
        }
    }

    public function edit($id)
    {
        $roles = json_decode(Auth::user()->role);
        if(!in_array('ROLE_EDITOR',$roles)){
            return redirect('tenant')->with('error', 'Only admin and manager can edit any tenant.');
        }

        $tenant = Tenant::where('id',$id)->first();
        return view('tenant.edit',compact('tenant'));
    }

    public function update(Request $request)
    {
        $roles = json_decode(Auth::user()->role);
        if(!in_array('ROLE_EDITOR',$roles)){
            return redirect('tenant')->with('error', 'Only admin and manager can update any tenant.');
        }

        if ($request->request->get('tenantUpdate') !== null) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|max:255',
                'address' => 'required',
                'type' => 'required',
                'purpose' => 'required|max:255',
                'rent_amount' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $request->input();

            $tenant = Tenant::find($data['id']);
            $tenant->name = $data['name'];
            $tenant->address = $data['address'];
            $tenant->locality = $data['locality'];
            $tenant->type = $data['type'];
            $tenant->purpose = $data['purpose'];
            $tenant->rent_amount = $data['rent_amount'];
            $tenant->save();

            return redirect('tenant')->with('success', 'Tenant update successfully.');
        }
    }

    public function destroy($id)
    {
        //admin
        $roles = json_decode(Auth::user()->role);
        if(!in_array('ROLE_ADMIN',$roles)){
            return redirect('tenant')->with('error', 'Only admin can delete any tenant.');
        }
        return redirect('tenant')->with('success', 'Tenant deleted successfully.');
    }
}
