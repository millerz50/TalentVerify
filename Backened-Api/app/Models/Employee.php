<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Authenticatable for login/signup
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'employee_id',
        'company_id',
        'department',
        'role',
        'start_date',
        'end_date',
        'duties',
    ];

    // Hidden fields to protect sensitive data
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Automatically hash passwords
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
?>
