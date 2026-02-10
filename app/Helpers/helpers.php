<?php

use App\Models\User;

if (!function_exists('user_display_name')) {
    function user_display_name(?User $user): string
    {
        if (!$user) {
            return '';
        }

        return trim($user->name ?: $user->email);
    }
}
