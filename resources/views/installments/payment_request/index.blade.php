@extends('layouts.app')
@section('title', 'طلبات دفع الاقساط')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">طلبات دفع الاقساط</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">الرئيسية</a></li>
                                <li class="breadcrumb-item active"> طلبات دفع الاقساط</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">طلبات دفع الاقساط </h4>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> إنشاء طلب
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>رقم القسط</th>
                                            <th>قيمة القسط</th>
                                            <th>الملف</th>
                                            <th>تاريخ الدفع</th>
                                            <th>حالة الطلب</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>خياراتي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($payment_requests->count() != 0)
                                            @foreach ($payment_requests as $key => $payment_request)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $payment_request->installment_id }}</td>
                                                    <td>{{ $payment_request->installment->deserved_amount }}</td>
                                                    <td>
                                                        <a href="{{ asset('storage/' . $payment_request->file) }}">
                                                            تحميل
                                                        </a>

                                                    </td>
                                                    <td>{{ $payment_request->installment->date_payment_installment }}</td>
                                                    <td>
                                                        @if ($payment_request->is_approved == 1)
                                                            <span class="badge rounded-pill bg-info"
                                                                style="font-size: 12px; font-weight:600">في انتظار
                                                                التأكيد</span>
                                                        @elseif($payment_request->is_approved == 2)
                                                            <span class="badge rounded-pill bg-info"
                                                                style="font-size: 12px; font-weight:600">
                                                                تم التأكيد</span>
                                                        @elseif($payment_request->is_approved == 3)
                                                            <span class="badge rounded-pill bg-primary"
                                                                style="font-size: 12px; font-weight:600">
                                                                رفض الطلب</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $payment_request->created_at->format('Y-m-d') }}
                                                    </td>
                                                    <td>
                                                        <button href="/loans/{{ $payment_request->id }}" class="btn btn-danger"
                                                            onclick="if(confirm('هل أنت متأكد ؟')){document.getElementById('delete-photo_{{ $payment_request->id }}').submit();}else{
                                                            event.preventDefault();}"><i
                                                                class="fa fa-trash"></i></button>
                                                        <form id="delete-photo_{{ $payment_request->id }}"
                                                            action="/payment-installment-request/{{ $payment_request->id }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9">لا توجد لديك طلبات دفع </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إنشاء طلب دفع</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/payment-installment-request" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">القسط</label>
                            <select name="installment_id" class="form-select @error('installment_id') is-invalid @enderror"
                                required>
                                <option value="">إختار</option>
                                @foreach ($installments as $installment)
                                    <option value="{{ $installment->id }}"@selected($installment->id == old('installment_id'))>
                                        {{ $installment->payment_receipt_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ايصال الدفع</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">ارسال الطلب</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
