<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters){
        // dd($filters['tag']);
        // dd($filters['search']);
        // dd(request());
        if($filters['tag'] ?? false){ // if not exists then return
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false){ // if not exists then return
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}
 