<?php

namespace App\Services;

use App\Models\User;
use App\Models\LoyaltyPoint;
use App\Models\Voucher;
use Illuminate\Support\Str;

class LoyaltyService
{
    public static function addPoints(User $user, int $points, string $description, $referenceType = null, $referenceId = null)
    {
        LoyaltyPoint::create([
            'user_id' => $user->id,
            'points' => $points,
            'type' => 'earn',
            'description' => $description,
            'reference_type' => $referenceType,
            'reference_id' => $referenceId,
        ]);
    }

    public static function deductPoints(User $user, int $points, string $description)
    {
        LoyaltyPoint::create([
            'user_id' => $user->id,
            'points' => -$points,
            'type' => 'redeem',
            'description' => $description,
        ]);
    }

    public static function getUserBalance(User $user)
    {
        return LoyaltyPoint::where('user_id', $user->id)->sum('points');
    }

    public static function generateVoucher(User $user, int $pointsCost, float $discountAmount)
    {
        $code = 'SHOP' . strtoupper(Str::random(8));
        
        $voucher = Voucher::create([
            'user_id' => $user->id,
            'code' => $code,
            'discount_amount' => $discountAmount,
            'points_cost' => $pointsCost,
            'expires_at' => now()->addDays(30),
        ]);

        self::deductPoints($user, $pointsCost, 'Redeemed voucher: ' . $code);

        return $voucher;
    }
}
