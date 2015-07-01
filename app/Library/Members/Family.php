<?php

namespace App\Member;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /**
     * The database table (families) used by the model.
     *
     * @var string
     */
    protected $table = 'families';

    /**
     *  This Family has many members
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany('App\Member\Member','family_id');
    }
}
