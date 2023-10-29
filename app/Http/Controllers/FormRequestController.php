<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequestRequest;
use App\Http\Requests\UpdateFormRequestRequest;
use App\Models\Bank;
use App\Models\Beneficiary;
use App\Models\FormRequest;
use App\Models\FormRequestFile;
use App\Models\FundType;
use App\Models\MfiProvider;
use App\Models\Sector;
use App\Models\SocialSituation;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class FormRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form_requests = FormRequest::where('beneficiary_id', Auth::guard('beneficiaries')->user()->id)->with('status')->get();
        return view('form_requests.index')
            ->with('form_requests', $form_requests)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiaries = Beneficiary::where('is_active', 1)->get();
        $statuses = SocialSituation::all();
        $banks = Bank::all();
        $types = FundType::all();
        $sectors = Sector::orderby('id', 'desc')->get();
        $mfis = MfiProvider::where('is_active', 1)->get();
        return view('form_requests.create')
            ->with('statuses', $statuses)
            ->with('banks', $banks)
            ->with('sectors', $sectors)
            ->with('types', $types)
            ->with('mfis', $mfis)
            ->with('beneficiaries', $beneficiaries)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequestRequest $request)
    {
        $rand = rand(111111111, 999999999);

        $form_requests = new FormRequest();
        $form_requests->form_request_id = $rand;
        $form_requests->uuid = Str::uuid();
        $form_requests->beneficiary_id = Auth::guard('beneficiaries')->user()->id;
        $form_requests->status_id = 1;
        $form_requests->project_name = $request->project_name;
        $form_requests->fund_type_id = $request->fund_type_id;
        $form_requests->project_sector_id = $request->project_sector_id;
        $form_requests->project_fund_need = $request->project_fund_need;
        $form_requests->project_desc = $request->project_desc;
        $form_requests->location_on_map = $request->latitude . ',' . $request->longitude;
        // store files
        if (isset($request->feasibility_study_file) && $request->feasibility_study_file != null) {
            $feasibility_study_file = $request->file('feasibility_study_file')->store('public/form_files/feasibility_studies');
            $form_requests->feasibility_study_file = $feasibility_study_file;
        }
        if (isset($request->personal_image) && $request->personal_image != null) {
            $personal_image = $request->file('personal_image')->store('public/form_files/personal_images');
            $form_requests->personal_image = $personal_image;
        }
        if (isset($request->id_file) && $request->id_file != null) {
            $id_file = $request->file('id_file')->store('public/id_files');
            $form_requests->id_file = $id_file;
        }
        $form_requests->save();

        // toastr()->success('تم حفظ بيانات الطلب بنجاح !!');
        return redirect('/form-requests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormRequest  $formRequest
     * @return \Illuminate\Http\Response
     */
    public function show($form_request_id)
    {
        $form_request = FormRequest::where('form_request_id', $form_request_id)->first();

        return view('form_requests.show')
            ->with('form_request', $form_request)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormRequest  $formRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($form_request_id)
    {
        $formRequest = FormRequest::where('form_request_id', $form_request_id)->first();

        $statuses = SocialSituation::all();
        $banks = Bank::all();
        $types = FundType::all();
        $sectors = Sector::orderby('id', 'desc')->get();

        return view('form_requests.edit')
            ->with('statuses', $statuses)
            ->with('banks', $banks)
            ->with('sectors', $sectors)
            ->with('types', $types)
            ->with('formRequest', $formRequest)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormRequestRequest  $request
     * @param  \App\Models\FormRequest  $formRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequestRequest $request, $form_request_id)
    {
        $form_requests = FormRequest::where('form_request_id', $form_request_id)->first();
        $form_requests->project_name = $request->project_name;
        $form_requests->fund_type_id = $request->fund_type_id;
        $form_requests->project_sector_id = $request->project_sector_id;
        $form_requests->project_fund_need = $request->project_fund_need;
        $form_requests->project_desc = $request->project_desc;
        // store files
        if (isset($request->feasibility_study_file) && $request->feasibility_study_file != null) {
            $feasibility_study_file = $request->file('feasibility_study_file')->store('public/form_files/feasibility_studies');
            $form_requests->feasibility_study_file = $feasibility_study_file;
        }
        if (isset($request->personal_image) && $request->personal_image != null) {
            $personal_image = $request->file('personal_image')->store('public/form_files/personal_images');
            $form_requests->personal_image = $personal_image;
        }
        if (isset($request->id_file) && $request->id_file != null) {
            $id_file = $request->file('id_file')->store('public/id_files');
            $form_requests->id_file = $id_file;
        }
        $form_requests->update();

        // toastr()->success('تم تحديث بيانات الطلب بنجاح !!');
        return redirect('/form-requests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormRequest  $formRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormRequest $formRequest)
    {
        //
    }

    public function request_cancel($form_request_id)
    {
        $form_request = FormRequest::where('form_request_id', $form_request_id)->where('beneficiary_id', Auth::guard('beneficiaries')->user()->id)->first();
        if ($form_request == null) {
            return back();
        } else {
            $form_request->status_id = 7;
            $form_request->update();

            return back();
        }
    }

    public function upload_files(Request $request)
    {
        $validated = $request->validate([
            'file_name' => 'required|string|max:255',
            'file_path.*' => 'required|mimes:jpg,jpeg,pdf,png|max:2048',
        ]);

        $file_paths = $request->file_path;
        $form_request = FormRequest::where('form_request_id', $request->request_id)->first();

        foreach ($file_paths as $file_path) {
            $formRequestFile = new FormRequestFile();
            $formRequestFile->file_name = $request->file_name;
            $formRequestFile->request_id = $form_request->id;
            if ($file_path->isValid()) {
                $path = $file_path->store('form_files', 'public');
                $formRequestFile->file = $path;
            }
            $formRequestFile->save();
        }

        return back();
    }

    public function delete_files($file_id)
    {
        $form_request = FormRequestFile::findOrFail($file_id)->delete();

        toastr()->success('تم حذف الملف بنجاح');
        return back();
    }
}
