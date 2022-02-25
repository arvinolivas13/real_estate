<?php

namespace App\Http\Controllers;

use Auth;
use App\Leaves;
use Illuminate\Http\Request;
use LaravelJsonApi\Core\Document\Error;

class LeavesController extends Controller
{
    public function save(Request $request) {

        $user_id = Auth::user()->id;
        $leave = array();
        $message = "";
        $check = null;

        if(isset($request->leave_record)) {
            foreach($request->leave_record as $item) {
                $data = array(
                    'leave_type' => $item['leave_type'],
                    'total_hours' => $item['total_hours'],
                    'employee_id' => $item['employee_id'],
                    'created_by' => $user_id
                );

                if($item['id'] === null || $item['id'] === "") {
                    $check = Leaves::where('employee_id', $item['employee_id'])->where('leave_type', $item['leave_type'])->count();
                    if($check === 0) {
                        $insert = Leaves::create($data);
                        array_push($leave, array("id" => $insert->id, "code" => $item['code']));
                    }
                    else {
                        abort(403, 'The leave type was already entered.');
                        $message = "The leave type was already entered.";
                    }
                }
                else {
                    $check = Leaves::where('employee_id', $item['employee_id'])->where('leave_type', $item['leave_type'])->where('id', $item['id'])->count();
                    if($check === 1) {
                        Leaves::where('id', $item['id'])->update($data);
                    }
                    else {
                        abort(403, 'The leave type was already entered.'.$check);
                        $message = "The leave type was already entered.";
                    }
                }
            }
        }
        if(isset($request->delete_item)) {
            if(count($request->delete_item) !== 0) {
                foreach($request->delete_item as $item) {
                    Leaves::where('id', $item['id'])->delete();
                }
            }
        }
        
        return array("data"=>$leave, "check"=>$check);

    }
}
