<?php

namespace App\Http\Controllers;

use App\Repositories\CronogramaRepository;
use App\Http\Requests\StoreCronogramaRequest;
use App\Http\Requests\UpdateCronogramaRequest;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{

    protected $cronogramaRepository;

    public function __construct(CronogramaRepository $cronogramaRepository)
    {
        $this->middleware('auth');
        $this->cronogramaRepository = $cronogramaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /** 
     * Busca dados para o datatables
     */
    public function getAll()
    {
        return $this->cronogramaRepository->getAll(auth()->user()->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $diasSemana = $this->cronogramaRepository->getdiasSemana();
        return view('create', compact('diasSemana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCronogramaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCronogramaRequest $request)
    {
        $created = $this->cronogramaRepository->store($request->validated());
        if (!empty($created['success'])) {
            return redirect()->route('home')->with('success',$created['success']);
        } else {
            return redirect()->back()->with('error', 'Erro inesperado ao criar atividade')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCronogramaRequest  $request
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCronogramaRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
