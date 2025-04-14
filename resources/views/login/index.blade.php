<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body,
        html {
            height: 100%;
        }

        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }

        .vh-100 {
            height: 100vh;
        }

        .h-custom-2 {
            height: 60%;
        }
    </style>
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="px-5 ms-xl-4">
                        <i class="fas fa-book fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0"></span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                     


                        <form method="POST" action="{{ route('login-Prosess') }}">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control form-control-lg" id="username"
                                    name="username" />
                                @error('username')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                    name="password" />
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember" class="form-check-label">Ingat aku!</label>
                                </div>
                                <div>
                                    <a href="#" class="text-decoration-none">Lupa Password?</a>
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button type="submit"
                                    class="btn btn-primary btn-lg btn-block w-100 mt-3">Login</button>
                            </div>

                            <div class="text-center">
                                <p>Tidak punya akun? <a href="{{ route('login.register') }}">Register</a></p>
                            </div>
                        </form>

                    </div>

                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" alt="Library image"
                        class="w-100 vh-100" style="object-fit: cover; object-position: center;">
                </div>
            </div>
        </div>
    </section>

    <!-- SweetAlert untuk notifikasi sukses -->
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Registrasi Berhasil!",
                text: "Silahkan login.",
                icon: "success",
                confirmButtonText: "OK"
            });
        </script>
    @endif

</body>

</html>
