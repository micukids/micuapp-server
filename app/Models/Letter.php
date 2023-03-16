<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;
    static function showvowels()
    {
        $vowel= Letter::where('type','vowel')->get();
        return $vowel;
    }

    static function showlettersName($letter)
    {
        $letterName= Letter::where('letter',$letter)->get();
        return $letterName;
    }
    
    public function users(){
        return $this->belongsToMany(User::class,'letter_user');
    }
}
