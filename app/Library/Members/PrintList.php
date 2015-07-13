<?php

namespace App\Member;

use Carbon\Carbon;
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
        'member_id',
        'printed_at',
        'received_at',
        'created_at'
    ];

    /*
        |--------------------------------------------------------------------------
        | RELATIONSHIPS
        |--------------------------------------------------------------------------
    */


    /**
     *  This PrintList belongs to a member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Member\Member','member_id');
    }
    
    /*
        |--------------------------------------------------------------------------
        | SCOPES
        |--------------------------------------------------------------------------
    */
    

    /**
     * Print query scope
     * This returns all the ID Cards that HAVE NOT YET been printed.
     *
     * @param $query
     *
     * @internal param $parameter1
     */
    public function scopePrinting($query)
    {
        $query->whereNull('printed_at');
    }

    /**
     * Received query scope
     * This returns all the ID Cards that NEED TO BE DELIVERED TO MEMBERS
     *
     * @param $query
     */
    public function scopeReceiving($query)
    {
        $query->whereNull('received_at')
            ->whereNotNull('printed_at');
    }
    
    /*
        |--------------------------------------------------------------------------
        | PROCESS METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * Mark an ID Card as Printed
     *
     * @return $this
     */
    public function printed()
    {
        $this->update([
            'printed_at' => Carbon::now()
        ]);

        return $this;
    }

    /**
     * Mark an ID Card as Delivered
     *
     * @return $this
     */
    public function received()
    {
        $this->update([
            'received_at' => Carbon::now()
        ]);

        return $this;
    }

    /**
     * Mark an ID Card as Needing to be RePrinted
     *
     * @return $this
     */
    public function reprint()
    {
        $this->update([
            'created_at' => Carbon::now(),
            'printed_at' => null,
            'received_at' => null
        ]);

        return $this;
    }

}
