<?php

namespace App\Http\Controllers;

use App\Services\LoyaltyService;
use App\Models\LoyaltyPoint;
use App\Models\Voucher;
use Illuminate\Http\Request;

class LoyaltyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $balance = LoyaltyService::getUserBalance($user);
        $history = LoyaltyPoint::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $vouchers = Voucher::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('loyalty.index', compact('balance', 'history', 'vouchers'));
    }

    public function redeem(Request $request)
    {
        $user = auth()->user();
        $balance = LoyaltyService::getUserBalance($user);
        
        $rewards = [
            1000 => 10000,
            5000 => 60000,
            10000 => 150000,
        ];

        $pointsCost = (int) $request->points;
        
        if (!isset($rewards[$pointsCost])) {
            return back()->with('error', 'Invalid reward selection');
        }

        if ($balance < $pointsCost) {
            return back()->with('error', 'Insufficient points');
        }

        $voucher = LoyaltyService::generateVoucher($user, $pointsCost, $rewards[$pointsCost]);

        return back()->with('success', 'Voucher generated successfully! Code: ' . $voucher->code);
    }
}
