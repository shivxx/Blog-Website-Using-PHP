@extends('layouts.master')
@section('title','View Post')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
    <!-- @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif -->
        <div class="card-header">
            <h4>View posts
                <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
            </h4>
        </div>
        <div class="card-body">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject Name</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                   @foreach ($posts as $item)
                     <tbody>
                       <tr>
                           <td>{{ $item->id}}</td>
                           <td>{{ $item->subject->name}}</td>
                           <td>{{ $item->name}}</td>
                           <td>{{ $item->status == '1' ? 'Hidden':'Visible' }}</td>
                           <td>
                            <a href="{{ url('admin/post/'.$item->id)  }}" class="btn btn-success">Edit</a>
                           </td>
                           <td>
                            <a href="{{ url('admin/delete-post/'.$item->id)  }}" class="btn btn-danger">Delete</a>
                           </td>
                        </tr>
                       </tbody>
                    @endforeach   
            </table>
        </div>
    </div>
</div>
@endsection