@extends('auth.layouts.app')
@section('title','تسجيل جديد')
@section('content')
<div class="auth-full-page-content d-flex p-sm-5 p-4">
    <div class="w-100">
        <div class="d-flex flex-column h-100">
            <div class="mb-4 mb-md-5 text-center">
                <a href="index.html" class="d-block auth-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="80">
                    {{-- <span class="logo-txt">Dason</span> --}}
                </a>
            </div>
            <div class="auth-content my-auto">
                <div class="text-center">
                    <h5 class="mb-0">تسجيل حساب جديد</h5>
                    <p class="text-muted mt-2">تأكد من ادخال بياناتك صحيحة</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="needs-validation mt-4 pt-2" novalidate method="POST"
                    action="{{ route('register') }}">
                    @csrf
                    <div class="form-floating form-floating-custom mb-4">
                        <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="input-username" placeholder="Enter User Name" required
                            name="name" value="{{ old('name') }}" required>
                        <label for="input-username">اسم الكامل</label>
                        <div class="form-floating-icon">
                            <i data-feather="users"></i>
                        </div>
                    </div>

                    <div class="form-floating form-floating-custom mb-4">
                        <input type="number"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="input-email" placeholder="ادخل رقم هاتفك" required name="phone"
                            value="{{ old('phone') }}" required>
                        <label for="input-email">رقم الهاتف</label>
                        <div class="form-floating-icon">
                            <i data-feather="phone"></i>
                        </div>
                    </div>

                    <div class="form-floating form-floating-custom mb-4">
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="input-password" placeholder="Enter Password" required
                            name="password" required>

                        <label for="input-password"> كلمة السر</label>
                        <div class="form-floating-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="mb-0">بضغطك تسجيل الان فإنك توافق علي <a href="#"
                                class="text-primary">شروط الاستخدام</a></p>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100 waves-effect waves-light"
                            type="submit">تسجيل</button>
                    </div>
                </form>

                <div class="mt-5 text-center">
                    <p class="text-muted mb-0">لديك حساب بالفعل ؟<a href="{{ route('login') }}"
                            class="text-primary fw-semibold"> تسجيل دخول </a> </p>
                </div>
            </div>
            <div class="mt-4 mt-md-5 text-center">
                <p class="mb-0">©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Tjoint . Powered <i
                        class="mdi mdi-heart text-danger"></i> by Tjoint
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
