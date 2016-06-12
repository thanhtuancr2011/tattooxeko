<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\AboutModel;

class AboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Create new category
     *
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     * 
     * @return Void 
     */
    public function create()
    {
        $about = AboutModel::get()->first();

        if (empty($about)) {
            $about = new AboutModel;
        }

        return view('back-end.admin.about.index', compact('about'));
    }

    /**
     * Edit category
     *
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     * 
     * @param  Int $id Category id
     * 
     * @return Void     
     */
    public function edit($id)
    {
        
    }
}
