@extends('layouts.app')
@section('title', 'القروض')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">القروض</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">الرئيسية</a></li>
                                <li class="breadcrumb-item active"> القروض</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">القروض </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>رقم التمويل</th>
                                            <th>رقم الطلب</th>
                                            <th>المنتج</th>
                                            <th>الحالة</th>
                                            <th>قيمة القرض</th>
                                            <th>تاريخ التمويل</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>خياراتي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($loans->count() != 0)
                                            @foreach ($loans as $key => $loan)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $loan->loan_no }}</td>
                                                    <td>
                                                        <a href="/form-requests/{{ $loan->request->form_request_id }}">
                                                            {{ $loan->request->form_request_id }}
                                                        </a>

                                                    </td>
                                                    <td>{{ $loan->product->product_name }}</td>
                                                    <td>
                                                        @if ($loan->status_id == 1)
                                                        <span class="badge rounded-pill bg-info"
                                                            style="font-size: 12px; font-weight:600">{{ $loan->status->status_desc }}</span>
                                                    @elseif($loan->status_id == 2)
                                                        <span class="badge rounded-pill bg-info"
                                                            style="font-size: 12px; font-weight:600">
                                                            {{ $loan->status->status_desc }}</span>
                                                    @elseif($loan->status_id == 3)
                                                        <span class="badge rounded-pill bg-primary"
                                                            style="font-size: 12px; font-weight:600">
                                                            {{ $loan->status->status_desc }}</span>
                                                    @elseif($loan->status_id == 4)
                                                        <span class="badge rounded-pill bg-primary"
                                                            style="font-size: 12px; font-weight:600">{{ $loan->status->status_desc }}</span>
                                                    @elseif($loan->status_id == 5)
                                                        <span class="badge rounded-pill bg-success"
                                                            style="font-size: 12px; font-weight:600">{{ $loan->status->status_desc }}</span>
                                                    @elseif($loan->status_id == 6)
                                                        <span class="badge rounded-pill bg-danger"
                                                            style="font-size: 12px; font-weight:600">{{ $loan->status->status_desc }}</span>
                                                    @elseif($loan->status_id == 7)
                                                    <span class="badge rounded-pill bg-secondary" style="font-size: 12px; font-weight:600">{{ $loan->status->status_desc }}</span>
                                                    @endif
                                                    </td>
                                                    <td>{{ $loan->loan_amount }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($loan->released_date)->format('Y-m-d') }}
                                                    </td>
                                                    <td>{{ $loan->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <a href="/loans/{{ $loan->id }}"
                                                            class="btn btn-info"><i class="fa fa-info"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9">لا توجد لديك قروض</td>
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

@endsection
