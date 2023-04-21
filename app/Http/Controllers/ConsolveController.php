<?php

namespace App\Http\Controllers;

use App\Models\Consolve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsolveController extends Controller
{
    function index(Request $request)
    {
        $consolve_data = Consolve::get();
        return view('admin.consolve.index' ,compact('consolve_data'));
    }

    function create(Request $request)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $validator = Validator::make($request->all(), [
            'name' => "required|min:3",
            'person_name' => 'required|',
            'gmail' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'mobile' => 'required|numeric|digits:10',
            'account_link' => 'required|regex:'.$regex,
            'account_country' => ['required', 'string', 'max:45'],
            'order_id' => 'required|',
            'account_id' => 'required|',
            'status' => 'required|',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('error',$error);
        } else {
            $consolve_data = new Consolve();
            $consolve_data->name = $request->name;
            $consolve_data->person_name = $request->person_name;
            $consolve_data->gmail = $request->gmail;
            $consolve_data->mobile = $request->mobile;
            $consolve_data->account_link = $request->account_link;
            $consolve_data->account_country = $request->account_country;
            $consolve_data->order_id = $request->order_id;
            $consolve_data->account_id = $request->account_id;
            $consolve_data->status = $request->status;
            $consolve_data->save();

            return redirect()->back()->with('status', 'Consolve Successfully Created');
        }
    }

    function edit(Request $request ,$id)
    {
        $consolve_data = Consolve::where('id',$id)->first();

        return view('admin.consolve.update',compact('consolve_data'));
    }

    function update(Request $request ,$id)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $validator = Validator::make($request->all(), [
            'name' => "required|min:3",
            'person_name' => 'required|',
            'gmail' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'mobile' => 'required|numeric|digits:10',
            'account_link' => 'required|regex:'.$regex,
            'account_country' => ['required', 'string', 'max:45'],
            'order_id' => 'required|',
            'account_id' => 'required|',
            'status' => 'required|',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('error',$error);
        } else {

            $consolve_data = Consolve::find($id);
            $consolve_data->name = $request->name;
            $consolve_data->person_name = $request->person_name;
            $consolve_data->gmail = $request->gmail;
            $consolve_data->mobile = $request->mobile;
            $consolve_data->account_link = $request->account_link;
            $consolve_data->account_country = $request->account_country;
            $consolve_data->order_id = $request->order_id;
            $consolve_data->account_id = $request->account_id;
            $consolve_data->status = $request->status;
            $consolve_data->update();

            return back()->with("status", "Consolve Successfully Updated!");
        }
    }

    function delete($id)
    {
        $consolve_delete = Consolve::find($id);
        $consolve_delete->delete();
        return back()->with("status", "Consolve Delete successfully");
    }
}

