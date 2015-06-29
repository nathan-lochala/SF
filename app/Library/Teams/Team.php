<?php

namespace App\Team;

use App\Member\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use softDeletes;

    /**
     * Add mass-assignment to model.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'leader_member_id'
    ];

    /**
     * The database table (teams) used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

    /**
    *  This team belongs to many members
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function members()
    {
        // belongsToMany('class','pivot_table','id')
        return $this->belongsToMany('App\Member\Member','R_teams_members_pivot','team_id');
    }

    /**
    *  This team belongs to many interestedMembers
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function interestedMembers()
    {
        // belongsToMany('class','pivot_table','id')
        return $this->belongsToMany('App\Member\Member','R_teams_interested_pivot','team_id');
    }

    /**
     * Return the team leader member object
     *
     * @return mixed
     */
    public function teamLeader()
    {
        return $this->belongsTo('App\Member\Member','leader_member_id');
    }


    /**
     * Get a select_array list of all the teams
     *
     * @param Member $member
     *
     * @return array
     */
    public static function teamsSelectArray(Member $member = null) //The class being injected is the one passed in by the form when you call update and give it the model to update
    {
        $select_array = [];
        $teams = static::all();
        foreach($teams as $team){
            $select_array = static::checkSelectArray($member,$team,$select_array);
        }

        return $select_array;
    }


    /**
     * Is is part of the building of a select form object
     * Check to see if a value has been selected. If it has, mark it as 'checked'
     *
     * @param Member|null $member
     * @param             $object
     * @param array       $select_array
     *
     * @return array
     */
    public static function checkSelectArray(Member $member = null, $object, array $select_array)
    {
        $checked = '';

        if($member && $member->teamInterests->contains($object)){
            $checked = 'checked';
        }

        $select_array[$object->name . ' - Lead by: ' . $object->teamLeader->getFullName()] = [    // This is what is displayed as a select option.
            'checked' => $checked, // Either checked or ''
            'value' => $object->id      // This is the ID that you want returned.
        ];

        return $select_array;
    }

    /**
     * Get a dropdown list of all the teams
     *
     * @return array
     */
    public static function teamsDropdown()
    {
        $dropdown = [];
        $teams = static::all();
        foreach($teams as $team){
            $dropdown[$team->id] = $team->name . ' - Lead by: ' . $team->teamLeader->getFullName();
        }

        return $dropdown;
    }


}
