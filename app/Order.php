<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Order extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     * @var    array $fillable
     */
    protected $fillable = array(
        'user_id', 'product_id', 'invoice_id', 'status'
    );

    /**
     * Protected Date
     *
     * @access protected
     * @var    array $dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the order that owns the invoice.
     *
     * @return relation
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    /**
     * Store record in order storage
     *
     * @param int $id $     FreelancerID
     * @param int $product_id product_id
     *
     * @return \Illuminate\Http\Response
     */
    public function saveOrder($id, $product_id, $type)
    {
        $json = array();
        if ($type == 'service') {
            $service = Service::find($product_id);
            $seller = Helper::getServiceSeller($service->id);
            $service_order_id = DB::table('service_user')->insertGetId(
                ['service_id' => $product_id, 'user_id' => Auth::user()->id, 'type' => 'employer', 'status' => 'pending', 'seller_id' => $seller->user_id, 'paid' => 'pending']
            );
            $this->user_id = $id;
            $this->product_id = $service_order_id;
            $this->status = 'pending';
            $this->type = $type;
            $this->save();
            $json['service_order'] = $service_order_id;
            $json['id'] = $this->id;
            return $json;
        } else {
            $this->user_id = $id;
            $this->product_id = $product_id;
            $this->status = 'pending';
            $this->type = $type;
            $this->save();
            $json['id'] = $this->id;
            return $json;
        }
    }
}
