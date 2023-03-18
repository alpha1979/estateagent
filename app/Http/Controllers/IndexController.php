<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Response;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::check());
        return inertia(
            'Index/Index',
            [
                'message' => 'Hellow from Laravel'
            ]
            );
    }

    public function show()
    {
        // return "show";
        return inertia(
            'Index/Show',
            [
                'message' => 'Hellow from show page'
            ]
        );
    }
}