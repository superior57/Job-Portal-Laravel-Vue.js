<?php
/**
 * Class Payout.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payout
 *
 */
class Payout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'amount', 'payment_method',
        'currency', 'status',
    ];

    /**
     * Get the user that owns the payout.
     *
     * @return relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
