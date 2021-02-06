<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
	use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable =['name'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
	protected $guarded = ['id','created_at','updated_at'];
	
    /*
    * Get all the users of a hobby
    */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
