<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $fillable = ['name', 'document', 'email', 'state', 'password', 'is_active'];
    public $timestamps = false;
}