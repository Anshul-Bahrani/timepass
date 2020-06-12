<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'excerpt', 'body'];

	// OR
	// Alternate way if there are 40-50 columns
	// protected $guarded = [];


    /*
	This method is to be overridden when we need to change the Route Model Binding Column
	By default the column is 'id' which is the base Model class

    */
    // This is the way to override that method.
    // public function getRouteKeyName() {
    // 	return 'title';
    // }

    public function tags() {
    	return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
