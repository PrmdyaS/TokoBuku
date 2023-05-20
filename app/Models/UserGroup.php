<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users_grup',
        'users_grup_name',
    ];
    protected $table = 'users_grup';
    public $timestamps = false;

    protected $primaryKey = 'id_users_grup';

    public function callUser()
    {
        return $this->hasMany(User::class, 'id_users_grup');
    }

}
