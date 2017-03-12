<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMessageModel extends Model
{
    //
    protected $table 	= 'status_message';
    public $timestamps	= false;
    
    public function scopeGetAll($query, $feed_time = '')
    {
		$query->from($this->table . ' as a')
				->leftJoin('user as b', 'b.user_id', '=', 'a.user_id')
				->orderBy('a.created', 'desc')
				->select('b.name', 'a.*')
				->limit(20);
		
		if ($feed_time != '')
		{
			$query->where('a.created', '>', $feed_time);
		}
		
		return $query;
	}
}
