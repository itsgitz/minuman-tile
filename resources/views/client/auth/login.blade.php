@extends ('layouts.auth')
@section ('title', 'Masuk ke aplikasi untuk melanjutkan pesananmu')

@section ('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="py-4"></div>
            <div class="py-3">
                <h1 class="text-secondary">
                    Login
                </h1>
                <span class="text-secondary">Masuk dulu ke aplikasi untuk melanjutkan pesananmu</span>
            </div>
            <div class="py-3"></div>

            <div class="border rounded py-5 px-3">
                <div class="d-flex justify-content-center">
                    <a class="btn text-primary" href="{{ route('client_home') }}">
                        <h3>
                            <img class="img-fluid" src="{{ mix ('img/logo_2x2.png') }}" alt="Konan Thai Tea - Logo" width="150">
                        </h3>
                    </a>
                </div>
                <div class="py-4"></div>

                <form action="{{ route('client_login_post') }}" method="post">
                     @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text text-secondary bg-white">@</span>
                        <input name="email" id="client-email" class="form-control" type="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
                        @error ('email')
                        <div class="input-group">
                            <span class="text-danger fw-light"><small>{{ $message }}</small></span>
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-secondary bg-white"><i class="fas fa-lock"></i></span>
                        <input name="password" id="client-password" class="form-control" type="password" placeholder="Password" required>
                        @error ('password')
                        <div class="input-group">
                            <span class="text-danger fw-light"><small>{{ $message }}</small></span>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input id="client-login-submit" class="form-control btn btn-primary" type="submit" value="Masuk">
                    </div>

                    <div class="py-3">
                        Belum memiliki akun? <a href="{{ route('client_register_get') }}">Daftar sekarang!</a>
                    </div>
              </form>
          </div>
    </div>
@endsection
