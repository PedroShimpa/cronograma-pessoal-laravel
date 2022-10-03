<?php

namespace App\Http\Controllers;

use App\Repositories\CronogramaRepository;
use App\Http\Requests\StoreCronogramaRequest;
use App\Http\Requests\UpdateCronogramaRequest;

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
        return $this->cronogramaRepository->getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCronogramaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCronogramaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function show( )
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
