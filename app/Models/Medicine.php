<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    
   protected $fillable = [
       'name',
       'user_id',
       'branch_id',
       'description',
       'group',
       'date',
   ];
}