<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $table = "TICKETMOV";
    protected $connection = 'firebird';
	public $timestamps = false;
	protected $primaryKey = 'TICKETMOVID';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TICKETMOVID',
		'PREFIJO',
		'CCOSTO',
		'NUMERO',
		'FECHA',
		'ORIGEN',
		'DESTINO',
		'PLACA',
		'ART1',
		'BODEGA',
		'ART2',
		'BODEGA2',
		'BRUTO',
		'TARA',
		'NETO',
		'TARIFAC',
		'TARIFAT',
		'TIPOES',
		'OBS',
		'NITTRANS',
		'TICKET'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [        
    ];

    function toArray(){
        return [
			'id' => $this->TICKETMOVID,
			'ccosto' => $this->CCOSTO,
			'numero' => $this->NUMERO,
			'fecha' => $this->FECHA,
			'origen' => $this->ORIGEN,
			'destino' => $this->DESTINO,
			'placa' => $this->PLACA,
			'art1' => $this->ART1,
			'bodega' => $this->BODEGA,
			'art2' => $this->ART2,
			'bodega2' => $this->BODEGA2,
			'bruto' => $this->BRUTO,
			'tara' => $this->TARA,
			'neto' => $this->NETO,
			'tarifac' => $this->TARIFAC,
			'tarifat' => $this->TARIFAT,
			'tipoes' => $this->TIPOES,
			'obs' => $this->OBS,
			'nittrans' => $this->NITTRANS,
			'ticket' => $this->TICKET
        ];
    }
}