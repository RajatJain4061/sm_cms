<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\CustomerLocation;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
	{
		$order_list = Order::all();
		return view('admin.order_list',compact('order_list'));
	}
    public function create()
    {
    	$customer_list = Customer::all();
    	return view('admin.order',compact('customer_list'));
    }
    public function insert_order(Request $request)
    {
    	$order=new Order;
    	$order->customer_id = $request->customer_id;
    	$order->customer_location_id = $request->customer_location_id;
    	$order->order_number = $request->order_number;
    	$order->order_date = $request->order_date;
    	$order->quantity = $request->quantity;
    	$order->grade = $request->grade;
    	$order->rate = $request->rate;
    	$order->remarks = $request->remarks;
    	$order->save();
    	return redirect('orders-list')->with('success','Successfully Submited');
    }
    public function delete_order($id)
    {
    	$delete_customer=Order::where('id',$id)->delete();
    	return redirect('orders-list')->with('success','Successfully Deleted');
    }
    public function edit_order($id)
    {	
    	$customer_list = Customer::all();
    	$edit_order=Order::find($id);
    	return view('admin/update_order',compact('customer_list','edit_order','customer_list'));
    }
    public function update_order(Request $request)
    {
    	$update_order=Order::find($request->id);
    	$update_order->customer_id=$request->customer_id;
    	$update_order->customer_location_id=$request->customer_location_id;
        $update_order->order_number=$request->order_number;
        $update_order->order_date=$request->order_date;
        $update_order->quantity=$request->quantity;
        $update_order->grade=$request->grade;
        $update_order->rate=$request->rate;
        $update_order->remarks=$request->remarks;
    	$update_order->save();
    	return redirect('orders-list')->with('success','Successfully Updated');
    }
    public function get_customer_id($id)
    {
        $order_customer=CustomerLocation::where('customer_id',$id)->get();
        ?>
        
         <option value="">--Select Customer Location--</option>
        <?php 
        foreach($order_customer as $order_customer_list){ ?>
                <option value="<?php echo $order_customer_list->id; ?>"><?php echo $order_customer_list->location_name;?></option>
        <?php }
    }
    public function get_update_customer_id($id)
    {
        $order_customer=CustomerLocation::where('customer_id',$id)->get();
        ?>
        
         <option value="">--Select Customer Location--</option>
        <?php 
        foreach($order_customer as $order_customer_list){ ?>
                <option value="<?php echo $order_customer_list->id; ?>"><?php echo $order_customer_list->location_name;?></option>
        <?php }
    }
    public function export()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}


