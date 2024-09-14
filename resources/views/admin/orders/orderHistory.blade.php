@extends('admin.master')

@section('admintitle')
    Order History
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
         <i class="icon ion-ios-list-outline"></i>
         <div>
           <h4>Order History</h4>
           <p class="mg-b-0">View and manage all past orders.</p>
         </div>
       </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Order History</h6>
            <p class="br-section-text">Manage and review the history of all orders.</p>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('admin.orders.history') }}" class="mb-4">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Name" value="{{ request()->get('search') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <select name="status" class="form-control">
                            <option value="">All Statuses</option>
                            <option value="Pending" {{ request()->get('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Order Confirmed" {{ request()->get('status') == 'Order Confirmed' ? 'selected' : '' }}>Order Confirmed</option>
                            <option value="Shipped" {{ request()->get('status') == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="Canceled" {{ request()->get('status') == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                            <option value="Delivered" {{ request()->get('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>

            <!-- Orders Table -->
            <div class="bd bd-gray-300 rounded table-responsive">
              <table class="table mg-b-0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>${{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.details', $order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Pagination Links -->
              <div class="pagination-wrapper mt-3">
                {{ $orders->appends(request()->query())->links() }}
              </div>
            </div>
        </div>
       </div><!-- br-pagebody -->

       <!-- Include Footer -->
       @include('admin.layout.footer')
     </div><!-- br-mainpanel -->
@endsection
