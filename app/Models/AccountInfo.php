<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInfo extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const BANK_ACCOUNT_OWNER_SELECT = [
        '1' => 'নিজ',
        '2' => 'পিতা ',
        '3' => 'মাতা',
        '4' => 'ভাই',
        '5' => 'বোন',
        '6' => 'অন্যান্য',
    ];

    public const ACCOUNT_TYPE_SELECT = [
        '0' => 'প্রযোজ্য নয়',
        '1' => 'চলতি  হিসাব (Current Account)',
        '2' => 'সঞ্চয়ী  হিসাব (Savings Account)',
        '4' => 'অন্যান্য (Others)',
    ];

    public $table = 'account_infos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user',
        'app_number_id',
        'student_name',
        'banking_type_id',
        'bank_name_id',
        'district_id',
        'bank_branch_id',
        'routing_no',
        'bank_account_owner',
        'acc_name',
        'acc_no',
        'account_type',
        'branch_code_id',
        'account_holder_nid',
        'eiin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function app_number()
    {
        return $this->belongsTo(GeneralInfo::class, 'app_number_id');
    }

    public function banking_type()
    {
        return $this->belongsTo(BankingType::class, 'banking_type_id');
    }

    public function bank_name()
    {
        return $this->belongsTo(BankingServiceProvider::class, 'bank_name_id');
    }

    public function bank_account_type()
    {
        return $this->belongsTo(Bank_Account_Type::class, 'account_type');
    }

    public function account_owner()
    {
        return $this->belongsTo(AccountOwner::class, 'bank_account_owner');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function bank_branch()
    {
        return $this->belongsTo(BankBranch::class, 'bank_branch_id');
    }

    public function branch_code()
    {
        return $this->belongsTo(BankBranch::class, 'branch_code_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
