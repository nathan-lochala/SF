<?php

namespace App\District;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{

    use SoftDeletes;

    /*
        |--------------------------------------------------------------------------
        | District::create([
            'name' => 'Futian',
            'chinese' => '福田区'
        ]);

        District::create([
            'name' => 'Luohu',
            'chinese' => '罗湖区'
        ]);

        District::create([
            'name' => 'Nanshan',
            'chinese' => '南山区'
        ]);

        District::create([
            'name' => 'Shekou',
            'chinese' => '蛇口'
        ]);

        District::create([
            'name' => 'Bao\'an',
            'chinese' => '宝安区'
        ]);

        District::create([
            'name' => 'Hong Kong',
            'chinese' => '香港'
        ]);
        |--------------------------------------------------------------------------
    */


    
    /**
     * Add mass-assignment to model.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'chinese'
    ];
    
    /**
     * The database table (R_districts) used by the model.
     *
     * @var string
     */
    protected $table = 'R_districts';

    /**
     *  This district has many members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany('App\Member\Member','member_id');
    }

    /**
     *  This district has many study groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyGroups()
    {
        return $this->hasMany('App\StudyGroup\StudyGroup','study_group_id');
    }

    /**
     * Return a pre-formatted name
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->name . ' - ' . $this->chinese;
    }


    /**
     * Get a dropdown list of all the districts
     *
     * @return array
     */
    public static function districtDropdown()
    {
        $dropdown = [];
        $districts = static::all();
        foreach($districts as $district){
            $dropdown[$district->id] = $district->name . ' - ' . $district->chinese;
        }

        return $dropdown;
    }
}
