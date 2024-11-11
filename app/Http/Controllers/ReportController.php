<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Sales Funnel
        $funnelData = Sale::select(DB::raw('COUNT(*) as count, status'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        // Customer Lifetime Value (LTV)
        $ltvData = Sale::select(DB::raw('contact_id, SUM(amount) as lifetime_value'))
            ->groupBy('contact_id')
            ->with('contact')
            ->get();

        // Customer Segmentation
        $segmentationData = [
            'high' => $ltvData->where('lifetime_value', '>=', 5000)->count(),
            'medium' => $ltvData->where('lifetime_value', '>=', 2000)->where('lifetime_value', '<', 5000)->count(),
            'low' => $ltvData->where('lifetime_value', '<', 2000)->count()
        ];

        return view('reports.index', compact('funnelData', 'ltvData', 'segmentationData'));
    }
}
