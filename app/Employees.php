<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'full_name', 'start_date', 'salary', 'position', 'parent_id', 'photo',
    ];

}
