<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentPaymentRequest extends Model
{
    use HasFactory;

    public function installment()
    {
        return $this->belongsTo(Installment::class);
    }
}
