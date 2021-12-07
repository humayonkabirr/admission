<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinalSelectionCriterion extends Model
{
    use SoftDeletes;
  use Auditable;
  use HasFactory;

  public $table = 'primary_selection_criterias';

  protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];

  protected $fillable = [
      'primary_criteria_name',
      'circular_id',
      'division_id',
      'district_id',
      'upazila_id',
      'last_gpa',
      'family_status_id',
      'family_member',
      'active',
      'created_at',
      'updated_at',
      'deleted_at',
  ];

  public function cirular()
  {
      return $this->belongsTo(Circular::class, 'circular_id');
  }

  public function division()
  {
      return $this->belongsTo(Division::class, 'division_id');
  }

  public function district()
  {
      return $this->belongsTo(District::class, 'district_id');
  }

  public function upazila()
  {
      return $this->belongsTo(Upazila::class, 'upazila_id');
  }

  public function familyStatus()
  {
      return $this->belongsTo(FamilyStatus::class, 'family_status_id');
  }

  protected function serializeDate(DateTimeInterface $date)
  {
      return $date->format('Y-m-d H:i:s');
  }
}
