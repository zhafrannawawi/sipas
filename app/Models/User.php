<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'password', 'role', 'phone_number'];

    protected $casts = [
        'password' => 'hashed'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'create',
                'activity' => "Membuat user (ID: {$user->id})"
            ]);
        });

        static::updated(function ($user) {
            $changes = [];

            $ignoredColumns = ['updated_at'];
            $hiddenValues = ['password'];

            foreach ($user->getDirty() as $column => $newValue) {
                // Lewati kolom yang diabaikan
                if (in_array($column, $ignoredColumns)) {
                    continue;
                }

                if (in_array($column, $hiddenValues)) {
                    $changes[] = 'berhasil memperbarui kata sandi! ';
                    continue;
                }
                // Mengambil nilai lama
                $originalValue = $user->getOriginal($column);

                $columnName = ucfirst(str_replace('_', ' ', $column));


                // Masukkan array ke changes
                $changes[] = "$columnName berubah dari $originalValue menjadi $newValue";
            }
            // jika ada perubahan yang dicatat ,masukkan kedalam log aktivitas
            if (!empty($changes)) {
                ActivityLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'update',
                    'activity' => "Memparbarui user (ID : $user->id): " . implode(',', $changes)
                ]);
            }
        });

        static::deleted(function ($user) {
            static::created(function ($user) {
                ActivityLog::create([
                    'user_id'  => Auth::id(),
                    'action'   => 'create',
                    'activity' => "Menghapus user (ID: {$user->id})"
                ]);
            });
        });
    }
}
