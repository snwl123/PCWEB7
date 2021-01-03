<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\resources;


class addResourceController extends Controller
{
    public function index()
    {
        return view('addResource');
    }

    public function postCreate()
    {
        $user = Auth::user();

        $data = request()->validate
        ([
            'title' => 'required',
            'author' => 'required',
            'resource-type' => 'required',
            'category' => 'required',
        ]);

        $resource = resources::where('title', request('title')) -> first();

        if(empty($resource))
        {
            $imagePath = request('image')->store('resources', 'public');

            $resource = new resources();
            $resource->title = request('title');
            $resource->author = request('author');
            $resource->description = request('description');
            $resource->publication_date = request('publication-date');
            $resource->resource_type = request('resource-type');
            $resource->image = $imagePath;
            $resource->category_name = request('category');
            $resource->price = request('price');
            $resource->uploaded_by = $user->id;
            $resource->created_at = date('H:i:s');
        }
   
        $updated = $resource->save();

        if ($updated)
        {
            return redirect('/review/'.$resource->title);
        };
    } 
}
