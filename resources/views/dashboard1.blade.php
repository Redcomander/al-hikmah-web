@extends('layouts.bootstrap5')
@section('content')
    <div class="row justify-content-evenly">
        <div class="col-5">
            <h1 class="display-2">Dashboard Admin</h1>
            <p class="lead">Hi {{ Auth::user()->name }},Welcome to Dashboard</p>
            <figure>
                <blockquote class="blockquote text-success">
                  <p>First step in your Life is more Important than Millions of your Dreams.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  M Yazid Ar-Rosyadi
                </figcaption>
              </figure>
              <a href="" class="btn btn-dark gradasi border-0"><i class="bi-bar-chart"></i>Add Article</a>
        </div>
        <div class="col-4">
            <img src="{{ asset('dashboard.jpg') }}" class="img-fluid" alt="">
        </div>
    </div>
@endsection
