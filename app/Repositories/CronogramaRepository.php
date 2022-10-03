<?php


namespace App\Repositories;

use App\Models\Cronograma;
use Yajra\DataTables\DataTables;

class CronogramaRepository
{
	protected $cronograma;
	protected $dataTables;

	public function __construct(Cronograma $cronograma, DataTables $dataTables)
	{
		$this->dataTables = $dataTables;
		$this->cronograma = $cronograma;
	}

	public function store($data)
	{
		return $this->cronograma->store($data);
	}

	public function getAll()
	{
		$cronogramas = $this->cronograma->getAll();
		$data =  $this->dataTables->of($cronogramas)
			->addIndexColumn()
			->whiteList('atividade', 'dia_semana');

		return $data
			->toJson();
	}
}
