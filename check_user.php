#!/usr/bin/env php
<?php

use App\Models\User;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

// Get the user by email
$user = User::where('email', 'robin.hooyar@gmail.com')->first();

if ($user) {
    echo "User found: {$user->name} ({$user->email})\n";
    echo "is_admin: " . ($user->is_admin ? 'true' : 'false') . "\n";
    echo "is_admin raw value: " . var_export($user->is_admin, true) . "\n";
    
    // Update user to be admin
    $user->is_admin = 1;
    $user->save();
    echo "User updated to admin.\n";
} else {
    echo "User not found.\n";
}
