<?php


namespace App\Repositories;

use App\Models\Cronograma;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
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

	public function store(array $data)
	{
		try {
			$created =  $this->cronograma->store($data);
			if (!empty($created)) {
				return ['success' => 'Atividade Criada'];
			}
		} catch (QueryException $th) {
			Log::error($th);
			return;
		}
	}

	public function getAll(int $user_id = 0)
	{
		$cronogramas = $this->cronograma->getAll($user_id);
		$data =  $this->dataTables->of($cronogramas)
			->addIndexColumn()
			->whiteList('atividade', 'dia_semana', 'hora','created_at');

		return $data
			->toJson();
	}

	public function getdiasSemana()
	{
		return $this->cronograma->diasSemana;
	}
}
