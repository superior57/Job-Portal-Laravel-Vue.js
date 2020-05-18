<?php
/**
 * Class IPNStatus
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
 * Class IPNStatus
 *
 */
class IPNStatus extends Model
{
    /**
     * Set scope of the variable
     *
     * @access public
     *
     * @return array
     */
    protected $table = 'ipn_status';

    /**
     * Set scope of the variable
     *
     * @access public
     *
     * @return array
     */
    protected $fillable = [
        'payload',
        'status'
    ];
}
