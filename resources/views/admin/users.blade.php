@extends('admin.layouts.app')

@section('content')
<div id="wrapper">

   @include('admin.layouts.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Users</a>
          </li>
          
        </ol>

       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Users list</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                   
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     
    </div>
    <!-- /.content-wrapper -->

  </div>
  @endsection