@extends('layouts.app')
@section('title', 'الاقساط')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">الاقساط</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">الرئيسية</a></li>
                                <li class="breadcrumb-item active"> الاقساط</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                @if ($installments->count() != 0)
                    <div class="col-xl-5 col-md-6 col-12">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body" style="border-style: dotted;">
                                <div class="row">
                                    <div class="col-6" style="font-weight: 700">تاريخ القسط القادم :
                                        {{ \Carbon\Carbon::parse($upcoming_installment->date_payment_installment)->format('Y-m-d')}}</div>
                                    <div class="col-6" style="font-weight: 700">قيمة القسط :
                                        {{ round($upcoming_installment->deserved_amount,1) }} ج.س</div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                    @endif
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">الاقساط </h4>
                                @if ($installments->count() != 0)
                                <a href="/payment-installment-request" class="btn btn-primary">طلبات دفع الاقساط</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>رقم القسط</th>
                                                <th>رقم القرض</th>
                                                <th>المؤسسة</th>
                                                <th>المبلغ المستحق</th>
                                                <th>تاريخ دفع القسط</th>
                                                <th>حالة القسط</th>
                                                <th>المبلغ المدفوع</th>
                                                <th>طريقة الدفع</th>
                                                <th>تاريخ الدفع</th>
                                                <th>الملف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($installments->count() != 0)
                                                @foreach ($installments as $key => $installment)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $installment->payment_receipt_number }}</td>
                                                        <td>{{ $installment->loan->id }}</td>
                                                        <td>{{ $installment->mfis->name_ar }}</td>
                                                        <td>{{ $installment->deserved_amount }}</td>
                                                        <td>{{ $installment->date_payment_installment }}</td>
                                                        <td>
                                                            @if ($installment->status_id == 1)
                                                                <span class="badge rounded-pill bg-info"
                                                                    style="font-size: 12px; font-weight:600">{{ $installment->ins_status->status_desc }}</span>
                                                            @elseif($installment->status_id == 2)
                                                                <span class="badge rounded-pill bg-success"
                                                                    style="font-size: 12px; font-weight:600">{{ $installment->ins_status->status_desc }}</span>
                                                            @elseif($installment->status_id == 3)
                                                                <span class="badge rounded-pill bg-warning"
                                                                    style="font-size: 12px; font-weight:600">{{ $installment->ins_status->status_desc }}</span>
                                                            @elseif($installment->status_id == 4)
                                                                <span class="badge rounded-pill bg-danger"
                                                                    style="font-size: 12px; font-weight:600">{{ $installment->ins_status->status_desc }}</span>
                                                            @elseif($installment->status_id == 5)
                                                                <span class="badge rounded-pill bg-secondary"
                                                                    style="font-size: 12px; font-weight:600">{{ $installment->ins_status->status_desc }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($installment->amount_paid != null)
                                                                {{ $installment->amount_paid }}
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($installment->payment_type != null)
                                                                @if ($installment->payment_type == 'cash')
                                                                    <span class="badge badge-danger">كاش</span>
                                                                @elseif($installment->payment_type == 'e-payment')
                                                                    <span class="badge badge-success">دفع الكتروني</span>
                                                                @endif
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($installment->date_amount_paid != null)
                                                                {{ $installment->date_amount_paid }}
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($installment->receipt_file != null)
                                                                @php($receipt_file = Str::substr($installment->receipt_file, 7))
                                                                <a href="{{ asset('storage/' . $receipt_file) }}"
                                                                    class="btn btn-primary" download> <i
                                                                        class="fa fa-download"></i>
                                                                </a>
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9">لا توجد لديك أقساط</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $installments->links() }}
                                </div>


                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
            </div>
        </div>

    @endsection
