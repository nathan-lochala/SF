<?php

namespace App\StudyGroup;

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
     *  This study group has many members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->belongsToMany('App\Member\Member','R_study_groups_member_pivot','member_id');
    }

}
