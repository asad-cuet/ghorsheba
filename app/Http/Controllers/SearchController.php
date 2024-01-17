<?php

namespace App\Http\Controllers;
use App\Models\ComplainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function autocomplete(Request $req)
    {
         $data=ComplainCategory::select('name')->where("name","LIKE","%{$req->input('query')}%")->get();
         return response()->json($data);
    }
    public function searchService(Request $req)
    {
        $service_slug = Str::slug($req->q,'-');
        if($service_slug)
        {
            return redirect('/service-category-view/'.$service_slug);
        }
        else{
            return back();
        }
    }
}
