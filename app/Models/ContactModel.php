<?php 
namespace App\Models;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact';

    protected $fillable = ['description'];

    public function createContact($data)
    {
        $contact = self::first();

        if (empty($contact)) {
            $contact = self::create($data);
        } else {
            $contact = $contact->update($data);
        }
        
        return $contact;
    }
}