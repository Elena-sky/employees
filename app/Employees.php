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

    /**
     * Get all from table Employees
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function allList()
    {
        return Employees::query()
            ->orderBy('id', 'desc')
            ->paginate(20);
    }

    /**
     * Search all boss by @param $name
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function selectBoss($name)
    {
        return self::query()
            ->where('full_name', 'LIKE', '%' . $name . '%')->get(['full_name']);
    }

    /**
     * Get id by Name
     *
     * @param $name
     * @return mixed
     */
    public function getIdByName($name)
    {
         $mentor = self::where('full_name', '=', $name)->first();
        return $mentor->id;
    }


    /**
     * Get old photo
     *
     * @param $id
     * @return mixed
     */
    public function getOldPhoto($id)
    {
        $name = self::where('id', '=', $id)->get(['photo'])->first();
        return $name->photo;
    }


    /**
     * Sorted of data with table of employees
     *
     * @param $orderBy
     * @param $sortOrder
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function sort($orderBy, $sortOrder)
    {
        return Employees::query()
            ->orderBy($orderBy, $sortOrder)
            ->paginate(20);
    }





}
