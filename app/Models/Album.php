<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Album extends Model
{
    protected $fillable = ['title', 'artist', 'release_year', 'description', 'price', 'album_cover'];

    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('artist', 'like', '%' . $filters['search'] . '%');
        }
    }

    // Album - Order relation
    public function orders() {
        return $this->hasMany(Order::class);
    }

    // Album - Comment relation
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function hasBeenPurchased(){
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if there are any orders for this album by the authenticated user
            return $this->orders()->where('user_id', $user->id)->exists();
        }

        return false; // Return false if user is not authenticated
    }

    public function moods()
    {
        return $this->belongsToMany(Mood::class, 'album_mood');
    }
}
