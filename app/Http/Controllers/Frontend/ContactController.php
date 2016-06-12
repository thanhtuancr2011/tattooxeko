<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ContactModel;

class ContactController extends Controller
{
    public function getContact () 
    {
    	$contact = ContactModel::first();
    	return view('front-end.contact.index', compact('contact'));
    }
}
