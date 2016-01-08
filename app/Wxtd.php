<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Wxtd extends Model {
	protected $connection = 'charts';
	protected $table = "wxtd";
}