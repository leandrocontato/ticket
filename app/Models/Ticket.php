<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Ticket extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = "tickets";

    protected $fillable = [
        'codigo', 'user_id',
        'ticket_id',
        'user_id',
        'email',
        'telefone',
        'assunto',
        'descritivo',
        'data',
        'hora',
        'abertura',
        'ticket_priority',
        'categoria',
        'status'
    ];

    protected $searchableFields = ['*'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
