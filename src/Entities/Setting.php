<?php

namespace hcivelek\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ["id"]; 

    public function __construct(array $attributes = [])
    {
        $this->table = config('settings.model'); 
        parent::__construct($attributes);
    }
    

    /**
     * Return the value of given key
     *
     * @return String
     */
    public static function valueOf($key)
	{
		$settings = app('settings'); 
        
        if (isset($settings[$key]))
            return $settings[$key];
            
		return null;
    }
    
	public static function valueAsArray($key)
	{
		return explode(",",parent::valueOf($key));
    }    
    

    public function model(){
        return $this->morphTo();
    }
}
