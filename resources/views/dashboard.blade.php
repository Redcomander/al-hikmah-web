@extends('layouts.nav-bootstrap')

@section('content')

<div class="row justify-content-evenly">
    <div class="col-5">
        <h1 class="display-2">Dashboard Admin</h1>
        <p class="lead">Hi {{ Auth::user()->name }},Welcome to Dashboard</p>
        <figure>
            <blockquote class="blockquote text-success">
              <p>Tahapan pertama dalam mencari ilmu adalah mendengarkan, kemudian diam dan menyimak dengan penuh perhatian, lalu menjaganya, lalu mengamalkannya dan kemudian menyebarkannya</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Sufyan bin Uyainah
            </figcaption>
          </figure>
          <a href="{{ url('/article') }}" class="btn btn-dark gradasi border-0"><i class="bi-bar-chart"></i>Add Article</a>
    </div>
    <div class="col-4">
        <img src="{{ asset('dashboard.jpg') }}" class="img-fluid" alt="">
    </div>
</div>

@endsection
