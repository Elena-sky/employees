<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employees
 * @package App
 */
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

    protected $table = 'employees';


    /**
     * Get main Boss
     *
     * @return mixed
     */
    public static function getBoss()
    {
        return self::where('parent_id', '=', '0')->first();
    }

    /**
     * Get workers of boss
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany('App\Employees', 'parent_id', 'id');
    }

    /**
     * Get the boss of worker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function boss()
    {
        return $this->belongsTo('App\Employees', 'parent_id', 'id');
    }



}
