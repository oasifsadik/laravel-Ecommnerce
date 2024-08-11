@extends('admin.master')
@section('admintitle')
    Orders
@endsection

@section('dashboardContent')
     <!-- ########## START: LEFT PANEL ########## -->
     @include('admin.layout.slidebar')
     <!-- br-sideleft -->
     <!-- ########## END: LEFT PANEL ########## -->

     <!-- ########## START: HEAD PANEL ########## -->
         @include('admin.layout.navbar')
     <!-- br-header -->
     <!-- ########## END: HEAD PANEL ########## -->

     <!-- ########## START: RIGHT PANEL ########## -->
     @include('admin.layout.rightbar')
     <!-- br-sideright -->
     <!-- ########## END: RIGHT PANEL ########## --->

     <!-- ########## START: MAIN PANEL ########## -->
     <div class="br-mainpanel">
       <div class="br-pagetitle">
         <i class="icon ion-ios-photos-outline"></i>
         <div>
           <h4>Orders</h4>
           <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
         </div>
       </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Order Table</h6>
            <p class="br-section-text">Using the most basic table markup.</p>

            <div class="bd bd-gray-300 rounded table-responsive">
              <table class="table mg-b-0">
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $id = 1;
                    @endphp
                  @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{ $id++ }}</th>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->state_county }}</td>
                    <td>{{ $order->postcode }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->street_address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        <a href="{{ route('admin.orders.details', $order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            <div class="mt-1 float-right">
                {{ $orders->links() }}
            </div>
        </div>
       </div><!-- br-pagebody -->
       @include('admin.layout.footer')
     </div>
@endsection
