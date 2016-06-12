<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\ContactModel;

class ContactController extends Controller
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
        $contact = ContactModel::get()->first();

        if (empty($contact)) {
            $contact = new ContactModel;
        }

        return view('back-end.admin.contact.index', compact('contact'));
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
