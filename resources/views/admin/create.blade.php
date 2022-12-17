@extends('layouts.master')
@section('title','Subject')
@section('content')
<div class="container-fluid px-4">
  
  <div class="row">

  </div>
  <div class="card mt-4">
    <div class="card-header">
    <h4 class="">Add-Subject</h4>

    </div>
    <div class="card-body">
           @if ($errors->any())
                <div class="alert alert-danger" >
               @foreach ($errors->all() as $error)

                 <div>{{ $error }} </div>   
               @endforeach 
            @endif
          <form action="{{ url('admin/add-subject') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="mb-3">
                <label for="">Subject Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" id="mySummernote"  rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for=""></label>
                <input type="file" name="image" class="form-control">
            </div>

            <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description"  rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword"  rows="3" class="form-control"></textarea>
            </div>
            
            <h6>Status Mode</h6>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="">Navbar Status</label>
                <input type="checkbox" name="navbar_status" >
               </div>
              <div class=" col-md-3 mb-3">
                <label >Status</label>
                <input type="checkbox" name="status">
               </div>
               <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Save Subject</button>
               </div>

            </div>
          </form>
    </div>

  </div>

</div>
@endsection