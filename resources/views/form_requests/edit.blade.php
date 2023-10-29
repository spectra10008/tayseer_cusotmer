@extends('layouts.app')
@section('title', 'تعديل الطلب '.$formRequest->form_request_id)
@push('pushcss')
<style>
    .asteresk{
        color:red;
        font-size: 15px;
    }
</style>
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <h4 class="card-title">تعديل الطلب</h4>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger mb-2">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/form-requests/{{ $formRequest->form_request_id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="latitude" id="latitude" readonly class="form-control"
                                    value="{{ old('latitude') }}">
                                <input type="hidden" name="longitude" id="longitude" readonly class="form-control"
                                    value="{{ old('longitude') }}">
                                <div class="row">
                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>
                                        معلومات المشروع والتمويل
                                    </h5>
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">إسم المشروع <span class="asteresk">*</span></label>
                                                <input type="text"
                                                class="form-control @error('project_name') is-invalid @enderror"
                                                name="project_name" placeholder="اسم المشروع"
                                                value="{{ old('project_name',$formRequest->project_name) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">نوع التمويل<span class="asteresk">*</span></label>
                                                <select name="fund_type_id"
                                                        class="form-select @error('fund_type_id') is-invalid @enderror"
                                                        required>
                                                        <option value="">إختار</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}"@selected($type->id == old('fund_type_id',$formRequest->fund_type_id))>
                                                                {{ $type->type_name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">معلومات المشروع <span class="asteresk">*</span></label>
                                                <textarea name="project_desc" class="ckeditor form-control @error('project_desc') is-invalid @enderror" required>{{ old('project_desc',$formRequest->project_desc) }}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-date-input" class="form-label">القطاع <span class="asteresk">*</span></label>
                                                <select name="project_sector_id"
                                                class="form-select @error('project_sector_id') is-invalid @enderror"
                                                required>
                                                <option value="">إختار</option>
                                                @foreach ($sectors as $sector)
                                                    <option value="{{ $sector->id }}"@selected($sector->id == old('project_sector_id',$formRequest->project_sector_id))>
                                                        {{ $sector->sector_desc }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label"> قيمة التمويل المطلوب بالجنيه <span class="asteresk">*</span></label>
                                                <input type="text"
                                                class="form-control @error('project_fund_need') is-invalid @enderror"
                                                name="project_fund_need"
                                                placeholder="قيمة التمويل المطلوب بالجنيه السوداني"
                                                value="{{ old('project_fund_need',$formRequest->project_fund_need) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="row mt-4">
                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>
                                        ملفات
                                    </h5>

                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-3">
                                                <label for="first-name-vertical"> الصورة الشخصية</label>
                                                <input type="file"
                                                        class="form-control @error('personal_image') is-invalid @enderror"
                                                        name="personal_image" value="{{ old('personal_image') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="first-name-vertical">دراسة الجدوى </label>
                                                <input type="file"
                                                class="form-control @error('feasibility_study_file') is-invalid @enderror"
                                                name="feasibility_study_file"
                                                value="{{ old('feasibility_study_file') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="first-name-vertical">صورة الهوية</label>
                                                <input type="file"
                                                        class="form-control @error('id_file') is-invalid @enderror"
                                                        name="id_file" value="{{ old('id_file') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p id="location"></p> --}}
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success w-md">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
@push('pushjs')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyA-CFZMuoj6iTzpFJCGUrQUmrQuuw-ZZiE" type="text/javascript">
    </script>
    <script>
        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var locationText = "Latitude: " + latitude + "<br>Longitude: " + longitude;
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                    // document.getElementById("location").innerHTML = locationText;
                }, function() {
                    console.error("Error getting user's location.");
                    // document.getElementById("location").innerHTML = "Error getting user's location.";
                });
            } else {
                console.error("Geolocation is not supported by your browser.");
                // document.getElementById("location").innerHTML = "Geolocation is not supported by your browser.";
            }
        }

        // Call the getUserLocation function when the page loads
        window.onload = getUserLocation;
    </script>
    <?php $old_is_bank = old('is_bank_account'); ?>
    <script>
        $(document).ready(function() {
            if (@json($old_is_bank) == 1) {
                $('.bank_id').removeClass('d-none');
                $('.branch_name').removeClass('d-none');
                $('.account_no').removeClass('d-none');
            }
            $("select[name='is_bank_account']").change(function() {
                var select_id = this.value;
                if (select_id == 1) {
                    $('.bank_id').removeClass('d-none');
                    $('.branch_name').removeClass('d-none');
                    $('.account_no').removeClass('d-none');
                } else {
                    $('.bank_id').addClass('d-none');
                    $('.branch_name').addClass('d-none');
                    $('.account_no').addClass('d-none');
                }
            });
        });
    </script>
@endpush
