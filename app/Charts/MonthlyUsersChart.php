<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\RadarChart;
use App\Charts\LarapexChart;


class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        return $this->chart->radarChart()
            ->setTitle('Individual Player Stats.')
            ->setSubtitle('Season 2021.')
            ->addData('Stats', [70, 93, 78, 97, 50, 90])
            ->setXAxis(['Pass', 'Dribble', 'Shot', 'Stamina', 'Long shots', 'Tactical'])
            ->setMarkers(['#303F9F'], 7, 10);
    }
}
