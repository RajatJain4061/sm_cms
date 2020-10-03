@extends('layouts.master')
@section('title','Customer List')
@section('content')




<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><strong>Order List</strong>
                </h4>
                <div style="float: right">
                  <a href="{{ url('add-order') }}">Add Order</a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="{{ url('export-order') }}">Export</a>
                </div>
              </div>
              <div class="card-body">
                <?php 
                  if(Session::has('success')){ ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> <?php echo Session::get('success'); ?>
                    </div>
                  <?php } ?>

                  <?php 
                  if(Session::has('error')){ ?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error!</strong> <?php echo Session::get('error'); ?>
                    </div>
              <?php } ?>
                <div class="table-responsive ml-3">
                  <table class="table">

                    <thead class="text-primary">  
                      <th>#</th>                
                      <th>Customer Name</th>
                      <th>Customer Location Name</th>
                      <th>Order Number</th>
                      <th>Order Date</th>
                      <th>Quantity</th>
                      <th>Grade</th>
                      <th>Rate</th>
                      <th>Action</th>
                    </thead>
                     <tbody>
                      <?php
                        $i=1;
                        foreach ($order_list as $order_list_data)
                        {  						
						          ?>
						  <tr>    
                <td><?php echo $i++; ?></td>   
                <?php
                  $customer_list = \App\Customer::where('id',$order_list_data->customer_id)->get();
                  foreach($customer_list as $customer_list_data)
                  {
                ?>        
							  <td><?php echo $customer_list_data->customer_name; ?></td>
              <?php } ?>
              <?php
                  $customer_location_list = \App\CustomerLocation::where('id',$order_list_data->customer_location_id)->get();
                  foreach($customer_location_list as $customer_location_list_data)
                  {
                ?>   
							  <td><?php echo $customer_location_list_data->location_name; ?></td>
              <?php } ?>
                <td><?php echo $order_list_data->order_number; ?></td>
                <td><?php echo $order_list_data->order_date; ?></td>
                <td><?php echo $order_list_data->quantity; ?></td>
                <td><?php echo $order_list_data->grade; ?></td>
							  <td><?php echo $order_list_data->rate; ?></td>
                <td>
                  <a href="delete-order/{{$order_list_data->id}}" onclick="return confirm('Are you sure you want to delete this item??')">Delete</a>
                  <a href="edit-order/{{$order_list_data->id}}">Update</a>
                </td>
						  </tr>                 
                    <?php
                      }
                    ?>

                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>
</div> 



@endsection

