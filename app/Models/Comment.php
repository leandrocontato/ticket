<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Comment extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = "comments";

    protected $fillable = [
      'ticket_id', 'user_id', 'comment'
    ];

    protected $searchableFields = ['*'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
