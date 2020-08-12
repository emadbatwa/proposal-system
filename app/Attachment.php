<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $guarded = [];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
