<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Schedules;
use Inertia\Inertia;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('user')->latest()->get();
        $schedules = Schedules::with('plan')->get();
        return Inertia::render('Plans/Index', [
            'plans' => $plans,
            'schedules' => $schedules,
        ]);
    }
}
