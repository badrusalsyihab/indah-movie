<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterJabatan
 * 
 * @property string $idJabatan
 * @property string|null $namaJabatan
 * @property string|null $statusHapus
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property Carbon|null $deletedAt
 *
 * @package App\Models
 */
class MasterJabatan extends Model
{
	protected $table = 'master_jabatan';
	protected $primaryKey = 'idJabatan';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt',
		'deletedAt'
	];

	protected $fillable = [
		'namaJabatan',
		'statusHapus',
		'createdAt',
		'updatedAt',
		'deletedAt'
	];
}
