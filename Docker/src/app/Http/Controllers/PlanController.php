<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('user')->latest()->get();
        return Inertia::render('Plans/Index', [
            'plans' => $plans,
        ]);
    }
}
