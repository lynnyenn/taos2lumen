<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	use \Dimsav\Translatable\Translatable;
	protected $table = "projects";
	protected $fillable = ['albumid', 'order_by', 'user_id'];
	public $translatedAttributes = ['title', 'body'];
	public function user() {
		return $this->belongsTo('App\User');
	}

}
class ProjectTranslation extends Model {
	protected $table = "project_translations";
	protected $fillable = ['project_id', 'locale', 'title', 'body'];
	public $timestamps = false;
}