@extends('admin.master')
@section('admintitle')
    Category Show
@endsection
@section('dashboardContent')
     @include('admin.layout.slidebar')
         @include('admin.layout.navbar')
     @include('admin.layout.rightbar')
     <div class="br-mainpanel">
        <div class="br-pagetitle d-flex justify-content-between align-items-center">
            <i class="icon ion-ios-folder-outline"></i>
            <div>
                <h4>Show Category</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>


       <div class="br-pagebody">
        <div class="br-section-wrapper">
          <div class="table-wrapper">
            <table id="" class="table display responsive nowrap">
              <thead>
                <tr class="table-hover">
                  <th class="">Category name</th>
                  <th class="">:</th>
                  <th class="">{{ $category->category_name }}</th>
                </tr>
                <tr class="table-hover">
                  <th class="">Category Description</th>
                  <th class="">:</th>
                  <th class="">{{ $category->category_description }}</th>
                </tr>
              </thead>
            </table>
          </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
      </div>
       @include('admin.layout.footer')
     </div>

@endsection
