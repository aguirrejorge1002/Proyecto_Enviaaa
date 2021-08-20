<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;

class EnvioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $envios = Envio::all();
        return view('envio.index')->with('envios',$envios);
    }

    public function create()
    {
        return view('envio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $envio = new Envio();
        $envio->company_name = $request->get('company_name');
        $envio->codigo_postal = $request->get('codigo_postal');
        $envio->address = $request->get('address');
        $envio->city = $request->get('city');
        $envio->phone = $request->get('phone');
        $envio->status = 'nueva';
        $envio->save();

        $envios = Envio::all();
        return view('envio.index')->with('envios',$envios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $company_name = $request->get('company_name');
        $envios = Envio::where('company_name', 'like', "%{$company_name}%")->get();

        return view('envio.index')->with('envios',$envios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id_envio');
        $status = $request->get('status');

        if ($status == 0) {$status = 'nuevo';}
        if ($status == 1) {$status = 'recolectada';}
        if ($status == 2) {$status = 'en ruta';}
        if ($status == 3) {$status = 'entregada';}
        if ($status == 4) {$status = 'incidente';}
        echo $id;
        $envios = Envio::find($id);
        $envios->status = $status;
        $envios->save();

        return redirect('envio');
    }
}
