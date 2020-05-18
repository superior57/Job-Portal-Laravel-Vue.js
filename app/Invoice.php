<?php
/**
 * Class Invoice
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
 * Class Invoice
 *
 */
class Invoice extends Model
{

    /**
     * Set scope of the variables
     *
     * @access public
     *
     * @return array
     */
    protected $fillable = ['title', 'price', 'paid'];
    protected $dates = ['created_at'];

    /**
     * Items
     *
     * @access public
     *
     * @return array
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'invoice_id');
    }

    
    /**
     * Items
     *
     * @access public
     *
     * @return array
     */
    public function order()
    {
        return $this->hasOne(Order::class, 'invoice_id');
    }
}
