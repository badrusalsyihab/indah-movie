<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransaksiMjdSponsor
 * 
 * @property string $idTrxSponsor
 * @property string|null $idSponsor
 * @property string|null $idFilm
 * @property int|null $donasiSponsor
 * @property string|null $fotoBukti
 * @property string|null $keterangan
 * @property string|null $statusTransaksi
 * @property string|null $alasanTransaksi
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property MasterSponsor|null $master_sponsor
 * @property MasterFilm|null $master_film
 *
 * @package App\Models
 */
class TransaksiMjdSponsor extends Model
{
	protected $table = 'transaksi_mjd_sponsor';
	protected $primaryKey = 'idTrxSponsor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'donasiSponsor' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'idSponsor',
		'idFilm',
		'donasiSponsor',
		'fotoBukti',
		'keterangan',
		'statusTransaksi',
		'alasanTransaksi',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function master_sponsor()
	{
		return $this->belongsTo(MasterSponsor::class, 'idSponsor');
	}

	public function master_film()
	{
		return $this->belongsTo(MasterFilm::class, 'idFilm');
	}
}
