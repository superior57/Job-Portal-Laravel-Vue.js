<?php
/**
 * Class Item
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
 * Class Item
 *
 */
class Item extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Set invoice relation
     *
     * @access public
     *
     * @return array
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Set user relation
     *
     * @access public
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
