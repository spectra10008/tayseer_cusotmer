<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\InstallmentPaymentRequest;
use App\Http\Requests\StoreInstallmentPaymentRequest;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class PaymentInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_requests = InstallmentPaymentRequest::orderby('id', 'Desc')->get();
        $installments = Installment::whereHas('loan.request', function ($q) {
            $q->where('beneficiary_id', Auth::guard('beneficiaries')->user()->id);
        })
        ->orderby('date_payment_installment', 'Asc')
        ->where('status',1)
        ->get();

        return view('installments.payment_request.index')
            ->with('installments', $installments)
            ->with('payment_requests', $payment_requests)
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstallmentPaymentRequest $request)
    {
        $installmentPaymentRequest = new InstallmentPaymentRequest();
        $installmentPaymentRequest->is_approved = 1;
        $installmentPaymentRequest->installment_id = $request->installment_id;
        $installmentPaymentRequest->beneficiary_id =  Auth::guard('beneficiaries')->user()->id;
        if ($request->file->isValid()) {
            $path = $request->file->store('payment_requests', 'public');
            $installmentPaymentRequest->file = $path;
        }
        $installmentPaymentRequest->save();

        toastr()->success('تم حفظ البيانات بنجاح !!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $installmentPaymentRequest = InstallmentPaymentRequest::findOrFail($id);
        Storage::disk('public')->delete($installmentPaymentRequest->file);
        $installmentPaymentRequest->delete();

        toastr()->success('تم حذف البيانات بنجاح !!');
        return back();
    }
}
