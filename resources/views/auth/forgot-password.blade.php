@extends('auth.layouts.app')
@section('title','اعادة تعيين كلمة المرور')
@section('content')
<div class="auth-full-page-content d-flex p-sm-5 p-4">
    <div class="w-100">
        <div class="d-flex flex-column h-100">
            <div class="mb-4 mb-md-5 text-center">
                <a href="/" class="d-block auth-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="80">
                </a>
            </div>
            <div class="auth-content my-auto">
                <div class="text-center">
                    <h5 class="mb-0">إعادة تعيين كلمة المرور
                    </h5>
                    <p class="text-muted mt-2"> أدخل رقم هاتفك وسيتم إرسال الرمز إليك!</p>
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
                <form class="mt-4" action="{{ route('beneficiary.password.phone') }}" method="post">
                    @csrf
                    <div class="form-floating form-floating-custom mb-4">
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="input-email"
                            placeholder="Enter Email" value="{{ old('phone') }}" required>
                        <label for="input-email">رقم الهاتف</label>
                        <div class="form-floating-icon">
                            <i data-feather="phone"></i>
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <button class="btn btn-primary w-100 waves-effect waves-light"
                            type="submit">ارسال الرمز
                        </button>
                    </div>
                </form>

                <div class="mt-5 text-center">
                    <p class="text-muted mb-0">تذكرت ? <a href="{{ route('login') }}"
                            class="text-primary fw-semibold">تسجيل دخول  </a> </p>
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
