@extends('layouts.app')
@section('title', 'قرض ' . $loan->id)
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">قرض {{ $loan->id }}</h4>

                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="/dashboard">طلباتي</a></li>
                                <li class="breadcrumb-item active">طلب {{ $loan->form_request_id }}</li>
                            </ol>
                        </div> --}}

                    </div>
                </div>
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">معلومات القروض</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <b>رقم القرض</b> : {{ $loan->id }}
                                </div>
                                <div class="col-lg-4 col-12">
                                    <b>رقم الطلب</b> : <a href="/form-requests/{{ $loan->request->form_request_id }}"
                                        target="_blank">{{ $loan->request->form_request_id }} <i
                                            class="fa fa-external-link"></i></a>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <b>حالة القرض</b> :
                                    @if ($loan->status_id == 1)
                                        <span class="badge rounded-pill bg-info"
                                            style="font-size: 12px; font-weight:600">{{ $loan->status->status_desc }}</span>
                                    @elseif($loan->status_id == 2)
                                        <span class="badge rounded-pill bg-info" style="font-size: 12px; font-weight:600">
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
                                        {{ $loan->status->status_desc }}
                                    @endif
                                </div>

                                <div class="col-lg-4 col-12 mt-4">
                                    <b>مبلغ القرض</b> :{{ $loan->loan_amount }}
                                </div>
                                <div class="col-lg-4 col-12 mt-4">
                                    <b>تاريخ التمويل</b> :{{ \Carbon\Carbon::parse($loan->released_date)->format('Y-m-d') }}
                                </div>
                                <div class="col-lg-4 col-12 mt-4">
                                    <b>فائدة القرض</b> :{{ $loan->loan_interest }}
                                </div>
                                <div class="col-lg-4 col-12 mt-4">
                                    <b>الفائدة بال</b> :{{ $loan->loan_interest_per }}
                                </div>
                                <div class="col-lg-4 col-12 mt-4">
                                    <b>مدة القرض</b> :{{ $loan->loan_duration }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">معلومات التمويل</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-12 mb-3">
                                    <b> منتج التمويل</b> : {{ $loan->product->product_name }}
                                </div>
                                <div class="col-lg-4 col-12 mb-3">
                                    <b>مؤسسة التمويل</b> : {{ $loan->mfi_provider->name_ar ?? '-' }}

                                </div>
                                <div class="col-lg-4 col-12 mb-3">
                                    <b>الوصف </b> : {{ $loan->description }}
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>

@endsection
