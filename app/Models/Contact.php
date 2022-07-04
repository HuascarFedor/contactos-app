<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'image'
    ];

    protected static function boot(){
        parent::boot();
        self::creating(function($table){
            if( !app()->runningInConsole() ){
                $table->user_id = auth()->id();
            }
        });
    }

    public function getUrlPathAttribute(){
        return Storage::url($this->image);
    }

    public function deleteImage(){
        if($this->image != "public/no-image.jpg")
            Storage::delete($this->image);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
