<?php
namespace App\Http\Controllers;

use App\Conversations\ExampleConversation;
use App\Models\Attachment;
use App\Models\ResponseModel;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BotManController extends Controller
{
    /**
     * Place your response here.
     */
    public function handle(Request $request)
    {
		$validatedData = $request->validate([
			'message' => 'required|string'
		]);
		
		$qapair = json_decode($this->loadModel());
		$message = $validatedData['message'];
		if (json_last_error() == JSON_ERROR_NONE && array_key_exists($message, $qapair)) {
			return $qapair->$message;
		} 
		
		return 'I can\'t underdstand.';
    }
    
    private function loadModel() 
    {
		$model = ResponseModel::where([
			['user_id', '=', Auth::user()->id],
			['type', '=', ResponseModel::TYPE_QAPAIR]
		])->first();
		if (empty($model)) { return false; }
		
		$fileName = Attachment::getStoreFileName('response_model', $model->id, Attachment::TYPE_QAPAIRMODEL);
		$contents = Storage::get('public/files/' . Auth::user()->id . '/' . $fileName);
		return $contents;
	}
}
