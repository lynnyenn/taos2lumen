<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication_link extends Model {
	protected $table = "publication_links";
	protected $fillable = ['publication_id', 'name', 'link'];

	public function publication() {
		return $this->belongsTo('App\publication');
	}
}
