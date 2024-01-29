<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Comment extends Controller
{
     // Delete
     public function comment_proses(Request $request, $postId)
     {
        $request->validate([
            'comment' => 'required',
        ]);
          DB::table('comment')->insert([
            'id_comment'          => $postId,
            'id_user'            => Session()->get('id_user'),
            'nama'               => $request->nama,
            'email'               => $request->email,
            'comment'            => $request->comment,
            
        ]);
        return redirect()->back()->with('success', 'Comment posted successfully.');
     }
}
