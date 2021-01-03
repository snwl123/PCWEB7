<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\userReview;
use App\Models\resources;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $reviews = \App\Models\userReview::where('user_id', $user->id)
                                        ->join('resources', 'resources.resource_id', '=', 'user_reviews.resource_id')
                                        ->orderBy('user_reviews.created_at', 'asc')
                                        ->get();
        $reviewscount = \App\Models\userReview::where('user_id', $user->id)->count();
        $posts = \App\Models\resources::where('uploaded_by', $user->id)
                                        ->orderBy('created_at', 'asc')
                                        ->get();
        $postscount = \App\Models\resources::where('uploaded_by', $user->id)->count();

        return view('profile', [
            'user' => $user,
            'profile' => $profile,
            'reviews' => $reviews,
            'reviewscount' => $reviewscount,
            'posts' => $posts,
            'postscount' => $postscount
        ]);
    }

    public function create() {
        return view('createProfile');
    } 

    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('createProfile',
        [
            'profile' => $profile
        ]);
    }

    public function postCreate()
    {
        // Load the existing profile
        $user = Auth::user();

        //this is empty and returning null
        $profile = Profile::where('user_id', $user->id)->first();
        if(empty($profile)){
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->created_at = now();

            // Now, save it all into the database
            $updated = $profile->save();
        }

        // Save the new profile pic... if there is one in the request()!
        if (request('profilepic') != null)
        { 
            $imagePath = request('profilepic')->store('profile', 'public');
            $updated = Profile::where('user_id','=',$user->id)
            ->update(
                array(
                'description' => request('description'),
                'image' => $imagePath
                )
            );
        }

        // Save the new description... if there is one in the request()!
        if (request('description') != null)
        { 
            $updated = Profile::where('user_id','=',$user->id)
            ->update(
                array(
                'description' => request('description'),
                'updated_at' => now()
                )
            );
        }

        return redirect('/profile');
    }

  

    public function update(){
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => 'image',
        ]);
    
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
    }

    public function deleteReview(){

        $data = request()->validate
        ([
            'review-id' => 'required',
        ]);
        
        $updated = userReview::where('review_id', request('review-id'))->delete();

        if ($updated) {
            return redirect('/profile');
        }

    }
    

}
