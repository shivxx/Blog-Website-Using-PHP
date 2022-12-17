@extends('layouts.master')
@section('title','Edit Post')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Posts
                <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body mt-4">
              @if ($errors->any())
                 <div class="alert alert-danger" >
                  @foreach ($errors->all() as $error)
                     <div>{{ $error }} </div>    
                  @endforeach 
               @endif
            <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                   <label for="subject_id">Subject</label>
                   <select name="subject_id" class="form-control">
                    <option value="">--Select Subject--</option>
                         @foreach ($subject as $subitem)
                        <option value="{{ $subitem->id }}" {{ $post->subject_id == $subitem->id ? 'selected':'' }} > {{ $subitem->name }} </option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{ $post->name}}"  class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug}}" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote"   rows="3" value="{!! $post->description !!}" class="form-control" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe"  value="{{ $post->yt_iframe}}" class="form-control"/>
                </div>
                <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" value="{{ $post->meta_title}}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description"  rows="3" value="{!! $post->meta_description !!}" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword"  rows="3" value="{!! $post->meta_keywords !!}" class="form-control" ></textarea>
            </div>
            <h6>Status Mode</h6>
           
            <div class=" col-md-3 mb-3">
                <label >Status</label>
                <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked':'' }}/>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection