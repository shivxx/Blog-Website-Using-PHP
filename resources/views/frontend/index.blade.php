@extends('layouts.app')

@section('title','Blog Website')
@section('meta_description','Blog Website')
@section('meta_keyword','Blog Website')
@section('content')

<div class="bg py-4 px-2">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel subject-carousel owl-theme">
                @foreach ($all_subjects as $all_sub_item)
             
              <div class="item">
                <a href="{{ url('article/'.$all_sub_item->slug) }}" class="text-decoration-none">
                    <div class="card">
                        <img src="{{ asset('uploads/subject/'.$all_sub_item->image) }}" class="subject-img" alt="Image">
                        <div class="card-body text-center">
                            <h4>{{ $all_sub_item->name }}</h4>
                        </div>
                    </div>
                </a>
                     
              </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise here</h3>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Blog</h4>
                <div class="underline"></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptatibus recusandae aliquid a dolore saepe fugit adipisci ipsa! Numquam eos corporis praesentium accusantium, molestiae nostrum modi nam voluptatum doloremque. Obcaecati reprehenderit ut fugiat alias voluptate, exercitationem mollitia, facilis veniam delectus itaque nulla cupiditate suscipit corporis praesentium consectetur. Unde, optio voluptates!</p>
            </div>
        </div>
    </div>
</div>

@endsection