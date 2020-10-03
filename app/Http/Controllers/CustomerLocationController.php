<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerLocation;
use App\Customer;
use Validator;

class CustomerLocationController extends Controller
{
    public function index()
	{
		$customer_location_list = CustomerLocation::all();
		return view('admin.customer_location_list',compact('customer_location_list'));
	}
    public function create()
    {
    	$customer_list = Customer::all();
    	return view('admin.customer_location',compact('customer_list'));
    }
    public function insert_customer_location(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'customer_id' => 'required',
            'location_name' => 'required|unique:customer_locations'
        ]);
        if($validator->fails())
        {
            return redirect('add-customer-location')->withErrors($validator)->withInput();
        }
        else
        {
            $customer=new CustomerLocation;
            $customer->customer_id = $request->customer_id;
            $customer->location_name = $request->location_name;
            $customer->save();
            return redirect('customer-location-list')->with('success','Successfully Submited');
        }
    }
    public function delete_customer_location($id)
    {
    	$delete_customer=CustomerLocation::where('id',$id)->delete();
    	return redirect('customer-location-list')->with('success','Successfully Deleted');
    }
    public function edit_customer_location($id)
    {	
    	$customer_list = Customer::all();
    	$edit_customer_location=CustomerLocation::find($id);
    	return view('admin/update_customer_location',compact('edit_customer_location','customer_list'));
    }
    public function update_customer_location(Request $request)
    {
    	$update_customer=CustomerLocation::find($request->id);
    	$update_customer->customer_id=$request->customer_id;
    	$update_customer->location_name=$request->location_name;
    	$update_customer->save();
    	return redirect('customer-location-list')->with('success','Successfully Updated');
    }
}
