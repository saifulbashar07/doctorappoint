<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'file',
        'user_id',
        'branch_id',
        'date',
    ];

    public function doctor() 
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient() 
    {
        return $this->belongsTo(Patient::class);
    }
}