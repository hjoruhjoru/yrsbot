<?php
namespace App\Models;

use App\File\FileUpload;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model 
{
	const TYPE_MYHEADSHOT = 1;
	
	const TYPE_BOTHEADSHOT = 2;
	
	const TYPE_QAPAIRMODEL = 3;
	
    protected $fillable = [
        'file_name', 'ref_table', 'ref_id', 'type', 'store_file_name', 'file_size', 'file_type'
    ];
    
    public static function queryUniqueRow($refTable, $refId, $type)
    {
		$attachment = self::where([
			['ref_table', '=', $refTable], 
			['ref_id', '=', $refId],
			['type', '=', $type]
		])->first();			
		return $attachment;
	}
	
	public static function getAttachmentUrl($refTable, $refId, $type)
    {
		$attachment = self::queryUniqueRow($refTable, $refId, $type);
		if (!is_null($attachment)) {
			$userId = Auth::user()->id;
			$fileName = $attachment->store_file_name;
			return Storage::url('public/files/' . $userId . '/' . $fileName);
		}
        return false;
    }
    
    public static function getFileName($refTable, $refId, $type)
    {
		$attachment = self::queryUniqueRow($refTable, $refId, $type);
		if (!is_null($attachment)) {
			return $attachment->file_name;
		}
        return false;
    }
    
    public static function getStoreFileName($refTable, $refId, $type)
    {
		$attachment = self::queryUniqueRow($refTable, $refId, $type);
		if (!is_null($attachment)) {
			$fileName = $attachment->store_file_name;
			return $fileName;
		}
        return false;
    }
}
?>
