<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ResponseModel;
use App\Models\Attachment;
use App\File\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client as Client;

class WebhookController extends Controller
{
    public function reply(String $token, Request $request)
    {
	    $requestData = $request->all();
        $event = $requestData['events'];
        $this->sendMessage($token, $event);
        return response('', 200);
    }

    private function sendMessage($modelToken, $event)
    {
        $modelInformation = ResponseModel::where('token', '=', $modelToken)->first()->toArray();
        $fileName = Attachment::getStoreFileName('response_model', $modelInformation['id'], Attachment::TYPE_QAPAIRMODEL);
        $model = json_decode(FileManager::getFile($modelInformation['user_id'], $fileName), true);

        $client = new Client();
	    foreach ($event as $message) {
            $replyToken = $message['replyToken'];
            $client->post(config('line.api.reply'), [
                'headers' => [
                    'Authorization'=> 'Bearer ' . config('line.accessToken'),
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'replyToken' => $replyToken ,
                    'messages' => array([
                        'type' => 'text',
                        'text' => (isset($model[$message['message']['text']])) ? $model[$message['message']['text']] :$model['other']
                    ])
                ])
            ]);
	    }
    }
}
?>
