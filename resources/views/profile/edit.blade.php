@extends('layouts.app')
@section('title', 'اكمال البيانات الشخصية')
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
                                <h4 class="card-title">تعديل بياناتك الشخصية</h4>
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
                            <form action="/complete-profile" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="latitude" id="latitude" readonly class="form-control"
                                    value="{{ old('latitude') }}">
                                <input type="hidden" name="longitude" id="longitude" readonly class="form-control"
                                    value="{{ old('longitude') }}">
                                <div class="row">
                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>
                                        المعلومات الشخصية
                                    </h5>

                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">الاسم <span class="asteresk">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    placeholder="اسم مستفيد" value="{{ old('name',auth()->guard('beneficiaries')->user()->name) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-date-input" class="form-label">البريد الالكتروني (اختياري)</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    placeholder="البريد الألكتروني" value="{{ old('email',auth()->guard('beneficiaries')->user()->email) }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">العمر <span class="asteresk">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('age') is-invalid @enderror" name="age"
                                                    placeholder="العمر" value="{{ old('age',auth()->guard('beneficiaries')->user()->age) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-url-input" class="form-label">الحالة الاجتماعية <span class="asteresk">*</span></label>
                                                <select name="social_situation_id"
                                                    class="form-select @error('social_situation_id') is-invalid @enderror"
                                                    required>
                                                    <option value="">إختار</option>
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}"@selected($status->id == old('social_situation_id',auth()->guard('beneficiaries')->user()->social_situation_id))>
                                                            {{ $status->situation_desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">العنوان <span class="asteresk">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" placeholder="العنوان" value="{{ old('address',auth()->guard('beneficiaries')->user()->address) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-date-input" class="form-label">الجنس <span class="asteresk">*</span></label>
                                                <select name="gender"
                                                    class="form-select @error('gender') is-invalid @enderror">
                                                    <option value="">إختار</option>
                                                    <option value="male"@selected(old('gender',auth()->guard('beneficiaries')->user()->gender) == 'male')>ذكر</option>
                                                    <option value="female"@selected(old('gender',auth()->guard('beneficiaries')->user()->gender) == 'female')>أنثى</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">رقم الهاتف <span class="asteresk">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    placeholder="رقم الهاتف" value="{{ old('phone',auth()->guard('beneficiaries')->user()->phone) }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-week-input" class="form-label">الرقم الوطني <span class="asteresk">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('id_number') is-invalid @enderror"
                                                    name="id_number" placeholder="الرقم الوطني"
                                                    value="{{ old('id_number',auth()->guard('beneficiaries')->user()->id_number) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-month-input" class="form-label">عدد الاولاد <span class="asteresk">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('children_no') is-invalid @enderror"
                                                    name="children_no" placeholder="عدد الأولاد"
                                                    value="{{ old('children_no',auth()->guard('beneficiaries')->user()->children_no) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-month-input" class="form-label">كلمة السر<span class="asteresk">*</span></label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>
                                        المعلومات البنكية
                                    </h5>

                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-3">
                                                <label for="first-name-vertical">حساب بنكي ؟ <span class="asteresk">*</span></label>
                                                <select name="is_bank_account"
                                                    class="form-select @error('is_bank_account') is-invalid @enderror"
                                                    required>
                                                    <option value="">إختار</option>
                                                    <option value="0" @selected(old('is_bank_account',auth()->guard('beneficiaries')->user()->is_bank_account) == 0)>لا</option>
                                                    <option value="1" @selected(old('is_bank_account',auth()->guard('beneficiaries')->user()->is_bank_account) == 1)>نعم</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 branch_name @if(auth()->guard('beneficiaries')->user()->is_bank_account == 0) d-none @endif">
                                                <label for="first-name-vertical">اسم الفرع <span class="asteresk">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('branch_name') is-invalid @enderror"
                                                    name="branch_name" placeholder="اسم الفرع"
                                                    value="{{ old('branch_name',auth()->guard('beneficiaries')->user()->branch_name) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3 bank_id @if(auth()->guard('beneficiaries')->user()->is_bank_account == 0) d-none @endif">
                                                <label for="first-name-vertical">اسم البنك <span class="asteresk">*</span></label>
                                                <select name="bank_id"
                                                    class="form-select @error('bank_id') is-invalid @enderror">
                                                    <option value="">إختار</option>
                                                    @foreach ($banks as $bank)
                                                        <option value="{{ $bank->id }}" @selected(old('bank_id',auth()->guard('beneficiaries')->user()->bank_id) == $bank->id)>
                                                            {{ $bank->bank_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 account_no @if(auth()->guard('beneficiaries')->user()->is_bank_account == 0) d-none @endif">
                                                <label for="first-name-vertical">رقم الحساب <span class="asteresk">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('account_no') is-invalid @enderror"
                                                    name="account_no" placeholder="رقم الحساب"
                                                    value="{{ old('account_no',auth()->guard('beneficiaries')->user()->account_no) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>
                                        الملفات
                                    </h5>

                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-3">
                                                <label for="first-name-vertical">الصورة الشخصية <span class="asteresk">*</span></label>
                                                <input type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        name="image" @if(auth()->guard('beneficiaries')->user()->image == null) required @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="first-name-vertical">صورة الهوية <span class="asteresk">*</span></label>
                                                <input type="file"
                                                class="form-control @error('id_image') is-invalid @enderror"
                                                name="id_image"  @if(auth()->guard('beneficiaries')->user()->id_image == null) required @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p id="location"></p> --}}
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary w-md">حفظ</button>
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
