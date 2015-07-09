<?php

namespace App\StudyGroup;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyGroup extends Model
{

    use softDeletes;


    /**
     * The database table (study_groups) used by the model.
     *
     * @var string
     */
    protected $table = 'study_groups';

    /**
     * Add mass-assignment to model.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'district_id',
        'meeting_time',
        'frequency',
        'is_active',
        'leader_member_id'
    ];

    /*
        |--------------------------------------------------------------------------
        | ATTRIBUTES
        |--------------------------------------------------------------------------
    */

    /**
     * Return the meeting_time attribute in the form H:i
     *
     * @param $value
     *
     * @return string
     */
    public function getMeetingTimeAttribute($value)
    {
        return Carbon::parse($value)->format('g:i A');
    }



    /*
        |--------------------------------------------------------------------------
        | RELATIONSHIPS
        |--------------------------------------------------------------------------
    */


    /**
     *  This study group has many members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->belongsToMany('App\Member\Member','R_study_groups_member_pivot','member_id');
    }

}
