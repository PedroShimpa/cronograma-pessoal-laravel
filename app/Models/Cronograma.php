<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_semana',
        'atividade',
        'hora',
        'user_id'
    ];

    public $diasSemana = [
        1 => 'Domingo',
        2 => 'Segunda',
        3 => 'Terça',
        4 => 'Quarta',
        5 => 'Quinta',
        6 => 'Sexta',
        7 => 'Sábado'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    public function getAll(int $user_id = 0)
    {
        $query =  $this->select('dia_semana', 'atividade', 'id', 'created_at', 'updated_at');
        if(!empty($query)) {
           $query = $query->where('user_id', $user_id);
        }
        
       return $query->get();
    }

    public function store(array $data)
    {
        return $this->create($data);
    }

    public function getDiaSemanaAttribute($value)
    {
        return $this->diasSemana[$value];
    }
   
}
