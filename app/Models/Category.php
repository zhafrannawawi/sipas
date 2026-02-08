<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    protected static function booted()
    {
        static::created(function ($category) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'create',
                'activity' => "Membuat kategori (ID: {$category->id})"
            ]);
        });

        static::updated(function ($category) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'update',
                'activity' => "Memperbarui kategori (ID: {$category->id})"
            ]);
        });

        static::deleted(function ($category) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'delete',
                'activity' => "Menghapus kategori (ID: {$category->id})"
            ]);
        });
    }
}
