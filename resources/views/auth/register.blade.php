
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Modern Al-Hikmah Utan</title>
    <!-- CSS LINK -->
    <link rel="stylesheet" href="{{ asset('bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap.icon.min') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('layouts.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- JS LINK -->
    <script src="{{ asset('bootstrap.bundle.js') }}"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</head>
<body>
<section class="img-fluid" style="background-image: url({{ asset('cover_register.jpg') }}); background-size: cover;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-75">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('cover_register2.jpg') }}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-3 text-black">

                  <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="d-flex align-items-center mb-1 pb-1">
                      <span class="h1 fw-bold mb-0">
                      <a href="/">
                        <img class="img-fluid" src="{{ asset('logo2.png') }}" alt="">
                      </a>
                      </span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register for Admin Account</h5>
                    
                    <div class="form-outline mb-4">
                      <input type="name" id="name"  name="name" class="form-control form-control-lg" required autofocus autocomplete="name" />
                      <label class="form-label" for="name" :value="_('name')">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" id="email" name="email" class="form-control form-control-lg" required autocomplete="username" />
                      <label class="form-label" for="email" :value="_('email')">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="password" required autocomplete="new-password" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="password" :value="_('password')">Password</label>
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="password_confirmation" required autocomplete="new-password" id="password_confirmation" class="form-control form-control-lg" />
                      <label class="form-label" for="password_confirmation" :value="_('confirm password')">Password Confirmation</label>
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Register') }}</button>
                    </div>

                    <a class="small text-muted" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
