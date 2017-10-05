<?php

namespace App\Http\Controllers\Frontend\Rest;

use Spatie\Analytics\Period;
use Analytics;
use Carbon\Carbon;

/**
 * Description of AnalyticsCtrl
 *
 * @author Minh
 */
class AnalyticsCtrl {

    /** @test */
    public function getTotalVisitors() {
        $data = array(
            'visitorsToday' => 0,
            'visitorsWeek' => 0,
            'visitorsMounth' => 0,
            'visitorsTotal' => 0,
        );
        $day_week = date('w');
        $day_mounth = (int) date('d') - 1;
        $arr_today = Analytics::fetchVisitorsAndPageViews(Period::days(1));
        foreach ($arr_today as $values) {
            $data['visitorsToday'] += (int) $values['pageViews'];
        }
        $arr_week = Analytics::fetchVisitorsAndPageViews(Period::days($day_week));
        foreach ($arr_week as $values) {
            $data['visitorsWeek'] += (int) $values['pageViews'];
        }
        $arr_mounth = Analytics::fetchVisitorsAndPageViews(Period::days($day_mounth));
        foreach ($arr_mounth as $values) {
            $data['visitorsMounth'] += (int) $values['pageViews'];
        }
        $arr_total = Analytics::fetchVisitorsAndPageViews(Period::days(1000));
        foreach ($arr_total as $values) {
            $data['visitorsTotal'] += (int) $values['pageViews'];
        }
        echo json_encode($data);
    }

}
