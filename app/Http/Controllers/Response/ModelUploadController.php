<?php
namespace App\Http\Controllers\Response;

use App\File\FileUpload;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\ResponseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class ModelUploadController extends Controller
{
	public function index()
	{
		$modelList = ResponseModel::where('user_id', '=', Auth::user()->id)->get()->keyBy('type')->toArray();
		
		$qapairModelId = $modelList[ResponseModel::TYPE_QAPAIR]['id'];
		$qapairFile = ['url' => Attachment::getAttachmentUrl('response_model', $qapairModelId, Attachment::TYPE_QAPAIRMODEL), 
					   'fileName' => Attachment::getFileName('response_model', $qapairModelId, Attachment::TYPE_QAPAIRMODEL)];
					   
		return view('dialog.model', compact('qapairFile'));
	}
	
	public function updateQapair(Request $request)
	{
		$model = ResponseModel::updateOrCreate([
			'user_id' => Auth::user()->id,
			'type' => ResponseModel::TYPE_QAPAIR
		]);
		
		$fileUpload = new FileUpload($request->file('qaPair'), Attachment::TYPE_QAPAIRMODEL);
		$fileUpload->saveFile('response_model', $model->id);
		
		return redirect()->back();
	}
}
?>
