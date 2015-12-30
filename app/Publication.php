<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model {
	protected $table = "publications";
	protected $fillable = ['title', 'author', 'organize', 'link', 'published_at', 'from', 'user_id'];
	protected $dates = ['published_at'];

	public function user() {
		return $this->belongsTo('App\User');
	}
	public function publication_link() {
		return $this->hasMany('App\Publication_link');
	}
}
