<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model {
	use \Dimsav\Translatable\Translatable;
	protected $table = "peoples";
	protected $fillable = ['company', 'name', 'photo', 'mail', 'page', 'order_by', 'user_id'];
	public $translatedAttributes = ['position', 'title'];

	/*public function scopeCompany($query,$comp){
		        $query->where('company', '=', $comp)->orderBy('position');
	*/
	//$asiaa    = People::company('Asiaa')->get();
	public function scopeCompany($query, $comp) {
		$query->where('company', '=', $comp)->orderBy('order_by');
	}
	/*public function scopeCompany($query, $comp){
		    $query->join('people_translations as p', 'p.people_id', '=', 'peoples.id')
		        ->where('peoples.company', $comp)
		        ->groupBy('p.position')
		        ->orderBy('peoples.order_by', 'asc')
		        ->with('translations');
	*/

	public function user() {
		return $this->belongsTo('App\User');
	}

}
class PeopleTranslation extends Model {
	protected $table = "people_translations";
	protected $fillable = ['people_id', 'locale', 'position', 'title'];
	public $timestamps = false;
}