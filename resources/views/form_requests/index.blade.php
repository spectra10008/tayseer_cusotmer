@extends('layouts.app')
@section('title', 'طلباتي')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">طلباتي</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/dashboard">الرئيسية</a></li>
                                <li class="breadcrumb-item active">طلبات التمويل</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">طلبات التمويل</h4>
                            <div class="text-sm-end">
                                <a href="/form-requests/create"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> اضافة طلب</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>رقم الطلب</th>
                                            <th>حالة الطلب</th>
                                            <th>تاريخ التقديم</th>
                                            <th>خياراتي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($form_requests->count() != 0)
                                            @foreach ($form_requests as $key => $form_request)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $form_request->form_request_id }}</td>
                                                    <td>
                                                        @if ($form_request->status_id == 1)
                                                            <span class="badge rounded-pill bg-info"
                                                                style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                                        @elseif($form_request->status_id == 2)
                                                            <span class="badge rounded-pill bg-info"
                                                                style="font-size: 12px; font-weight:600">
                                                                {{ $form_request->status->status_desc }}</span>
                                                        @elseif($form_request->status_id == 3)
                                                            <span class="badge rounded-pill bg-primary"
                                                                style="font-size: 12px; font-weight:600">
                                                                {{ $form_request->status->status_desc }}</span>
                                                        @elseif($form_request->status_id == 4)
                                                            <span class="badge rounded-pill bg-primary"
                                                                style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                                        @elseif($form_request->status_id == 5)
                                                            <span class="badge rounded-pill bg-success"
                                                                style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                                        @elseif($form_request->status_id == 6)
                                                            <span class="badge rounded-pill bg-danger"
                                                                style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                                        @elseif($form_request->status_id == 7)
                                                            <span class="badge rounded-pill bg-secondary"
                                                                style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $form_request->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <a href="/form-requests/{{ $form_request->form_request_id }}"
                                                            class="btn btn-info">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9">لا توجد لديك طلبات</td>
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
