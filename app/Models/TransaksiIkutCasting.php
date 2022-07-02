<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransaksiIkutCasting
 * 
 * @property string $idTrxCasting
 * @property string|null $idPeserta
 * @property string|null $idFilm
 * @property string|null $pengajuanKarakter
 * @property string|null $statusTransaksi
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property MasterPesertaCasting|null $master_peserta_casting
 * @property MasterFilm|null $master_film
 *
 * @package App\Models
 */
class TransaksiIkutCasting extends Model
{
	protected $table = 'transaksi_ikut_casting';
	protected $primaryKey = 'idTrxCasting';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'idPeserta',
		'idFilm',
		'pengajuanKarakter',
		'statusTransaksi',
		'statusHapus',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function master_peserta_casting()
	{
		return $this->belongsTo(MasterPesertaCasting::class, 'idPeserta');
	}

	public function master_film()
	{
		return $this->belongsTo(MasterFilm::class, 'idFilm');
	}
}
