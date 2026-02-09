<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'code', 'category_id', 'price_per_day', 'stock', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

    protected static function booted()
    {
        static::created(function ($device) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'create',
                'activity' => "Membuat alat (ID: {$device->id})"
            ]);
        });

        static::updated(function ($device) {
            $changes = [];

            // 1. Daftar kolom yang ingin diabaikan
            $ignoredColumns = ['updated_at'];

            // 2. Loop semua kolom yang berubah (dirty attributes)
            foreach ($device->getDirty() as $column => $newValue) {
                // Lewati kolom yang diabaikan
                if (in_array($column, $ignoredColumns)) {
                    continue;
                }

                // 3. Ambil nilai lama
                $originalValue = $device->getOriginal($column);

                // 4. Format pesan agar enak dibaca 
                // Misal: 'stock' jadi 'Stok', 'name' jadi 'Nama Barang'
                $columnName = ucfirst(str_replace('_', ' ', $column));

                // Masukkan ke array changes
                $changes[] = "$columnName berubah dari '$originalValue' menjadi '$newValue'";
            }

            // 5. Jika ada perubahan yang dicatat, simpan ke log
            if (!empty($changes)) {
                ActivityLog::create([
                    'user_id'  => Auth::id(),
                    'action'   => 'update',
                    // Gabungkan semua perubahan dengan koma. 
                    // Contoh: "Nama berubah dari A ke B, Stok berubah dari 10 ke 5"
                    'activity' => "Memperbarui alat (ID: {$device->id}): " . implode(', ', $changes)
                ]);
            }
        });

        static::deleted(function ($device) {
            ActivityLog::create([
                'user_id'  => Auth::id(),
                'action'   => 'delete',
                'activity' => "Menghapus alat (ID: {$device->id})"
            ]);
        });
    }
}
