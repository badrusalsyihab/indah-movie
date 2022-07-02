<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterKategoriFilm
 * 
 * @property string $idKategori
 * @property string|null $namaKategori
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property Collection|MasterFilm[] $master_films
 *
 * @package App\Models
 */
class MasterKategoriFilm extends Model
{
	protected $table = 'master_kategori_film';
	protected $primaryKey = 'idKategori';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'namaKategori',
		'statusHapus',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function master_films()
	{
		return $this->hasMany(MasterFilm::class, 'idKategori');
	}
}
