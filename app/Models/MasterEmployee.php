<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class MasterEmployee
 * 
 * @property string $idPeg
 * @property string|null $nik
 * @property string|null $namaPeg
 * @property string|null $alamatPeg
 * @property string|null $phonePeg
 * @property string|null $emailPeg
 * @property string|null $passwordPeg
 * @property string|null $genderPeg
 * @property string|null $statusNikah
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property Collection|DetailPegFilm[] $detail_peg_films
 *
 * @package App\Models
 */
class MasterEmployee extends Authenticatable
{
	use HasFactory, Notifiable;
	protected $guard = 'pegawai';

	protected $table = 'master_employee';
	protected $primaryKey = 'idPeg';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'nik',
		'namaPeg',
		'alamatPeg',
		'phonePeg',
		'emailPeg',
		'passwordPeg',
		'genderPeg',
		'statusNikah',
		'statusHapus',
		'is_admin',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function detail_peg_films()
	{
		return $this->hasMany(DetailPegFilm::class, 'idPeg');
	}
}
