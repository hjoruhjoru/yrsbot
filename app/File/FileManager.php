<?php
namespace App\File;

use App\Models\Attachment;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileManager
{
	private $file = false;
	private $fileName = '';
	private $fileOriginalName = '';
	private $fileType = '';
	private $type;
	
	public function __construct($file, $type)
	{
		$this->file = $file;
		$this->fileOriginalName = $file->getClientOriginalName();
		$this->fileType = $this->getFileType();
		$this->fileName = $this->createFileName($file);
		$this->type = $type;
	}

    public function upload()
    {
		$userId = Auth::user()->id;
        $path = 'public/files/' . $userId . '/';
        
        Storage::putFileAs($path, $this->file, $this->fileName);
    }
    
    public function getFileType()
    {
		$fileNameSplit = explode('.', $this->fileOriginalName);
		if (isset($fileNameSplit[1])) {
			return $fileNameSplit[1];
		}
		
		return '';
	}
	
	public function createFileName($file)
	{
		return md5_file($file->path()) . '.' . $this->fileType;
	}
	
	public function getFileName()
	{
		return $this->fileName;
	}
	
	public function saveFile($refTable, $refId)
	{
		$this->upload();	
		
		Attachment::updateOrCreate([
			'ref_table'   => $refTable,
			'ref_id'   => $refId,
			'type'   => $this->type,
		], [
			'file_name' => $this->file->getClientOriginalName(),
			'store_file_name' => $this->getFileName(),
			'file_size' => $this->file->getClientSize(),
			'file_type' => $this->getFileType()
		]);
	}

    public static function getFile(int $userId, String $fileName) 
    {
        return Storage::get('public/files/' . $userId . '/' . $fileName);
    }
}

?>
