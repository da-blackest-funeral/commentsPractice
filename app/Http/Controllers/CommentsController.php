<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    private $commentsPerPage = 3;

    public function showPage(Request $request)
    {
        $allComments = Comments::paginate(3);
        if ($request->get('page') <= $allComments->lastPage()) {
            return view("welcome")
                ->with('allComments', $allComments);
        } else {
            return redirect("/?page={$allComments->lastPage()}");
        }
    }

    public function createComment(Request $request)
    {
        $validatedFields = $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);
        //dd([$validatedFields['name'], $validatedFields['message'], Auth::user()->id]);
        Comments::create([
            'name' => $validatedFields['name'],
            'message' => $validatedFields['message'],
            'owner_id' => Auth::user()->id
        ]);

        return redirect('');
    }

    public function delete(Request $request, $commentId)
    {
        Comments::where('id', $commentId)->delete();
        return redirect('/');
    }

    public function update(Request $request, $commentId)
    {
        //dd([$request->all(), $request->method()]);
        //dd($request->only('newComment')['newComment']);
        $newComment = $request->only('newComment')['newComment'];
        $now = date('Y-m-d H-i-s', time());
        Comments::where('id', $commentId)->update([
            'message' => $newComment,
            'updated_at' => $now
        ]);
        return redirect('/');
    }
}
