@extends('auth.layouts.app')
@section('title','تسجيل الدخول')
@section('content')
<div class="auth-full-page-content d-flex p-sm-5 p-4">
    <div class="w-100">
        <div class="d-flex flex-column h-100">
            <div class="mb-4 mb-md-5 text-center">
                <a href="index.html" class="d-block auth-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="80">
                </a>
            </div>
            <div class="auth-content my-auto">
                <div class="text-center">
                    <h5 class="mb-0">مرحباً بك</h5>
                    <p class="text-muted mt-2">قم بتسجيل الدخول للمتابعة إلى المنصة.
                    </p>
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
                <form class="mt-4 pt-2" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating form-floating-custom mb-4">
                        <input type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="input-username" placeholder="ادخل رقم هاتفك"
                            value="{{ old('phone') }}" required>
                        <label for="input-username">رقم الهاتف</label>
                        <div class="form-floating-icon">
                            <i data-feather="users"></i>
                        </div>
                    </div>

                    <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                        <input type="password" name="password"
                            class="form-control pe-5 @error('password') is-invalid @enderror"
                            id="password-input" placeholder="ادخل كلمة السر" required>

                        <button type="button"
                            class="btn btn-link position-absolute h-100 end-0 top-0"
                            id="password-addon">
                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                        </button>
                        <label for="input-password">كلمة السر</label>
                        <div class="form-floating-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-check font-size-15">
                                <input class="form-check-input" type="checkbox" id="remember-check"
                                    name="remember">
                                <label class="form-check-label font-size-13" for="remember-check">
                                    تذكرني
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100 waves-effect waves-light"
                            type="submit">تسجيل دخول</button>
                    </div>
                </form>
                <div class="mt-5 text-center">
                    <p class="text-muted mb-0">ليس لديك حساب ؟ <a href="{{ route('register') }}"
                            class="text-primary fw-semibold"> تسجيل جديد </a> </p>
                </div>
                <div class="mt-2 text-center">
                    <p class="text-muted mb-0">هل نسيت كلمة المرور ؟<a
                            href="{{ route('password.request') }}"
                            class="text-primary fw-semibold"> استعادة كلمة المرور</a> </p>
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
