@extends('layouts.master')
@section('title','Subject')
@section('content')
<div class="container-fluid px-4">
  
  <div class="row">

  </div>
  <div class="card mt-4">
    <div class="card-header">
    <h4 class="">Edit-Subject</h4>

    </div>
    <div class="card-body">
       @if ($errors->any())
        <div class="alert alert-danger" >
            @foreach ($errors->all() as $error)
               <div>{{ $error }} </div>    
           @endforeach 
       
        @endif
          <form action="{{ url('admin/update-subject/'.$subject->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="mb-3">
                <label for="">Subject Name</label>
                <input type="text" name="name" value="{{ $subject->name }}"  class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" value="{{ $subject->slug }}"  class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description"  id="mySummernote" rows="3" class="form-control">{{ $subject->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for=""></label>
                <input type="file" name="image" class="form-control">
            </div>

            <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" value="{{ $subject->meta_title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description"  rows="3" class="form-control">{{ $subject->meta_description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword"  rows="3" class="form-control">{{ $subject->meta_keyword }}</textarea>
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
                <button type="submit" class="btn btn-primary">Update Subject</button>
               </div>

            </div>
          </form>
    </div>

  </div>

</div>
@endsection