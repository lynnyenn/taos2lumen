<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    use \Dimsav\Translatable\Translatable;
    protected $table = "news";
    protected $dates = ['published_at'];
    public $translatedAttributes = ['title','body'];
    protected $fillable = ['published_at','user_id','title','body'];

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
/**
*
*/
class NewsTranslation extends Model
{
    protected $table = "news_translations";
    protected $fillable = ['news_id','locale','title','body'];
    public $timestamps = false;

}