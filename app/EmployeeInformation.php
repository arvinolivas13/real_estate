<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{

    protected $fillable = [
        'id',
        'employee_no',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birthdate',
        'gender',
        'phone1',
        'phone2',
        'street_1',
        'barangay_1',
        'city_1',
        'province_1',
        'country_1',
        'zip_1',
        'street_2',
        'barangay_2',
        'city_2',
        'province_2',
        'country_2',
        'zip_2',
        'profile_img',
        'bankaccount',
        'emergency_name',
        'emergency_no',
        'email',
        'password',
        'bank_account',
        'tin_number',
        'sss_number',
        'pagibig_number',
        'philhealth_number',
        'company_id',
        'status',
        'created_by'
    ];

    protected $table = "employees";

    public function employment_tab() {
        return $this->hasOne(Employment::class, 'employee_id', 'id');
    }
    
    public function leave_tab() {
        return $this->hasMany(Leaves::class, 'employee_id', 'id');
    }
}
