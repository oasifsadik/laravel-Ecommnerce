@extends('admin.master')
@section('admintitle')
    Confirm Orders List
@endsection

@section('dashboardContent')
     <!-- ########## START: LEFT PANEL ########## -->
     @include('admin.layout.slidebar')
     <!-- ########## END: LEFT PANEL ########## -->

     <!-- ########## START: HEAD PANEL ########## -->
         @include('admin.layout.navbar')
     <!-- ########## END: HEAD PANEL ########## -->

     <!-- ########## START: RIGHT PANEL ########## -->
     @include('admin.layout.rightbar')
     <!-- ########## END: RIGHT PANEL ########## -->

     <!-- ########## START: MAIN PANEL ########## -->
     <div class="br-mainpanel">
       <div class="br-pagetitle">
         <i class="icon ion-ios-photos-outline"></i>
         <div>
           <h4>Confirm Orders List</h4>
           <p class="mg-b-0">Manage orders and their statuses.</p>
         </div>
       </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Confirm Orders List</h6>
            <p class="br-section-text">Using the most basic table markup.</p>

            <!-- Filter Buttons for Order Status -->
            {{-- <div class="d-flex justify-content-center mb-4">
                <div class="btn-group w-100" role="group" aria-label="Order Status Filter">
                    <a href="{{ route('admin.order.confirm.filter','Order Confirmed') }}" class="btn btn-outline-primary w-50">Confirm List</a>
                    <a href="{{ route('admin.order.confirm.filter','Shipped') }}" class="btn btn-outline-success w-50">Shipping</a>
                </div>
            </div> --}}

            <!-- Orders Table -->
            <div class="bd bd-gray-300 rounded table-responsive">
              <table class="table mg-b-0" id="confirmtable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Post Code</th>
                    <th>Address</th>
                    <th>Street Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($confirmList as $order)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->state_county }}</td>
                    <td>{{ $order->postcode }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->street_address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="Canceled" {{ $order->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                                    <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.details', $order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
       </div><!-- br-pagebody -->

       <!-- Include Footer -->
       @include('admin.layout.footer')
     </div><!-- br-mainpanel -->
@endsection
