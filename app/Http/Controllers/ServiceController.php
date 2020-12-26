<?php

namespace App\Http\Controllers;

use App\Models\ModelService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $service = ModelService::where('id_user',Auth::user()->id)->where('situacao', false)->orderBy('classificacao', 'DESC')->orderBy('created_at', 'ASC')->get();
            return view('services.index', compact('service'));
        }
        return redirect('/');
    }

    public function finalizados()
    {
        if (Auth::check()) {
            $service = ModelService::where('id_user',Auth::user()->id)->where('situacao', true)->orderBy('classificacao', 'DESC')->orderBy('created_at', 'ASC')->get();
            return view('services.index', compact('service'));
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('services.create', compact('users'));
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $cad = ModelService::create([
                'produto' => $request->produto,
                'id_user' => Auth::user()->id,
                'desc' => $request->desc,
                'nome_cliente' => $request->nome_cliente,
                'classificacao' => $request->classificacao,
                'situacao' => false
            ]);
            if ($cad) {
                return redirect('services');
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $service = ModelService::find($id);
            return view('services.show', compact('service'));
        }
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $service = ModelService::find($id);
            $users = User::all();
            return view('services.edit', compact('service', 'users'));
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $service = ModelService::find($id);
            $service->update([
                'produto' => $request->produto,
                'id_user' => Auth::user()->id,
                'desc' => $request->desc,
                'nome_cliente' => $request->nome_cliente,
                'classificacao' => $request->classificacao,
                'situacao' => false
            ]);
            return redirect('services');
        }
        return redirect('/');
    }

    public function toogleSituacao($id)
    {
        if (Auth::check()) {
            $service = ModelService::find($id);
            $service->update(['situacao' => true]);
            return redirect('services');
        }
        return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $del = ModelService::destroy($id);
            return redirect('services');
        }
        return redirect('/');
    }
}
