<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormRequest;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\Project;
use Auth;
class HomeController extends Controller
{
    public function dashboard()
    {
        $requests = FormRequest::where('beneficiary_id',Auth::guard('beneficiaries')->user()->id)->get();
        $loans = Loan::whereHas('request', function($q){
            $q->where('beneficiary_id', Auth::guard('beneficiaries')->user()->id);
        })->get();
        $installments = Installment::whereHas('loan.request', function($q){
            $q->where('beneficiary_id', Auth::guard('beneficiaries')->user()->id);
        })->get();

        $latest_form_requests = FormRequest::where('beneficiary_id',Auth::guard('beneficiaries')->user()->id)->with('status')->limit(5)->get();
        return view('dashboard')
        ->with('requests',$requests)
        ->with('installments',$installments)
        ->with('loans',$loans)
        ->with('latest_form_requests',$latest_form_requests)
        ;
    }
}
