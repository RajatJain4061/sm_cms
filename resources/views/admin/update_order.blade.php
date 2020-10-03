@extends('layouts.master')


@section('title','Client Registration')



@section('content')

<style type="text/css">
    * {
  box-sizing: border-box;
}

input[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 0px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  
  padding: 20px;
  
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
  </style>
                   
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

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><strong>Update Order</strong></h4>
              </div>
              <div class="card-body">
                <div class="container">
            <form action="{{ url('update-order') }}" method="POST">
              {{csrf_field()}}          
              <div class="row">
                <div class="col-25">
                  <label for="lname">Customer Name:</label>
                </div>
                <input type="hidden" name="id" value="{{ $edit_order->id }}">
                <div class="col-75">
                  <select class="form-control" name="customer_id" id="customer_id" value="{{ $edit_order->customer_id }}" required>
                    <option value="">--Select Customer--</option>
                    <?php 
                      foreach($customer_list as $customer_data)
                      {
                    ?>
                    <option value="<?php echo $customer_data->id; ?>" <?php if($edit_order->customer_id==$customer_data->id){ echo 'selected = "selected" '; } ?>><?php echo $customer_data->customer_name; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Customer Location :</label>
                </div>
                <div class="col-75">
                  <select class="form-control" id="customer_location_id" name="customer_location_id" value="{{ $edit_order->customer_location_id }}" required>
                    <option value="">--Select Customer Location--</option>
                   
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Order Number:</label>
                </div>
                <div class="col-75">
                  <input type="text" class="form-control" value="{{$edit_order->order_number}}"  placeholder="Order Number" name="order_number" required>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Order Date:</label>
                </div>
                <div class="col-75">
                  <input type="text" class="form-control" id="order_date" value="{{$edit_order->order_date}}" placeholder="Order Date" name="order_date" required>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Quantity:</label>
                </div>
                <div class="col-75">
                  <input type="text" class="form-control" value="{{$edit_order->quantity}}" placeholder="Quantity" name="quantity" required>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Grade:</label>
                </div>
                <div class="col-75">
                  <input type="text" class="form-control" value="{{$edit_order->grade}}" placeholder="Grade" name="grade" required>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Rate:</label>
                </div>
                <div class="col-75">
                  <input type="text" class="form-control" value="{{$edit_order->rate}}"  placeholder="Rate" name="rate" required>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Remarks:</label>
                </div>
                <div class="col-75">
                  <textarea rows="4" class="form-control" value="{{$edit_order->remarks}}" name="remarks"></textarea>
                </div>
              </div>
              <div class="row">
                <input type="submit"  value="Submit" id="formSubmit">
              </div>
            </form>
              </div>
              </div>
               </div>
            </div>

          
              </div>
            </div>


  <script src="{{url('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
  
      
<script type="text/javascript">
  
  $('#customer_id').change(function(){
        var customer_id = $(this).val();
        if(customer_id)
        {
          $.ajax({
             type:"get",
             url:"{{url('order/get_update_customer_id/')}}"+customer_id,
             success:function(res)
             {       
                  if(res)
                  {
                      jQuery("#customer_location_id").html(res);
                  }
             }
            });
        }
    });
</script>
@endsection

