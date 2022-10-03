<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_semana',
        'atividade'
    ];

    public function getAll()
    {
        return $this->select('dia_semana', 'atividade', 'id', 'created_at', 'updated_at')->get();
    }

    public function store(array $data)
    {
        return $this->create($data);
    }
}
