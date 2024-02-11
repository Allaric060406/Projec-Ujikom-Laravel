<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css.register/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('register') }}" class="signup-form">
                        @csrf
                        <h2 class="form-title">Create account</h2>
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" /> 
                        </div>
                        <!--Username -->
                        <div class="form-group">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="form-input" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="Username" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <!--Alamat -->
                        <div class="form-group">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="form-input" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" placeholder="Addres" />
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-input"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" 
                                            placeholder="Password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- confirm Password -->
                        <div class="form-group">
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    
                                <x-text-input id="password_confirmation" class="form-input"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                    
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/> --}}
                            <x-primary-button class="form-submit">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="/login" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>