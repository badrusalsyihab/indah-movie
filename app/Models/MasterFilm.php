<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterFilm
 * 
 * @property string $idFilm
 * @property string|null $judulFilm
 * @property string|null $idGenre
 * @property string|null $idKategori
 * @property string|null $keterangan
 * @property string|null $fileProposal
 * @property string|null $statusHapus
 * @property string|null $statusCasting
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 * 
 * @property MasterGenreFilm|null $master_genre_film
 * @property MasterKategoriFilm|null $master_kategori_film
 * @property Collection|DetailPegFilm[] $detail_peg_films
 * @property Collection|TransaksiIkutCasting[] $transaksi_ikut_castings
 * @property Collection|TransaksiMjdSponsor[] $transaksi_mjd_sponsors
 *
 * @package App\Models
 */
class MasterFilm extends Model
{
	protected $table = 'master_film';
	protected $primaryKey = 'idFilm';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'judulFilm',
		'idGenre',
		'idKategori',
		'keterangan',
		'fileProposal',
		'statusHapus',
		'statusCasting',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	public function master_genre_film()
	{
		return $this->belongsTo(MasterGenreFilm::class, 'idGenre');
	}

	public function master_kategori_film()
	{
		return $this->belongsTo(MasterKategoriFilm::class, 'idKategori');
	}

	public function detail_peg_films()
	{
		return $this->hasMany(DetailPegFilm::class, 'idFilm');
	}

	public function transaksi_ikut_castings()
	{
		return $this->hasMany(TransaksiIkutCasting::class, 'idFilm');
	}

	public function transaksi_mjd_sponsors()
	{
		return $this->hasMany(TransaksiMjdSponsor::class, 'idFilm');
	}
}
