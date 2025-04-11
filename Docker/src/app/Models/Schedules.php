<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
   protected $fillable = [
    'date',
    'start_time',
    'end_time',
    'location',
    'description',
    'budget',
    'note',
   ];

   public function plan()
   {
    return $this->belongsTo(Plan::class);
   }
   
   
}
