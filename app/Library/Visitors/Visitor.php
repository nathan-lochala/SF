<?php

namespace App\Visitor;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use SoftDeletes;

    /**
     * Add mass-assignment to model.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    /**
     * Return the statistics of visitors
     *
     * @param string $scope
     *
     * @return array
     */
    public static function statistics($scope = 'all')
    {
        //Return the list of visitors based on scope
        if($scope == 'all'){
            $list = Visitor::all();
        }else{
            try {
                $list = Visitor::$scope()->get();
            } catch (Exception $e) {
                $list = Visitor::all();
                flash()->error('Caught exception: ' . $e->getMessage());
            }
        }


        //Return the counts
        $all_count = Visitor::all()->count();
        $today_count = Visitor::today()->get()->count();
        $previous_count = Visitor::previousSunday()->get()->count();

        return [
            'all_count' => $all_count,
            'today_count' => $today_count,
            'previous_count' => $previous_count,
            'list' => $list
        ];
    }

    /**
     * Today's Visitors query scope
     *
     * @param $query
     *
     */
    public function scopeToday($query)
    {
        $query->where('created_at','>=',Carbon::today());
    }

    /**
     * PreviousSunday query scope
     *
     * @param $query
     *
     * @internal param $parameter1
     */
    public function scopePreviousSunday($query)
    {
        $query->where('created_at','>=',Carbon::now()->previous(Carbon::SUNDAY));
        $query->where('created_at','<=',Carbon::now()->previous(Carbon::MONDAY));
    }

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
     * Return the visitor's fullname.
     *
     * @param bool|FALSE $is_last_name_first
     *
     * @return string
     * @internal param bool $make_url
     *
     */
    public function getFullName($is_last_name_first = FALSE)
    {
        $name = $this->first_name . ' ' . $this->last_name;

        if($is_last_name_first){
            $name = $this->last_name . ', ' . $this->first_name;
        }

        return $name;
    }

    /**
     * This takes the visitor parameters and cleans them.
     *
     * @param Visitor $visitor
     *
     * @return Visitor
     *
     */
    public static function cleanVisitorInputs(Visitor $visitor)
    {
        if(filter_var($visitor->email, FILTER_VALIDATE_EMAIL)){
            //Valid Email
            $email = trim($visitor->email);
        }else{
            //Invalid
            $email = null;
        }
        $visitor->update([
            'first_name' => ucwords($visitor->first_name),
            'last_name' => ucwords($visitor->last_name),
            'email' => $email
        ]);

        return $visitor;
    }
}
