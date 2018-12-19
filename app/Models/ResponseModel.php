<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseModel extends Model
{
	const TYPE_QAPAIR = 1;
	
	protected $table = 'response_model';
	
	protected $fillable = [
        'id', 'type', 'user_id'
    ];
}
?>
