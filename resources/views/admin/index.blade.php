@extends('layouts.master')
@section('title','Subject')
@section('content')
<div class="container-fluid px-4">
   <div class="card">
     <div class="card-header mt-4">
       <h4>View Subject <a href="{{ url('admin/add-subject') }}" class="btn btn-primary btn-sm float-end">Add Subject</a></h4>

     </div>
      <div class="card-body">
      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif
        <table id="myDataTable" class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Subject Nmae</th>
              <th>Image</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
          
            </tr>
          </thead>
           <tbody>
            
           @foreach ($subject as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                  <img src="{{ asset('uploads/subject/'.$item->image) }}" width="50px" height="50px" alt="">
                </td>
                <td>{{ $item->status== '1' ? 'Hidden':'Shown'}}</td>
                <td>
                  <a href="{{ url('admin/edit-subject/'.$item->id) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                <a href="{{ url('admin/delete-subject/'.$item->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach  
          
           </tbody>
        </table>
      </div>
   </div>

  

 

</div>
@endsection