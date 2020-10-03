@extends('layouts.master')
@section('title','Customer List')
@section('content')




<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><strong>Customer List</strong>
                </h4>
                <div style="float: right">
                  <a href="{{ url('customer') }}">Add Customer</a>
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
                      <th>Customer Code</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </thead>
                     <tbody>
                      <?php
                        $i=1;
                        foreach ($customer_list as $customer_data)
                        {  						
						          ?>
						  <tr>    
                <td><?php echo $i++; ?></td>                
							  <td><?php echo $customer_data->customer_name; ?></td>
							  <td><?php echo $customer_data->customer_code; ?></td>
							  <td><?php echo $customer_data->created_at; ?></td>
                <td>
                  <a href="delete-customer/{{$customer_data->id}}" onclick="return confirm('Are you sure you want to delete this item??')">Delete</a>
                  <a href="edit-customer/{{$customer_data->id}}">Update</a>
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

