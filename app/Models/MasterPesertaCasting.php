<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterPesertaCasting
 * 
 * @property string $idPeserta
 * @property string|null $nik
 * @property string|null $npwp
 * @property string|null $nama
 * @property string|null $alamat
 * @property string|null $phone
 * @property string|null $gender
 * @property string|null $email
 * @property string|null $password
 * @property string|null $tempatLahir
 * @property Carbon|null $tglLahir
 * @property string|null $fileKTP
 * @property string|null $fileBiodata
 * @property string|null $fotoGrid
 * @property string|null $linkVideoProfil
 * @property string|null $linkVideoAkting
 * @property string|null $linkInstagram
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property Collection|TransaksiIkutCasting[] $transaksi_ikut_castings
 *
 * @package App\Models
 */
class MasterPesertaCasting extends Model
{
	protected $table = 'master_peserta_casting';
	protected $primaryKey = 'idPeserta';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'tglLahir',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nik',
		'npwp',
		'nama',
		'alamat',
		'phone',
		'gender',
		'email',
		'password',
		'tempatLahir',
		'tglLahir',
		'fileKTP',
		'fileBiodata',
		'fotoGrid',
		'linkVideoProfil',
		'linkVideoAkting',
		'linkInstagram',
		'statusHapus',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function transaksi_ikut_castings()
	{
		return $this->hasMany(TransaksiIkutCasting::class, 'idPeserta');
	}
}
