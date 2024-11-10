<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Contact;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        // Calculate Sales Funnel
        $funnelData = Sale::select(DB::raw('COUNT(*) as count, status'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        // Calculate Customer Lifetime Value (LTV) - assuming it's total sales per customer
        $ltvData = Sale::select(DB::raw('contact_id, SUM(amount) as lifetime_value'))
            ->groupBy('contact_id')
            ->with('contact')
            ->get();

        // Customer Segmentation - basic segmentation based on total sales amount
        $segmentationData = [
            'high' => $ltvData->where('lifetime_value', '>=', 5000)->count(),
            'medium' => $ltvData->where('lifetime_value', '>=', 2000)->where('lifetime_value', '<', 5000)->count(),
            'low' => $ltvData->where('lifetime_value', '<', 2000)->count()
        ];

        return view('reports.index', compact('funnelData', 'ltvData', 'segmentationData'));
    }
}
