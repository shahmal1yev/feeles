<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product\Product;
use Illuminate\Support\Facades\Cookie;

class BookmarkController extends Controller
{
    public function index()
    {
    	$products = [];
    	$bookmarks = Cookie::get('bookmarks');

    	if (is_array($bookmarks))
    	{
	    	foreach($bookmarks as $bookmark)
	    	{
	    		if ($product = Product::with('images')->firstWhere('id', $bookmark))
	    		{
	    			$products[] = $product->toArray();
	    		}
	    		else
	    		{
	    			Cookie::queue(Cookie::forget("bookmarks[$bookmark]"));
	    		}
	    	}
	    }
	    else
	    {
	    	Cookie::queue(Cookie::forget('bookmarks'));
	    }

    	return view('bookmarks', compact('products'));
    }
}
