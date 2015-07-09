<?php

namespace App\Member;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;


    /**
     * Which columns do you want searchable
     * key = columnNames
     * value = displayName //This is used when displaying results in a view
     *
     * @var array
     */
    protected $searchColumns = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email Address',
        'mobile' => 'Mobile Number'
    ];

    /**
     * Add mass-assignment to model.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'family_id',
        'email',
        'district_id',
        'created_at'
    ];

    /**
     * The database table (members) used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /*
        |--------------------------------------------------------------------------
        | ATTRIBUTES
        |--------------------------------------------------------------------------
    */


    /**
     * Return the email as a pre-formatted URL
     *
     * @return string
     */
    public function email()
    {
        if($email = $this->email){
            return '<a href="mailto:' . $email . '">' . $email . '</a>';
        }
        return 'N/A';
    }

    /**
     * Return the member's fullname.
     *
     * @param bool|FALSE $is_last_name_first
     *
     * @param bool       $make_url
     *
     * @return string
     */
    public function getFullName($is_last_name_first = FALSE, $make_url = FALSE)
    {
        if($is_last_name_first){
            $name = $this->last_name . ', ' . $this->first_name;
        }else{
            $name = $this->first_name . ' ' . $this->last_name;
        }

        if($make_url){
            return '<a href="' . url('member/' . $this->id) . '">' . $name . '</a>';
        }

        return $name;
    }


    /*
        |--------------------------------------------------------------------------
        | SCOPES
        |--------------------------------------------------------------------------
    */


    /**
     * Today's new members query scope
     *
     * @param $query
     */
    public function scopeToday($query)
    {
        $query->where('created_at','>=',Carbon::today());
    }

    /*
        |--------------------------------------------------------------------------
        | CUSTOM QUERIES
        |--------------------------------------------------------------------------
    */

    /**
     * Search the member table
     *
     * @param $search_term
     *
     * @return array
     */
    public static function search($search_term)
    {
        $manager = new static();
        $result_set = [];
        foreach($manager->searchColumns as $column => $name){
            $result_set[$name] = static::where($column,'LIKE','%' . $search_term . '%')->orderBy('last_name')->get();
        }

        return $result_set;
    }


    /*
        |--------------------------------------------------------------------------
        | RELATIONSHIPS
        |--------------------------------------------------------------------------
    */
    
    /**
     *  This member has a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * This member has many idCards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function idCard()
    {
        return $this->hasMany('App\Member\PrintList','member_id');
    }

    /**
     *  This member belongs to a family
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function family()
    {
        return $this->belongsTo('App\Member\Family','family_id');
    }
    
    /**
    *  This member belongs to many teamInterests
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function teamInterests()
    {
        // belongsToMany('class','pivot_table','id')->withTimeStamps()
        return $this->belongsToMany('App\Team\Team','R_teams_interests_pivot','member_id','team_id')->withTimestamps();
    }


    /**
     *  This member has many teams
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany('App\Team\Team','R_teams_members_pivot','member_id','team_id')->withTimestamps();
    }
    
    /**
    *  This member belongs to many study_groups
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function studyGroups()
    {
        // belongsToMany('class','pivot_table','id')
        return $this->belongsToMany('App\StudyGroup\StudyGroup','R_study_groups_member_pivot','member_id','study_group_id')->withTimestamps();
    }
    
    /**
     *  This member belongs to a district
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo('App\District\District','district_id');
    }

    /*
        |--------------------------------------------------------------------------
        | HELPER METHODS
        |--------------------------------------------------------------------------
    */


    /**
     * Checks whether the email is found in the user list.
     *
     * @return bool
     */
    public function emailUnique()
    {
        if(User::where('email','=',$this->email)->get()->isEmpty()){
            return true;
        }

        return false;
    }

    /**
     * Initially, we had no way of forcing someone to enter their surname.
     *
     * @return mixed|string
     */
    public function checkLastName()
    {
        if($this->last_name){
            return $this->last_name;
        }
        return '';
    }

    /**
     * Return a dropdown of all active members
     *
     * @param bool|FALSE $is_last_name_first
     *
     * @return array
     */
    public static function memberDropdown($is_last_name_first = FALSE)
    {
        $dropdown = [];
        if($members = static::select('first_name','last_name','id')->orderBy('last_name','asc')->get()){
            foreach($members as $member){
                $dropdown[$member->id] = $member->getFullName($is_last_name_first);
            }
        }
        return $dropdown;
    }

    /**
     * This takes the member parameters and cleans them.
     *
     * @param Member $member
     *
     * @return Member
     */
    public static function cleanMemberInputs(Member $member)
    {
        if(filter_var($member->email, FILTER_VALIDATE_EMAIL)){
            //Valid Email
            $email = trim($member->email);
        }else{
            //Invalid
            $email = null;
        }
        if(!empty($member->mobile)){
            $mobile = trim(preg_replace("/[^0-9,.]/", "", $member->mobile));
        }else{
            $mobile = null;
        }
        $member->update([
            'first_name' => ucwords($member->first_name),
            'last_name' => ucwords($member->last_name),
            'email' => $email,
            'mobile' => $mobile
        ]);

        return $member;
    }


}
