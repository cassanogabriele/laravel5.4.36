<?php
namespace App\Http\Controllers;

use App\Comment;
use App\Blog;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
   	public function store(Request $request){		
		// print_r($blog_a_editer);
		var_dump(Input::all());
		
		Comment::create([
			'user_id' => auth()->id(),
			'blog_id' => Input::get('blog_id'),
			'body' => request('body')
		]);
		
		return back();
	}
	
	// Editer le commentaire 
	public function edition_comm($id){	
		$current_comment = Input::get('comment_id');
		$comments = Comment::find($id);
		return view('layouts.editioncomm')->with(array("comment_id" => $current_comment, "comments"=>$comments,));	
	}
	
	// Valider l'édition du commentaire
	public function editioncomm_valider($id){	
		
		$comment_to_update = Input::get('id');		
		$text_to_update = Input::get('body');		
		$updateComment = DB::update('update comments set body = "'.$text_to_update.'" where id = ?' ,["$comment_to_update"]);
		
		return redirect('/')->withSuccess('Le commentaire du sujet a bien été édité');					
	}

	// Suppression
	public function destroy($id){		
		$id = Input::get('comment_id');
		$deletComment = DB::table('comments')->where('id',$id)->delete();		
		return redirect('/')->withSuccess('Le commentaire du sujet a bien été supprimé');
	}
}
