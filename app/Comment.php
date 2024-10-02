<?php
namespace App;

use App\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
   	protected $guarded = [];
	   
    public function user() {
        return $this->belongsTo(User::class);
    }
	
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
