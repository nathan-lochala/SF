<?php

namespace App\Member;

use Illuminate\Database\Eloquent\Model;

class PrintList extends Model
{
    /**
     * The database table (members_print_card) used by the model.
     *
     * @var string
     */
    protected $table = 'members_print_card';

    /**
     * Add mass-assignment to model.
     *
     * @var array
     */
    protected $fillable = [
        'member_id'
    ];
    
    /**
     *  This PrintList belongs to a member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Member\Member','member_id');
    }
}
