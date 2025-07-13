#!/usr/bin/env php
<?php

use App\Models\User;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

// This script is for admin user management
// Usage: php check_user.php your-email@example.com
// 
// To make a user admin, pass their email as an argument:
// php check_user.php admin@example.com

if ($argc < 2) {
    echo "Usage: php check_user.php <email>\n";
    echo "Example: php check_user.php admin@example.com\n";
    exit(1);
}

$email = $argv[1];

// Get the user by email
$user = User::where('email', $email)->first();

if ($user) {
    echo "User found: {$user->name} ({$user->email})\n";
    echo "is_admin: " . ($user->is_admin ? 'true' : 'false') . "\n";
    echo "is_admin raw value: " . var_export($user->is_admin, true) . "\n";
    
    // Ask for confirmation before making admin
    echo "Do you want to make this user an admin? (y/n): ";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    fclose($handle);
    
    if(trim($line) == 'y' || trim($line) == 'Y') {
        $user->is_admin = 1;
        $user->save();
        echo "User updated to admin.\n";
    } else {
        echo "Operation cancelled.\n";
    }
} else {
    echo "User with email '{$email}' not found.\n";
}
