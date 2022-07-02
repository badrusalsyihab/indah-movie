<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterGenreFilm
 * 
 * @property string $idGenre
 * @property string|null $namaGenre
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property Collection|MasterFilm[] $master_films
 *
 * @package App\Models
 */
class MasterGenreFilm extends Model
{
	protected $table = 'master_genre_film';
	protected $primaryKey = 'idGenre';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'namaGenre',
		'statusHapus',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function master_films()
	{
		return $this->hasMany(MasterFilm::class, 'idGenre');
	}
}
