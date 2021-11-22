<?php

namespace App\Http\Requests;

use App\Models\Disbursement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDisbursementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disbursement_create');
    }

    public function rules()
    {
        return [
            'app_number' => [
                'string',
                'required',
                'unique:disbursements',
            ],
            'stu_name' => [
                'string',
                'required',
            ],
            'brid' => [
                'string',
                'max:50',
                'required',
            ],
            'acc_no' => [
                'string',
                'required',
            ],
            'acc_name' => [
                'string',
                'required',
            ],
            'bank_name' => [
                'string',
                'required',
            ],
            'bank_branch' => [
                'string',
                'required',
            ],
            'routing_no' => [
                'string',
                'required',
            ],
            'student_division' => [
                'string',
                'required',
            ],
            'student_district' => [
                'string',
                'required',
            ],
            'student_upazila' => [
                'string',
                'required',
            ],
        ];
    }
}
