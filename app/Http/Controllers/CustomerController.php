<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;

class CustomerController extends Controller
{
	public function index()
	{
		$customer_list = Customer::all();
		return view('admin.customer_list',compact('customer_list'));
	}
    public function create()
    {
    	return view('admin.customer');
    }
    public function insert_customer(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'customer_name' => 'required',
            'customer_code' => 'required|unique:customers'
        ]);
        if($validator->fails())
        {
            return redirect('customer')->withErrors($validator)->withInput();
        }
        else
        {
            $customer=new Customer;
            $customer->customer_name = $request->customer_name;
            $customer->customer_code = $request->customer_code;
            $customer->save();
            return redirect('customer-list')->with('success','Successfully Submit');  
        }
    }
    public function delete_customer($id)
    {
    	$delete_customer=Customer::where('id',$id)->delete();
    	return redirect('customer-list')->with('success','Successfully Deleted');
    }
    public function edit_customer($id)
    {
    	$edit_customer=Customer::find($id);
    	return view('admin/update_customer',compact('edit_customer'));
    }
    public function update_customer(Request $request)
    {
    	$update_customer=Customer::find($request->id);
    	$update_customer->customer_name=$request->customer_name;
    	$update_customer->customer_code=$request->customer_code;
    	$update_customer->save();
    	return redirect('customer-list')->with('success','Successfully Updated');
    }

}
