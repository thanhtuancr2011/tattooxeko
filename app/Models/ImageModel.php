<?php 
namespace App\Models;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Services\FileService;

class ImageModel extends Model
{
    protected $table = 'photos';

    protected $fillable = ['name', 'folder', 'stored_file_name', 'size', 'uniId', 'imageable_id', 'imageable_type'];
}