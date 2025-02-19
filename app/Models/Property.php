<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Property extends Model
{
    use HasFactory , Notifiable;
    protected $fillable = ['title' , 'price' , 'status' , 'description' , 'location'];

}
