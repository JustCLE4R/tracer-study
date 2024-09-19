<?php

namespace App\Http\Controllers\Guest;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function index(Request $request){
        $category = $request->input('category');

        $query = Career::when($category, function ($query) use ($category) {
        switch ($category) {
            case 'Instansi Pemerintahan':
            $query->where('category', 1);
            break;
            case 'Lembaga Swadaya Masyarakat':
            $query->where('category', 2);
            break;
            case 'Perusahaan Swasta':
            $query->where('category', 3);
            break;
            case 'Freelancer':
            $query->where('category', 4);
            break;
        }
        })->latest();

        $careers = $query->paginate(6)->withQueryString();
        $careersLatest = Career::latest()->take(10)->get();

        return view('publicCareer.index', [
        'careers' => $careers,
        'careersLatest' => $careersLatest,
        ]);
    }

    
    public function show(Career $career)
    {
        return view('publicCareer.show', [
        'career' => $career
        ]);
    }
}
