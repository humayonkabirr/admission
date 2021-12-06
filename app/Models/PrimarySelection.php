<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimarySelection extends Model
{
  use SoftDeletes;
  use Auditable;
  use HasFactory;

  public $table = 'primary_selections';

  protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];

  protected $fillable = [
      'app_number',
      'user_id_no',
      'student_name',
      'brid',
      'father_name',
      'father_nid',
      'mother_name',
      'mother_nid',
      'academic_level_id',
      'admission_class_id',
      'education_institute_id',
      'eiin_id',
      'division_id',
      'district_id',
      'upazila_id',
      'created_at',
      'updated_at',
      'deleted_at',
  ];

  public function academic_level()
  {
      return $this->belongsTo(AcademicLevel::class, 'academic_level_id');
  }

  public function admission_class()
  {
      return $this->belongsTo(LevelWiseClass::class, 'admission_class_id');
  }

  public function education_institute()
  {
      return $this->belongsTo(EducationalInstitute::class, 'education_institute_id');
  }

  public function documents()
  {
    return $this->belongsTo(Document::class, 'app_number_id', 'app_number');
  }

  public function appNumber()
  {
      // return $this->belongsTo(ApplicationTracking::class, 'application_no', 'application_no');
      return $this->belongsTo(GeneralInfo::class, 'id', 'application_no');
  }

  public function eiin()
  {
      return $this->belongsTo(Selection::class, 'eiin_id');
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

  protected function serializeDate(DateTimeInterface $date)
  {
      return $date->format('Y-m-d H:i:s');
  }
}
