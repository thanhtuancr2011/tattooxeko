<?php 
namespace App\Models;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'about';

    protected $fillable = ['description'];

    public function createAbout($data)
    {
        $about = self::first();

        if (empty($about)) {
            $about = self::create($data);
        } else {
            $about = $about->update($data);
        }
        
        return $about;
    }
}