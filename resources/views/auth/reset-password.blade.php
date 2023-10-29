@extends('auth.layouts.app')
@section('title','اعادة تعيين كلمة المرور')
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
                <div class="text-center mb-2">
                    <h5 class="mb-0">اعادة تعيين كلمة السر</h5>
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
                    action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="hidden" name="phone" value="{{ $phone }}">

                    <div class="form-floating form-floating-custom mb-4">
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="input-password" placeholder="Enter Password" required
                            name="password">
                        <label for="input-password"> كلمة السر الجديدة</label>
                        <div class="form-floating-icon">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-floating form-floating-custom mb-4">
                        <input type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="input-password" placeholder="Enter Password" required
                            name="password_confirmation">

                        <label for="input-password">تأكيد كلمة السر الجديدة</label>
                        <div class="form-floating-icon">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary w-100 waves-effect waves-light"
                            type="submit">اعادة تعيين</button>
                    </div>
                </form>
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
