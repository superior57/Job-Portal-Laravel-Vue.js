<?php
/**
 * Class Report
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
use App\Proposal;
use DB;

/**
 * Class Report
 *
 */
class Report extends Model
{
    /**
     * Get all of the owning commentable models.
     *
     * @return polymorphic relation
     */
    public function reportable()
    {
        return $this->morphTo();
    }

    /**
     * Submit Report
     *
     * @param mixed $request req->attr
     *
     * @return request\response
     */
    public static function submitReport($request)
    {
        if (!empty($request['id'])) {
            $model = $request['model']::find($request['id']);
            if ($request['report_type'] == 'proposal_cancel') {
                $model->status = 'posted';
                $model->save();
                $proposal = Proposal::find($request['proposal_id']);
                $proposal->status = 'Cancelled';
                $proposal->save();
                $report = new Report;
                $report->reason = filter_var($request['reason'], FILTER_SANITIZE_STRING);
                $report->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
                $model->reports()->save($report);
                return 'success';

            } elseif ($request['report_type'] == 'service_cancel') {
                DB::table('service_user')
                    ->where('id', $request['pivot_id'])
                    ->where('user_id', $request['employer_id'])
                    ->update(['status' => 'cancelled']); 
                $report = new Report;
                $report->reason = filter_var($request['reason'], FILTER_SANITIZE_STRING);
                $report->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
                $report->reportable_id = $request['pivot_id'];
                $report->reportable_type = 'App\Service';
                $report->save();
                return 'success';
            } else {
                $report = new Report;
                $report->reason = filter_var($request['reason'], FILTER_SANITIZE_STRING);
                $report->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
                $model->reports()->save($report);
                return 'success';
            }
        }
    }
}
