<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table 	= 'user';
    public $timestamps	= false;
    
    public function scopeGetUserLogin($query, $email = '', $password = '')
    {
		$query->from($this->table)
				->where('email', $email);
		
		if ($password != '')
		{
			$query->where('password', $password);
		}
		
		return $query;
	}
	
	public function scopeGetUserById($query, $qid)
    {
		$query->from($this->table)
				->where('user_id', $qid);
		
		return $query;
	}
}
