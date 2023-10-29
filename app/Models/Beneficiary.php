<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Beneficiary extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
        'age',
        'id_number',
        'social_situation_id',
        'is_grouped',
        'children_no',
        'address',
        'location_on_map',
        'is_bank_account',
        'bank_id',
        'branch_name',
        'account_no',
        'funding_status',
        'image',
        'id_image',
        'password',
        'is_sign_up',
        'is_active',
    ];

    public function social_status()
    {
        return $this->hasOne(SocialSituation::class,'id','social_situation_id');
    }
    public function bank()
    {
        return $this->hasOne(Bank::class,'id','bank_id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function files()
    {
        return $this->hasMany(BeneficiaryFile::class,'beneficiary_id','id');
    }

    public function beneficiary_requests()
    {
        return $this->hasMany(BeneficiaryRequest::class,'beneficiary_id','id');
    }
}
