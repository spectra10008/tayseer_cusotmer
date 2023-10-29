@extends('layouts.app')
@section('title', 'لوحة التحكم')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">الرئيسية</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                <li class="breadcrumb-item active">الرئيسية</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"></li>
                                    <li data-bs-target="#carouselExampleFade" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleFade" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid mx-auto" src="assets/images/small/img-1.jpg"
                                            alt="First slide" style="width: 100%;height:300px;object-fit:cover">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid mx-auto" src="assets/images/small/img-2.jpg"
                                            alt="Second slide" style="width: 100%;height:300px;object-fit:cover">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid mx-auto" src="assets/images/small/img-3.jpg"
                                            alt="Third slide" style="width: 100%;height:300px;object-fit:cover">
                                    </div>
                                </div>
                                {{-- <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> --}}
                            </div><!-- end carousel -->
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate pb-1">طلبات التمويل في
                                        المعالجة</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $requests->count() }}">0</span>
                                    </h4>
                                </div>

                                <div class="flex-shrink-0 text-end dash-widget">
                                    <i class="fa fa-spinner" style="font-size: 40px; color:#1c84ee"></i>
                                    {{-- <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div> --}}
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate pb-1">طلبات التمويل مكتملة
                                    </span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $requests->count() }}">0</span>
                                    </h4>
                                </div>

                                <div class="flex-shrink-0 text-end dash-widget">
                                    <i class="fa fa-check-circle" style="font-size: 40px; color:#1c84ee"></i>
                                    {{-- <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div> --}}
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate pb-1">الاقساط</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $installments->count() }}">0</span>
                                    </h4>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <i class="fa fa-money-bill-alt" style="font-size: 40px; color:#1c84ee"></i>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate pb-1">القروض</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $loans->count() }}">0</span>
                                    </h4>

                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <i class="fa fa-cubes" style="font-size: 40px; color:#1c84ee"></i>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row-->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">اخر طلبات التمويل</h4>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>رقم الطلب</th>
                                            <th>حالة الطلب</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>خياراتي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($requests->count() != 0)
                                            @foreach ($latest_form_requests as $key => $form_request)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $form_request->form_request_id }}</td>
                                                    <td>
                                                        @if ($form_request->status_id == 1)
                                                        <span class="badge rounded-pill bg-info" style="font-size: 12px; font-weight:600">{{$form_request->status->status_desc}}</span>
                                                        @elseif($form_request->status_id == 2)
                                                        <span class="badge rounded-pill bg-info" style="font-size: 12px; font-weight:600">
                                                            {{$form_request->status->status_desc}}</span>
                                                        @elseif($form_request->status_id == 3)
                                                            <span class="badge rounded-pill bg-primary" style="font-size: 12px; font-weight:600">
                                                                {{$form_request->status->status_desc}}</span>
                                                        @elseif($form_request->status_id == 4)
                                                        <span class="badge rounded-pill bg-primary" style="font-size: 12px; font-weight:600">{{$form_request->status->status_desc}}</span>
                                                        @elseif($form_request->status_id == 5)
                                                        <span class="badge rounded-pill bg-success" style="font-size: 12px; font-weight:600">{{$form_request->status->status_desc}}</span>
                                                        @elseif($form_request->status_id == 6)
                                                        <span class="badge rounded-pill bg-danger" style="font-size: 12px; font-weight:600">{{$form_request->status->status_desc}}</span>
                                                        @elseif($form_request->status_id == 7)
                                                        <span class="badge rounded-pill bg-secondary" style="font-size: 12px; font-weight:600">{{$form_request->status->status_desc}}</span>
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
                                                <td colspan="9">لا تتوفر طلبات للمستفيد</td>
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
        </div> <!-- container-fluid -->
    </div>
@endsection
