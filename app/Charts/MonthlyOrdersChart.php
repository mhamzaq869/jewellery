<?php

namespace App\Charts;

use App\Models\Transaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class MonthlyOrdersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $month = DB::table('orders')->selectRaw('MONTHNAME(created_at) as month')->selectRaw('sum(total) as count')->groupBy('month')->orderBy('month')->pluck('month')->toArray();
        $total = DB::table('orders')->selectRaw('MONTHNAME(created_at) as month')->selectRaw('sum(total) as count')->groupBy('month')->orderBy('month')->pluck('count')->toArray();

        return $this->chart->barChart()
            ->addData('Revenue',$total)
            ->setXAxis($month);
    }
}
