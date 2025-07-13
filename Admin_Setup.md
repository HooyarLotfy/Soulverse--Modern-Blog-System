# Admin User Setup Guide

This guide explains how to create admin users for the Soulverse Blog System.

## Security Notice

For security reasons, admin user creation is not automated. You must manually create admin users after setting up the application.

## Methods to Create Admin Users

### Method 1: Using Laravel Tinker (Recommended)

1. First, register a regular user through the web interface at `/register`
2. Open terminal and run:
   ```bash
   php artisan tinker
   ```
3. In the tinker console, run:
   ```php
   User::where('email', 'your-email@example.com')->update(['is_admin' => true]);
   ```
4. Type `exit` to leave tinker

### Method 2: Using the check_user.php Script

1. First, register a user through the web interface
2. Run the script with the user's email:
   ```bash
   php check_user.php your-email@example.com
   ```
3. Confirm when prompted to make the user an admin

### Method 3: Create Admin User Directly (Advanced)

If you want to create a new admin user without using the web interface:

1. Run `php artisan tinker`
2. Execute:
   ```php
   use App\Models\User;
   use Illuminate\Support\Facades\Hash;
   
   User::create([
       'name' => 'Your Name',
       'email' => 'your-email@example.com',
       'password' => Hash::make('your-secure-password'),
       'is_admin' => true,
   ]);
   ```

## Verifying Admin Status

To check if a user is an admin:

```bash
php artisan tinker
```

Then run:
```php
User::where('email', 'your-email@example.com')->first()->is_admin
```

## Admin Capabilities

Admin users can:
- Create, edit, and delete blog posts
- Create, edit, and delete post categories (Arcs)
- Manage all content on the platform

## Security Best Practices

1. Use strong passwords for admin accounts
2. Limit the number of admin users
3. Regularly review admin user list
4. Never commit admin credentials to version control
