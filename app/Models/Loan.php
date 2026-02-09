<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'device_id',
        'user_id',
        'approved_by',
        'received_by',
        'loan_date',
        'due_date',
        'returned_date',
        'status',
        'price_per_day',
        'total_price',
        'pay_price',
        'total_fine',
        'pay_fine'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'received_by');
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function getStatusLabelAttribute()
    {

        return match ($this->status) {
            'canceled' => "Dibatalkan",
            'pending' => "Menunggu",
            'borrowed' => 'Dipinjam',
            'validation' => 'Menunggu Validasi',
            'returned' => 'Dikembalikan',
            default    => ucfirst($this->status)
        };
    }

    public function getStatusBadgeAttribute()
    {
        $configs = [

            'canceled' => [
                'class' => 'bg-danger',
                'icon' => 'fa-times-circle',
                'label' => 'Dibatalkan'
            ],
            'pending' => [
                'class' => 'bg-warning',
                'icon' => 'fa-clock',
                'label' => 'Menunggu'
            ],
            'borrowed' => [
                'class' => 'bg-success',
                'icon' => 'fa-box-open',
                'label' => 'Dipinjam'
            ],
            'validation' => [
                'class' => 'bg-info',
                'icon' => 'fa-hourglass-half',
                'label' => 'Menunggu Validasi'
            ],
            'returned' => [
                'class' => 'bg-primary',
                'icon' => 'fa-check-circle',
                'label' => 'Dikembalikan'
            ],
            'overdue' => [
                'class' => 'bg-danger',
                'icon' => 'fa-exclamation-circle',
                'label' => 'Terlambat'
            ],
        ];

        return $configs[$this->status];
    }


    public function getEstimatedPriceAttribute()
    {
        return $this->calculatePrice();
    }

    protected $casts = [
        'loan_date' => 'date',
        'due_date'  => 'date',
        'returned_date' => 'date',
        'fine_paid_at' => 'date'
    ];


    public function calculatePrice()
    {
        if (!$this->loan_date || !$this->due_date || !$this->price_per_day) {
            return 0;
        }

        $start = Carbon::parse($this->loan_date)->startOfDay();
        $end   = Carbon::parse($this->due_date)->startOfDay();

        $days = $start->diffInDays($end) + 1;

        $total = $days * $this->price_per_day;

        $this->total_price = $total;

        return $total;
    }

    public function calculateFine()
    {
        if (!$this->due_date) return 0;

        $dueDate = Carbon::parse($this->due_date);

        //  Tentukan tanggal akhir perhitungan.
        // Jika returned_date ada (sudah kembali), pakai itu.
        // Jika NULL (belum kembali), pakai hari ini.
        $endDate = $this->returned_date
            ? Carbon::parse($this->returned_date)
            : Carbon::today();

        // Jika tanggal akhir (kembali atau hari ini) masih sebelum/pas jatuh tempo -> Tidak Denda
        // Pakai lte (less than or equal) biar lebih akurat
        if ($endDate->lte($dueDate)) {
            return 0;
        }

        // Hitung denda
        $lateDays = $dueDate->diffInDays($endDate);
        $finePerDay = 50000;

        return $lateDays * $finePerDay;
    }
}
