<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_address',
        'post_index',
        'company_phone',
        'company_email',
        'company_bin',
        'company_iik',
        'bank_name',
        'bank_bik',
        'company_ceo_fio',
        'responsible_person',
        'responsible_person_phone',
        'responsible_person_email',
        'desired_domen_name',
        'file',
    ];
}
