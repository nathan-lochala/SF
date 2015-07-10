<?php

namespace App\StudyGroup;

use Carbon\Carbon;
use DB;
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
        // belongsToMany('class','pivot_table','current_models_id','foreign_id')
        return $this->belongsToMany('App\Member\Member','R_study_groups_member_pivot','study_group_id','member_id')->withTimestamps();
    }


    /**
     *  This group belongs to a Team Leader
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leader()
    {
        return $this->belongsTo('App\Member\Member','leader_member_id');
    }

    /**
     *  This group belongs to a District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo('App\District\District','district_id');
    }

    /*
        |--------------------------------------------------------------------------
        | CUSTOM QUERIES
        |--------------------------------------------------------------------------
    */

    /**
     * Returns a number of all the members in the study groups
     *
     * @return int
     */
    public static function allMembersCount()
    {
        $members = 0;
        $groups = static::all();
        if(!$groups->isEmpty()){
            foreach($groups as $group){
                $members += $group->members()->count();
            }
        }

        return $members;
    }

}
