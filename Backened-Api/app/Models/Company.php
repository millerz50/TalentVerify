<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'registration_date', 'registration_number',
        'address', 'contact_person', 'departments', 
        'number_of_employees', 'phone', 'email',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}









?>


