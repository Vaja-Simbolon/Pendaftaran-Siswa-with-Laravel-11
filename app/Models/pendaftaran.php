<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = ['no', 'nama', 'gender', 'ttl', 'alamat', 'asal_sekolah', 'izajah', 'bukti_bayar', 'status_daftar'];
    public static function generateRegistrationNumber()
    {
        $latest = Pendaftaran::latest()->first();
        if (!$latest) {
            return 'MB-001';
        }
        $number = intval(substr($latest->no, 3)) + 1;
        return 'MB-' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}
