<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplication Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <section class="vh-100">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6 text-black">

            <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-3 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold">Fly Gallery</span>
            </div>

            <!-- BERHASIL -->
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <!-- GAGAL -->
            @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4  pt-3 pt-xl-0 mt-xl-n5">
              
            <form method="POST" action="{{ route('login') }}" style="width: 23rem;">
               @csrf
                <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h4>
                {{--EMAIL --}}
                    <div class="form-outline mb-2">
                        <input-label class="form-label" for="email" :value="__('Email')">Email address</input-label>
                        <input  class="form-control form-control-lg" type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                {{-- PASSWORD --}}
                <div class="form-outline mb-4">
                    <input-label class="form-label" for="password" :value="__('Password')">Password</input-label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- <div class="pt-1 mb-4 text-center">
                  <button class="btn btn-info btn-lg btn-block text-white" type="submit">Login</button>
                </div> --}}

                <div class="text-center">
                  <x-primary-button class="btn btn-info btn-lg btn-block text-white ">
                    {{ __('Log in') }}
                  </x-primary-button>
                </div>

                <div class=" text-center mt-4">
                    @if (Route::has('password.request'))
                        <a class=" link-info underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
        
                </div>

                <!-- <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p> -->
                <div class="text-center">
                    <p>Don't have an account? <a href="/register" class="link-info">Register here</a></p>
                </div>

            </form>

            </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="https://i.pinimg.com/564x/3d/9b/c1/3d9bc1270c3cd4005c6b03c8d9c124e1.jpg"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>