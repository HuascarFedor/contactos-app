<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'number',
        'contact_id',
    ];

    public function contact(){
        return $this->BelongsTo(Contact::class);
    }
}
