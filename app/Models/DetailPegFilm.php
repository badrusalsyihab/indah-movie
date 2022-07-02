<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPegFilm
 * 
 * @property int $idPegFilm
 * @property string|null $idFilm
 * @property string|null $idPeg
 * @property string|null $statusHapus
 * 
 * @property MasterFilm|null $master_film
 * @property MasterEmployee|null $master_employee
 *
 * @package App\Models
 */
class DetailPegFilm extends Model
{
	protected $table = 'detail_peg_film';
	protected $primaryKey = 'idPegFilm';
	public $timestamps = false;

	protected $fillable = [
		'idFilm',
		'idPeg',
		'statusHapus'
	];

	public function master_film()
	{
		return $this->belongsTo(MasterFilm::class, 'idFilm');
	}

	public function master_employee()
	{
		return $this->belongsTo(MasterEmployee::class, 'idPeg');
	}
}
