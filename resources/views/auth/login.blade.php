
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
<section class="img-fluid" style="background-image: url({{ asset('cover_login.jpg') }}); background-size: cover;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-75">
        <div class="col col-xl-10">
          <div class="card" style="border-radius:1rem; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('cover_login1.jpg') }}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p- p-lg-3 text-black">

                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="d-flex align-items-top mb-1 pb-1">
                      <span class="h1 fw-bold mb-0">
                        <a href="/">
                            <img class="img-fluid" src="{{ asset('logo2.png') }}" alt="" style="border-radius: 1rem 0 0 1rem;">
                        </a>
                      </span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your Admin Account</h5>

                    <div class="form-outline mb-4">
                      <input type="email" id="email" name="email" class="form-control form-control-lg" required autocomplete="username" style="border: 1px solid #ccc; border-radius: 0.5rem; padding: 0.25rem;" />
                      <label class="form-label" for="email" :value="_('email')">Email</label>
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <div class="form-outline mb-4">
                      <input  type="password" name="password" required autocomplete="current-password" id="password" class="form-control form-control-lg" style="border: 1px solid #ccc; border-radius: 0.5rem; padding: 0.25rem;" />
                      <label  class="form-label" for="password" :value="_('password')">Password</label>
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                    <div class="block mt-4">
                      <div class="form-check">
                          <input id="remember_me" type="checkbox" class="form-check-input rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                          <label class="form-check-label text-gray-600 ml-2" for="remember_me">{{ __('Remember me') }}</label>
                      </div>
                  </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Log in') }}</button>
                    </div>

                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
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
