<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = "categories";

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
