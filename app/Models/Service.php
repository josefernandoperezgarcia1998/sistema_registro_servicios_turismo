<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    // Mass loading of Service table columns
    protected $fillable = [
        'id_service',
        'personal_name',
        'person_served',
        'area',
        'type_service',
        'description',
        'date_start_service',
        'date_end_service',
        'personal_id',
    ];

    public function personal()
    {
        return $this->belongsTo('App\Models\User');
    }

}
