<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class MasterSponsor
 * 
 * @property string $idSponsor
 * @property string|null $nik
 * @property string|null $npwp
 * @property string|null $namaSponsor
 * @property string|null $alamatSponsor
 * @property string|null $phoneSponsor
 * @property string|null $emailSponsor
 * @property string|null $passwordSponsor
 * @property string|null $token
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property Collection|TransaksiMjdSponsor[] $transaksi_mjd_sponsors
 *
 * @package App\Models
 */
class MasterSponsor extends Authenticatable
{
	protected $guard = 'sponsor';
	protected $table = 'master_sponsor';
	protected $primaryKey = 'idSponsor';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'nik',
		'npwp',
		'namaSponsor',
		'alamatSponsor',
		'phoneSponsor',
		'emailSponsor',
		'passwordSponsor',
		'token',
		'statusHapus',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function transaksi_mjd_sponsors()
	{
		return $this->hasMany(TransaksiMjdSponsor::class, 'idSponsor');
	}
}
