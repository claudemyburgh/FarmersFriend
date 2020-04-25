<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{


    public function listings()
    {
        $day1 = Carbon::parse('now')->subDays(30)->startOfDay();
        $day2 = Carbon::parse('now')->endOfDay();

        $listings = request()->user()->listings()->isLive()->select($this->querySelect())
            ->whereBetween('created_at', [$day1, $day2])
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        return $this->dataLoop($listings);
    }


    public function unpublished_listings(Listing $listings)
    {

    }


    /**
     * @param $model
     * @return \Illuminate\Http\JsonResponse
     */
    protected function dataLoop($model) {

        $labels = [];
        $rows = [];

        foreach ($model as $mod) {
            $labels[] = $mod->date;
            $rows[] = $mod->count;
        }

        $data = [
            'labels' => $labels,
            'rows' => $rows
        ];

        return  response()->json(['data' => $data]);
    }

    /**
     * @return array
     */
    protected function querySelect($type = 'created_at') {
        return [ DB::raw("count(id) as count, DATE_FORMAT($type, '%d %M') as date") ];
    }



}
