@extends('auth.layouts.app')
@section('title','التحقق من رقم الهاتف')
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
                            <i class="bx bxs-phone h2 mb-0 text-primary"></i>
                        </div>
                    </div>
                    <div class="p-2 mt-4">

                        <h4>التحقق من رقم الهاتف</h4>
                        <p class="mb-5">الرجاء إدخال الرمز المكون من 4 أرقام المرسل إليك <span class="fw-bold">{{ $phone }}</span></p>

                        <form action="index.html">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="digit1-input" class="visually-hidden">الرقم 1</label>
                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 2)" maxlength="1" id="digit1-input">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="digit2-input" class="visually-hidden">الرقم 2</label>
                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 3)" maxlength="1" id="digit2-input">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="digit3-input" class="visually-hidden">الرقم 3</label>
                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit3-input">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="digit4-input" class="visually-hidden">الرقم 4</label>
                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit4-input">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">تأكيد</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p class="text-muted mb-0">لم تتلق رمزا? <a href="#"
                        class="text-primary fw-semibold"> إعادة ارسال </a> </p>
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
