<?php 
// Code within app\Helpers\Helper.php
use Illuminate\Support\Facades\DB;
use App\Models\Tracking;

//use DB;

	function getCount($hour, $admin)
	{
		$data =Tracking::select(DB::raw("count('name') as profile "))
			->where(DB::raw('HOUR(start_time)'), '=', $hour)
	        ->where('updated_by', '=', $admin)
            ->count();

		return $data;
	}
	 
	function getAvg($hour, $admin)
	{
		$data =Tracking::select(DB::raw("avg(MINUTE(TIMEDIFF(`end_time`, `start_time`))) as avg"))
			->where(DB::raw('HOUR(start_time)'), '=', $hour)
	        ->where('updated_by', '=', $admin)
            ->get();
        if($data[0]->avg == null) {
        	return $avg = 0;
        } else {
        	return $data[0]->avg;
        }
		
	}

	function getProductivity($hour, $admin)
	{
		$data =Tracking::select(DB::raw("count('name') as profile, avg(MINUTE(TIMEDIFF(`end_time`, `start_time`))) as avg"))
			->where(DB::raw('HOUR(start_time)'), '=', $hour)
	        ->where('updated_by', '=', $admin)
            ->get();
        if($data[0]->profile == null) {
        	return $avg = 0;
        } else {
        	return ($data[0]->profile * $data[0]->avg) / 60;
        }
		
	}
	 