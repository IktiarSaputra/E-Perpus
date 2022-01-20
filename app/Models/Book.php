<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [''];

    use HasFactory;

    /**
     * Get all of the peminjam for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }

}
