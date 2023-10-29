@extends('auth.layouts.app')
@section('title','تم ارسال اللينك')
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
                    <div class="avatar-lg mx-auto">
                        <div class="avatar-title rounded-circle bg-light">
                            <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
                        </div>
                    </div>
                    <div class="p-2 mt-4">
                        <h4>التحقق من رقم الهاتف</h4>
                        <p>تم ارسال رابط التحقق الى هاتفك  <span class="fw-bold">{{ $phone }}</span>, الرجاء التحقق منه </p>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p class="text-muted mb-0">لم تتلق الرمز ؟<a href="{{ route('password.request') }}"
                            class="text-primary fw-semibold"> اعادة ارسال </a> </p>
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
