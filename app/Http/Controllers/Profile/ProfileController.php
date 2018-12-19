<?php
namespace App\Http\Controllers\Profile;

use App\File\FileUpload;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProfileController extends Controller 
{
	public function profile() 
	{
		$headshotUrl = Attachment::getAttachmentUrl('users', Auth::user()->id, Attachment::TYPE_MYHEADSHOT);
		$headshotFileName = Attachment::getFileName('users', Auth::user()->id, Attachment::TYPE_MYHEADSHOT);
		$chatbotheadshotUrl = Attachment::getAttachmentUrl('users', Auth::user()->id, Attachment::TYPE_BOTHEADSHOT);
		$chatbotheadshotFileName = Attachment::getFileName('users', Auth::user()->id, Attachment::TYPE_BOTHEADSHOT);
		return view('profile.profile', compact('headshotUrl', 'headshotFileName', 'chatbotheadshotUrl', 'chatbotheadshotFileName'));
	}
	
	public function update(Request $request) 
	{
		$profileData = $this->validateData($request->all());
		
		if (!$profileData) {
			return redirect()->back()->with('message', 'Unable to update user\'s profile.');
		}
		
		Auth::user()->update($profileData);
		
		$this->savefile($request->file('headshot'), Attachment::TYPE_MYHEADSHOT);
		$this->savefile($request->file('chatbotheadshot'), Attachment::TYPE_BOTHEADSHOT);
		
		return redirect()->back();
	}
	
	private function validateData($data)
	{
		$validator = Validator::make($data, [
			'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|same:confirmPassword',
            'headshot' => 'required',
            'chatbotheadshot' => 'required'
		]);
		
		if ($validator->fails()) {
			return false;
		}
		
		$data['password'] = bcrypt(array_get($data, 'password'));
		
		return $data;
	}
	
	private function saveFile($file, $type)
	{
		$fileUpload = new FileUpload($file, $type);
		$fileUpload->saveFile('users', Auth::user()->id);	
	}
}
?>
