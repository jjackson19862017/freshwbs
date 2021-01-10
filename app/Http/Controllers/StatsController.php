<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transactions;
use App\Models\WedEvents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class StatsController extends Controller
{
    //
    public function index(){
        $data = [];
        // Variables for the Queries
        $weekAgo = Carbon::today()->subWeek();
        $monthAgo = Carbon::today()->subMonth();
        $yearAgo = Carbon::today()->subYear();

        // New Entries Customers
        $data['newWeeklyCustomers'] = Customer::where('created_at', '>=', $weekAgo)->get(); //  Get the Customers Created in the last Week.
        $data['newMonthlyCustomers'] = Customer::where('created_at', '>=', $monthAgo)->get(); //  Get the Customers Created in the last Month.
        $data['newYearlyCustomers'] = Customer::where('created_at', '>=', $yearAgo)->get(); //  Get the Customers Created in the last Year.

        // New Entries Events
        $data['newWeeklyEvents'] = WedEvents::where('created_at', '>=', $weekAgo)->get(); //  Get the WedEvents Created in the last Week.
        $data['newMonthlyEvents'] = WedEvents::where('created_at', '>=', $monthAgo)->get(); //  Get the WedEvents Created in the last Month.
        $data['newYearlyEvents'] = WedEvents::where('created_at', '>=', $yearAgo)->get(); //  Get the WedEvents Created in the last Year.

        // New Entries Customers
        $data['newMonthlyCompletedEvents'] = WedEvents::where('created_at', '>=', $monthAgo)->where('completed','=','Yes')->get(); //  Get the WedEvents Completed in the last Month.
        $data['newYearlyCompletedEvents'] = WedEvents::where('created_at', '>=', $yearAgo)->where('completed','=','Yes')->get(); //  Get the WedEvents Completed in the last Year.

        // New Sales
        $data['newWeeklySales'] = WedEvents::where('created_at', '>=', $weekAgo)->sum('cost'); //  Get the WedEvents Created in the last Week.
        $data['newMonthlySales'] = WedEvents::where('created_at', '>=', $monthAgo)->sum('cost'); //  Get the WedEvents Created in the last Month.
        $data['newYearlySales'] = WedEvents::where('created_at', '>=', $yearAgo)->sum('cost'); //  Get the WedEvents Created in the last Year.

        // The Current Year
        $data['currentYear'] = Carbon::createFromDate(null)->format('Y');
        $data['backOneYear'] = $data['currentYear'] - 1;
        $data['backTwoYear'] = $data['currentYear'] - 2;

        // Events from This Year going back 2 years
        $data['thisYearsEvents'] = WedEvents::where('created_at', '>=', Carbon::create(null,1,1,0,0,0))->where('created_at', '<=', Carbon::create(null,12,31,23,59,59))->get();
        $data['backOneYearsEvents'] = WedEvents::where('created_at', '>=', Carbon::create($data['backOneYear'],1,1,0,0,0))->where('created_at', '<=', Carbon::create($data['backOneYear'],12,31,23,59,59))->get();
        $data['backTwoYearsEvents'] = WedEvents::where('created_at', '>=', Carbon::create($data['backTwoYear'],1,1,0,0,0))->where('created_at', '<=', Carbon::create($data['backTwoYear'],12,31,23,59,59))->get();

        // Total Sales from This Year going back 2 years
        $data['thisYearsSales'] = WedEvents::where('created_at', '>=', Carbon::create(null,1,1,0,0,0))->where('created_at', '<=', Carbon::create(null,12,31,23,59,59))->sum('cost');
        $data['backOneYearsSales'] = WedEvents::where('created_at', '>=', Carbon::create($data['backOneYear'],1,1,0,0,0))->where('created_at', '<=', Carbon::create($data['backOneYear'],12,31,23,59,59))->sum('cost');
        $data['backTwoYearsSales'] = WedEvents::where('created_at', '>=', Carbon::create($data['backTwoYear'],1,1,0,0,0))->where('created_at', '<=', Carbon::create($data['backTwoYear'],12,31,23,59,59))->sum('cost');

        // Average Sales from This Year going back 2 years
        $data['thisYearsAvgSales'] = WedEvents::where('created_at', '>=', Carbon::create(null,1,1,0,0,0))->where('created_at', '<=', Carbon::create(null,12,31,23,59,59))->avg('cost');
        $data['backOneYearsAvgSales'] = WedEvents::where('created_at', '>=', Carbon::create($data['backOneYear'],1,1,0,0,0))->where('created_at', '<=', Carbon::create($data['backOneYear'],12,31,23,59,59))->avg('cost');
        $data['backTwoYearsAvgSales'] = WedEvents::where('created_at', '>=', Carbon::create($data['backTwoYear'],1,1,0,0,0))->where('created_at', '<=', Carbon::create($data['backTwoYear'],12,31,23,59,59))->avg('cost');

        return view('admin.stats.index', $data);
    }

    public function breakdown(){
        $data = [];

        // The Current Year
        $data['currentYear'] = Carbon::createFromDate(null)->format('Y');
        $data['backOneYear'] = $data['currentYear'] - 1;
        $data['backTwoYear'] = $data['currentYear'] - 2;

        //Current Year Query Variables
        $currentJanStart = Carbon::create($data['currentYear'],1)->startOfMonth();
        $currentFebStart = Carbon::create($data['currentYear'],2)->startOfMonth();
        $currentMarStart = Carbon::create($data['currentYear'],3)->startOfMonth();
        $currentAprStart = Carbon::create($data['currentYear'],4)->startOfMonth();
        $currentMayStart = Carbon::create($data['currentYear'],5)->startOfMonth();
        $currentJunStart = Carbon::create($data['currentYear'],6)->startOfMonth();
        $currentJulStart = Carbon::create($data['currentYear'],7)->startOfMonth();
        $currentAugStart = Carbon::create($data['currentYear'],8)->startOfMonth();
        $currentSepStart = Carbon::create($data['currentYear'],9)->startOfMonth();
        $currentOctStart = Carbon::create($data['currentYear'],10)->startOfMonth();
        $currentNovStart = Carbon::create($data['currentYear'],11)->startOfMonth();
        $currentDecStart = Carbon::create($data['currentYear'],12)->startOfMonth();
        $currentJanEnd = Carbon::create($data['currentYear'],1)->endOfMonth();
        $currentFebEnd = Carbon::create($data['currentYear'],2)->endOfMonth();
        $currentMarEnd = Carbon::create($data['currentYear'],3)->endOfMonth();
        $currentAprEnd = Carbon::create($data['currentYear'],4)->endOfMonth();
        $currentMayEnd = Carbon::create($data['currentYear'],5)->endOfMonth();
        $currentJunEnd = Carbon::create($data['currentYear'],6)->endOfMonth();
        $currentJulEnd = Carbon::create($data['currentYear'],7)->endOfMonth();
        $currentAugEnd = Carbon::create($data['currentYear'],8)->endOfMonth();
        $currentSepEnd = Carbon::create($data['currentYear'],9)->endOfMonth();
        $currentOctEnd = Carbon::create($data['currentYear'],10)->endOfMonth();
        $currentNovEnd = Carbon::create($data['currentYear'],11)->endOfMonth();
        $currentDecEnd = Carbon::create($data['currentYear'],12)->endOfMonth();

        $data['janThisYearSales'] = WedEvents::where('created_at', '>=', $currentJanStart)->where('created_at', '<=',$currentJanEnd)->sum('cost');
        $data['febThisYearSales'] = WedEvents::where('created_at', '>=', $currentFebStart)->where('created_at', '<=',$currentFebEnd)->sum('cost');
        $data['marThisYearSales'] = WedEvents::where('created_at', '>=', $currentMarStart)->where('created_at', '<=',$currentMarEnd)->sum('cost');
        $data['aprThisYearSales'] = WedEvents::where('created_at', '>=', $currentAprStart)->where('created_at', '<=',$currentAprEnd)->sum('cost');
        $data['mayThisYearSales'] = WedEvents::where('created_at', '>=', $currentMayStart)->where('created_at', '<=',$currentMayEnd)->sum('cost');
        $data['junThisYearSales'] = WedEvents::where('created_at', '>=', $currentJunStart)->where('created_at', '<=',$currentJunEnd)->sum('cost');
        $data['julThisYearSales'] = WedEvents::where('created_at', '>=', $currentJulStart)->where('created_at', '<=',$currentJulEnd)->sum('cost');
        $data['augThisYearSales'] = WedEvents::where('created_at', '>=', $currentAugStart)->where('created_at', '<=',$currentAugEnd)->sum('cost');
        $data['sepThisYearSales'] = WedEvents::where('created_at', '>=', $currentSepStart)->where('created_at', '<=',$currentSepEnd)->sum('cost');
        $data['octThisYearSales'] = WedEvents::where('created_at', '>=', $currentOctStart)->where('created_at', '<=',$currentOctEnd)->sum('cost');
        $data['novThisYearSales'] = WedEvents::where('created_at', '>=', $currentNovStart)->where('created_at', '<=',$currentNovEnd)->sum('cost');
        $data['decThisYearSales'] = WedEvents::where('created_at', '>=', $currentDecStart)->where('created_at', '<=',$currentDecEnd)->sum('cost');

        //Last Year Query Variables
        $backOneJanStart = Carbon::create($data['backOneYear'],1)->startOfMonth();
        $backOneFebStart = Carbon::create($data['backOneYear'],2)->startOfMonth();
        $backOneMarStart = Carbon::create($data['backOneYear'],3)->startOfMonth();
        $backOneAprStart = Carbon::create($data['backOneYear'],4)->startOfMonth();
        $backOneMayStart = Carbon::create($data['backOneYear'],5)->startOfMonth();
        $backOneJunStart = Carbon::create($data['backOneYear'],6)->startOfMonth();
        $backOneJulStart = Carbon::create($data['backOneYear'],7)->startOfMonth();
        $backOneAugStart = Carbon::create($data['backOneYear'],8)->startOfMonth();
        $backOneSepStart = Carbon::create($data['backOneYear'],9)->startOfMonth();
        $backOneOctStart = Carbon::create($data['backOneYear'],10)->startOfMonth();
        $backOneNovStart = Carbon::create($data['backOneYear'],11)->startOfMonth();
        $backOneDecStart = Carbon::create($data['backOneYear'],12)->startOfMonth();
        $backOneJanEnd = Carbon::create($data['backOneYear'],1)->endOfMonth();
        $backOneFebEnd = Carbon::create($data['backOneYear'],2)->endOfMonth();
        $backOneMarEnd = Carbon::create($data['backOneYear'],3)->endOfMonth();
        $backOneAprEnd = Carbon::create($data['backOneYear'],4)->endOfMonth();
        $backOneMayEnd = Carbon::create($data['backOneYear'],5)->endOfMonth();
        $backOneJunEnd = Carbon::create($data['backOneYear'],6)->endOfMonth();
        $backOneJulEnd = Carbon::create($data['backOneYear'],7)->endOfMonth();
        $backOneAugEnd = Carbon::create($data['backOneYear'],8)->endOfMonth();
        $backOneSepEnd = Carbon::create($data['backOneYear'],9)->endOfMonth();
        $backOneOctEnd = Carbon::create($data['backOneYear'],10)->endOfMonth();
        $backOneNovEnd = Carbon::create($data['backOneYear'],11)->endOfMonth();
        $backOneDecEnd = Carbon::create($data['backOneYear'],12)->endOfMonth();

        $data['janBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneJanStart)->where('created_at', '<=',$backOneJanEnd)->sum('cost');
        $data['febBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneFebStart)->where('created_at', '<=',$backOneFebEnd)->sum('cost');
        $data['marBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneMarStart)->where('created_at', '<=',$backOneMarEnd)->sum('cost');
        $data['aprBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneAprStart)->where('created_at', '<=',$backOneAprEnd)->sum('cost');
        $data['mayBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneMayStart)->where('created_at', '<=',$backOneMayEnd)->sum('cost');
        $data['junBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneJunStart)->where('created_at', '<=',$backOneJunEnd)->sum('cost');
        $data['julBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneJulStart)->where('created_at', '<=',$backOneJulEnd)->sum('cost');
        $data['augBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneAugStart)->where('created_at', '<=',$backOneAugEnd)->sum('cost');
        $data['sepBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneSepStart)->where('created_at', '<=',$backOneSepEnd)->sum('cost');
        $data['octBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneOctStart)->where('created_at', '<=',$backOneOctEnd)->sum('cost');
        $data['novBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneNovStart)->where('created_at', '<=',$backOneNovEnd)->sum('cost');
        $data['decBackOneYearSales'] = WedEvents::where('created_at', '>=', $backOneDecStart)->where('created_at', '<=',$backOneDecEnd)->sum('cost');


        //Two Years ago Query Variables
        $backTwoJanStart = Carbon::create($data['backTwoYear'],1)->startOfMonth();
        $backTwoFebStart = Carbon::create($data['backTwoYear'],2)->startOfMonth();
        $backTwoMarStart = Carbon::create($data['backTwoYear'],3)->startOfMonth();
        $backTwoAprStart = Carbon::create($data['backTwoYear'],4)->startOfMonth();
        $backTwoMayStart = Carbon::create($data['backTwoYear'],5)->startOfMonth();
        $backTwoJunStart = Carbon::create($data['backTwoYear'],6)->startOfMonth();
        $backTwoJulStart = Carbon::create($data['backTwoYear'],7)->startOfMonth();
        $backTwoAugStart = Carbon::create($data['backTwoYear'],8)->startOfMonth();
        $backTwoSepStart = Carbon::create($data['backTwoYear'],9)->startOfMonth();
        $backTwoOctStart = Carbon::create($data['backTwoYear'],10)->startOfMonth();
        $backTwoNovStart = Carbon::create($data['backTwoYear'],11)->startOfMonth();
        $backTwoDecStart = Carbon::create($data['backTwoYear'],12)->startOfMonth();
        $backTwoJanEnd = Carbon::create($data['backTwoYear'],1)->endOfMonth();
        $backTwoFebEnd = Carbon::create($data['backTwoYear'],2)->endOfMonth();
        $backTwoMarEnd = Carbon::create($data['backTwoYear'],3)->endOfMonth();
        $backTwoAprEnd = Carbon::create($data['backTwoYear'],4)->endOfMonth();
        $backTwoMayEnd = Carbon::create($data['backTwoYear'],5)->endOfMonth();
        $backTwoJunEnd = Carbon::create($data['backTwoYear'],6)->endOfMonth();
        $backTwoJulEnd = Carbon::create($data['backTwoYear'],7)->endOfMonth();
        $backTwoAugEnd = Carbon::create($data['backTwoYear'],8)->endOfMonth();
        $backTwoSepEnd = Carbon::create($data['backTwoYear'],9)->endOfMonth();
        $backTwoOctEnd = Carbon::create($data['backTwoYear'],10)->endOfMonth();
        $backTwoNovEnd = Carbon::create($data['backTwoYear'],11)->endOfMonth();
        $backTwoDecEnd = Carbon::create($data['backTwoYear'],12)->endOfMonth();

        $data['janBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoJanStart)->where('created_at', '<=',$backTwoJanEnd)->sum('cost');
        $data['febBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoFebStart)->where('created_at', '<=',$backTwoFebEnd)->sum('cost');
        $data['marBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoMarStart)->where('created_at', '<=',$backTwoMarEnd)->sum('cost');
        $data['aprBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoAprStart)->where('created_at', '<=',$backTwoAprEnd)->sum('cost');
        $data['mayBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoMayStart)->where('created_at', '<=',$backTwoMayEnd)->sum('cost');
        $data['junBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoJunStart)->where('created_at', '<=',$backTwoJunEnd)->sum('cost');
        $data['julBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoJulStart)->where('created_at', '<=',$backTwoJulEnd)->sum('cost');
        $data['augBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoAugStart)->where('created_at', '<=',$backTwoAugEnd)->sum('cost');
        $data['sepBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoSepStart)->where('created_at', '<=',$backTwoSepEnd)->sum('cost');
        $data['octBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoOctStart)->where('created_at', '<=',$backTwoOctEnd)->sum('cost');
        $data['novBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoNovStart)->where('created_at', '<=',$backTwoNovEnd)->sum('cost');
        $data['decBackTwoYearSales'] = WedEvents::where('created_at', '>=', $backTwoDecStart)->where('created_at', '<=',$backTwoDecEnd)->sum('cost');

        //dd($data['marThisYearSales']);
        return view('admin.stats.breakdown', $data);
    }

    public function transaction(){
        $data = [];
        $data['wedevents'] = WedEvents::orderBy('weddingdate', 'asc')->get();

        // Transactions Table
        foreach($data['wedevents'] as $event) {
        $event->transactions = Transactions::where('wedevent_id', '=', $event->id)->get(); // Returns Transactions based on each Event
        $event->tCount = $event->transactions->count(); // Counts Transactions
        $event->paid = $event->transactions->sum('amount'); // Adds all the payments up
        $event->out = $event->cost - $event->paid; // Calculates outstanding payments
        $event->percentage = (100/$event->cost) * $event->paid; // Calculates the percentage paid
        if($event->onhold == "Yes") {
            $event->progress = $event->progress + 20;
        };
        if($event->agreementsigned == "Yes") {
            $event->progress = $event->progress + 20;
        };
        if($event->deposittaken == "Yes") {
            $event->progress = $event->progress + 20;
        };
        if($event->quarterpaymenttaken == "Yes") {
            $event->progress = $event->progress + 20;
        };
        if($event->hadfinaltalk == "Yes") {
            $event->progress = $event->progress + 20;
        };
        }


        // Breakdown Cards
        // From the Beginning
        $data['purchased'] = WedEvents::pluck('cost')->sum();
        $data['paid'] = Transactions::pluck('amount')->sum();
        $data['outstanding'] = $data['purchased'] - $data['paid'];
        $data['percentage'] = (100/$data['purchased']) * $data['paid'];


        // The Current Year
        $data['currentYear'] = Carbon::createFromDate(null)->format('Y');
        $data['upcomingYears'] = $data['currentYear'] + 1;

        // This Year
        $data['purchasedThisYear'] = WedEvents::where('contractissueddate', '>=', Carbon::create(null,1,1,0,0,0))->where('contractissueddate', '<=', Carbon::create(null,12,31,23,59,59))->pluck('cost')->sum();
        $data['paidThisYear'] = Transactions::where('created_at', '>=', Carbon::create(null,1,1,0,0,0))->where('created_at', '<=', Carbon::create(null,12,31,23,59,59))->pluck('amount')->sum();
        $data['outstandingThisYear'] = $data['purchasedThisYear'] - $data['paidThisYear'];
        $data['percentageThisYear'] = (100/$data['purchasedThisYear']) * $data['paidThisYear'];


        // Upcoming Years
        $data['purchasedUpcomingYears'] = WedEvents::where('contractissueddate', '>=', Carbon::create($data['upcomingYears'],1,1,0,0,0))->pluck('cost')->sum();
        $data['paidUpcomingYears'] = Transactions::where('created_at', '>=', Carbon::create($data['upcomingYears'],1,1,0,0,0))->pluck('amount')->sum();
        $data['outstandingUpcomingYears'] = $data['purchasedUpcomingYears'] - $data['paidUpcomingYears'];
        $data['percentageUpcomingYears'] = (100/$data['purchasedUpcomingYears']) * $data['paidUpcomingYears'];






        // Next Year


//dd(Transactions::where('wedevent_id', '=', 1)->get());


        return view('admin.stats.transaction', $data);
    }

}
