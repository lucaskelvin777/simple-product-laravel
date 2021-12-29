<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fileable = ['name', 'image', 'description'];
    protected $appends  = ['abbreviation_description'];
    public function getAbbreviationDescriptionAttribute()
    {
        $text = $this->attributes['description'];
        $cont = strlen($text);
        $limit = 100;
        if ($cont >= $limit) {
            $text = substr($text, 0, strrpos(substr($text, 0, $limit), ' ')) . '...';
            return $text;
        } else
            return $text;
    }
}
