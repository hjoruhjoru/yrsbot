<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpociot\BotMan\BotMan;

class HomeController extends Controller
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

    public function index()
    {
		$headshotUrl = Attachment::getAttachmentUrl('users', Auth::user()->id, Attachment::TYPE_MYHEADSHOT);
		$chatbotheadshotUrl = Attachment::getAttachmentUrl('users', Auth::user()->id, Attachment::TYPE_BOTHEADSHOT);
		
        return view('home', compact('headshotUrl', 'chatbotheadshotUrl'));
    }
}
