<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Resources;
use App\Models\userReview;

class userReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $urlpath = $_SERVER['PATH_INFO'];
        $title = substr($urlpath, 8);
        $resource = \App\Models\resources::where('title', $title)->first();
        $reviews = \App\Models\userReview::where('resource_id', $resource->resource_id)->get();

        $reviews = userReview::select('review','rating','review_title','name','user_reviews.created_at')
                ->where('resource_id','=',$resource->resource_id)
                ->join('users', 'users.id', '=', 'user_reviews.user_id')
                ->get();

        return view('userReview',
        ['user' => $user,
         'resource' => $resource,
         'path' => $title,
         'reviews' => $reviews,
         'reviewstype' => gettype($reviews),
         'reviews' => $reviews
        ]);
    }

    public function postReview()
    {
        $user = Auth::user();
        $urlpath = $_SERVER['PATH_INFO'];
        $title = substr($urlpath, 8);
        $resource = \App\Models\resources::where('title', $title)->first();

        $data = request()->validate
        ([
            'rating' => 'required',
            'review-title' => 'required',
            'user-review' => 'required'
        ]);

        $review = userReview::where('user_id', $user->id) -> where('resource_id', $resource->resource_id) -> first();

        if(empty($review))
        {
            $review = new userReview();
            $review->rating = request('rating');
            $review->review_title = request('review-title');
            $review->review = request('user-review');
            $review->created_at = date('H:i:s');
            $review->user_id = $user->id;
            $review->resource_id = $resource->resource_id;

            $updated = $review->save();
        }

        else
        {
            $updated = userReview::where('user_id','=',$user->id)
            ->update(
                array(
                'review' => request('user-review'),
                'rating' => request('rating'),
                'review_title' => request('review-title'),
                'created_at' => date('H:i:s')
                )
            );
        }

        if ($updated)
        {
            return redirect('/review/'.$resource->title);
        };

    }
}
