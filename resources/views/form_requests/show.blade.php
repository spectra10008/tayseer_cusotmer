@extends('layouts.app')
@section('title', 'طلب ' . $form_request->form_request_id)
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">طلباتي</h4>
                        @if ($form_request->status_id != 7)
                            <div class="text-sm-end">
                                <a href="/form-requests/{{ $form_request->form_request_id }}/edit"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="fa fa-edit me-1"></i> تعديل الطلب</a>
                                @if ($form_request->status_id < 2)
                                    <a href="/form-request-cancel/{{ $form_request->form_request_id }}"
                                        class="btn btn-secondary btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="fa fa-times me-1"></i> الغاء الطلب</a>
                                @endif

                            </div>
                        @endif

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
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">معلومات الطلب</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <b>رقم الطلب</b> : {{ $form_request->form_request_id }}
                                </div>
                                <div class="col-12 col-lg-4">
                                    <b>حالة الطلب</b> :
                                    @if ($form_request->status_id == 1)
                                        <span class="badge rounded-pill bg-info"
                                            style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                    @elseif($form_request->status_id == 2)
                                        <span class="badge rounded-pill bg-info" style="font-size: 12px; font-weight:600">
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
                                    <span class="badge rounded-pill bg-secondary" style="font-size: 12px; font-weight:600">{{ $form_request->status->status_desc }}</span>
                                    @endif
                                </div>
                                <div class="col-12 col-lg-4">
                                    <b>تاريخ التقديم</b> : {{ $form_request->form_request_id }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">معلومات المشروع</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-4 mb-3">
                                    <b> إسم المشروع</b> : {{ $form_request->project_name }}
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <b>القطاع</b> : {{ $form_request->sector->sector_desc }}

                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <b>نوع التمويل</b> : {{ $form_request->fund_type->type_name }}
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <b>التمويل المطلوب</b> : {{ $form_request->project_fund_need }}
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <b>معلومات المشروع</b> : {!! $form_request->project_desc !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                @php($feasibility_study_file = Str::substr($form_request->feasibility_study_file, 7))
                @php($personal_image = Str::substr($form_request->personal_image, 7))
                @php($id_file = Str::substr($form_request->id_image, 7))
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">الملفات </h4>
                            @if ($form_request->status_id != 7)
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#myModal">اضافة ملف</button>
                            </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">اسم الملف</th>
                                        <th scope="col">خياراتي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <b> دراسة الجدوى</b> :</td>
                                        <td><a href="{{ asset('storage/' . $feasibility_study_file) }}"
                                                class="btn btn-primary" download> <i class="fa fa-download"></i> تحميل</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>ملف الهوية</b> :</td>
                                        <td><a href="{{ asset('storage/' . $id_file) }}"
                                                class="btn btn-primary" download> <i class="fa fa-download"></i> تحميل</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>صورة شخصية</b> : </td>
                                        <td> <a href="{{ asset('storage/' . $personal_image) }}" class="btn btn-primary"
                                                download>
                                                <i class="fa fa-download"></i> تحميل</a></td>
                                    </tr>
                                    @foreach ($form_request->files as $file)
                                    <tr>
                                        <td> <b>{{ $file->file_name }}</b> : </td>
                                        <td>
                                            <a href="{{ asset('storage/' . $file->file) }}"
                                            class="btn btn-primary" download>
                                            <i class="fa fa-download"></i> تحميل</a>
                                            @if ($form_request->status_id != 7)
                                            <a href="/form-request-files/delete/{{ $file->id }}"
                                                class="btn btn-danger" onclick="if(!confirm('هل أنت متأكد ؟')){event.preventDefault();}">
                                                <i class="fa fa-download"></i> حذف</a>
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">ملاحظات تيسير </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead class="table-light">
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>الملاحظة</th>
                                                <th>النوع</th>
                                                <th>الحالة</th>
                                                <th>المسؤول</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($form_request->form_notes->count() != 0)
                                            @foreach ($form_request->form_notes as $key => $note)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $note->note }}</td>
                                                <td>{{ $note->type }}</td>
                                                <td>
                                                    @if ($note->status == 1)
                                                        <span class="badge bg-success" style="font-size: 12px; font-weight:600">تمت المعالجة</span>
                                                    @else
                                                        <span class="badge bg-danger" style="font-size: 12px; font-weight:600">لم تتم المعالجة</span>
                                                    @endif
                                                </td>
                                                <td>{{ $note->user->name }}</td>
                                            </tr>
                                        @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9">لا توجد لديك ملاحظات</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">ملاحظات مؤسسة التمويل </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead class="table-light">
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>الملاحظة</th>
                                                <th>النوع</th>
                                                <th>الحالة</th>
                                                <th>المسؤول</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($form_request->mfi_notes->count() != 0)
                                            @foreach ($form_request->mfi_notes as $key => $mfi_notes)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $mfi_notes->note }}</td>
                                                <td>{{ $mfi_notes->type }}</td>
                                                <td>
                                                    @if ($mfi_notes->status == 1)
                                                        <span class="badge bg-success">تمت المعالجة</span>
                                                    @else
                                                        <span class="badge bg-danger">لم تتم المعالجة</span>
                                                    @endif
                                                </td>
                                                <td>{{ $mfi_notes->user->name }}</td>
                                            </tr>
                                        @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9">لا توجد لديك ملاحظات</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">إضافة ملف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/form-request-files/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="request_id" value="{{ $form_request->form_request_id }}" required>
                        <div class="mb-3">
                            <label class="form-label" for="formrow-firstname-input">اسم الملف</label>
                            <input type="text" class="form-control @error('file_name') is-invalid @enderror"
                                id="formrow-firstname-input" name="file_name" value="{{ old('file_name') }}" required
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="formrow-firstname-input">الملفات</label>
                            <input type="file" class="form-control @error('file_path') is-invalid @enderror"
                                name="file_path[]" multiple required>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">رفع الملفات</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
