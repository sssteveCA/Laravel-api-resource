<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Redirect;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //mostra tutte le persone esistenti nel database
    public function index()
    {
        $persone = Persona::all();
        return view('personas.index')->with('persone',$persone);
    }

    /**
     * lista persone inserite in formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJson(){
        $persone = Persona::all();
        return response()->json($persone,200,array(),JSON_UNESCAPED_UNICODE);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        //se il campo non è vuoto
        if($request->filled('nome')){
            $persona->nome = $request->input('nome');
        }
        else{
            return redirect('error/400')->withErrors(["msg" => "Il campo nome non può essere vuoto"]);
        }
        if($request->filled('cognome')){
            $persona->cognome = $request->input('cognome');
        }
        else{
            return redirect('error/400')->withErrors(["msg" => "Il campo cognome non può essere vuoto"]);
        }
        if($request->filled('eta')){
            $età = $request->input('eta');
            if(is_numeric($età)){
                $persona->età = $età;
            }
            else return redirect('error/400')->withErrors(["msg" =>"Età deve avere un valore numerico"]);
        }
        else{
            return redirect('error/400')->withErrors(["msg" => "Il campo età non può essere vuoto"]);
        }
        if($request->filled('altezza')){
            $altezza = $request->input('altezza');
            if(is_numeric($altezza)){
                $persona->altezza = $altezza;
            }
            else return redirect('error/400')->withErrors(["msg" => "Altezza deve avere un valore numerico"]);
        }
        else{
            return redirect('error/400')->withErrors(["msg" => "Il campo altezza non può essere vuoto"]);
        }
        if($request->filled('residenza')){
            $persona->residenza = $request->input('residenza');
        }
        else{
            return redirect('error/400')->withErrors(["msg" => "Il campo residenza non può essere vuoto"]);
        }
        $save = $persona->save();
        if($save){
            $messaggio = 'La Persona è stata aggiunta al database';
        }
        else{
            $messaggio = 'La persona non è stata aggiunta al database';
        }
        return view('personas.store')->with('messaggio',$messaggio);
    }

    /**
     * Inserisce una nuova Persona nel database e restituisce una risposta in JSON
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeJson(Request $request){
        $persona = new Persona;
        //se il campo non è vuoto
        if($request->filled('nome')){
            $persona->nome = $request->input('nome');
        }
        else{
            return response()->json(["msg" => "Il campo nome non può essere vuoto"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        if($request->filled('cognome')){
            $persona->cognome = $request->input('cognome');
        }
        else{
            return response()->json(["msg" => "Il campo cognome non può essere vuoto"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        if($request->filled('eta')){
            $età = $request->input('eta');
            if(is_numeric($età)){
                $persona->età = $età;
            }
            else return response()->json(["msg" => "Età deve avere un valore numerico"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        else{
            return response()->json(["msg" => "Il campo età non può essere vuoto"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        if($request->filled('altezza')){
            $altezza = $request->input('altezza');
            if(is_numeric($altezza)){
                $persona->altezza = $altezza;
            }
            else return response()->json(["msg" => "Altezza deve avere un valore numerico"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        else{
            return response()->json(["msg" => "Il campo altezza non può essere vuoto"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        if($request->filled('residenza')){
            $persona->residenza = $request->input('residenza');
        }
        else{
            return response()->json(["msg" => "Il campo residenza non può essere vuoto"],400,array(),JSON_UNESCAPED_UNICODE);
        }
        $save = $persona->save();
        if($save){
            $messaggio = array("msg" => "La Persona è stata aggiunta al database");
        }
        else{
            $messaggio = array("msg" => "La persona non è stata aggiunta al database");
        }
        return response()->json($messaggio,200,array(),JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::Find($id);
        if($persona != null){
            return view('personas.show')->with('persona',$persona);
        }
        else{
            return redirect('error/404')->withErrors(['msg' => 'La risorsa che stai cercando non è stata trovata']);
        }

    }

    /**
     * Mostra la persona con id $id e retituisce una risposta JSON
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showJson($id)
    {
        $persona = Persona::Find($id);
        if($persona != null){
            return response()->json($persona,200,array(),JSON_UNESCAPED_UNICODE);
        }
        else return response()->json(['msg' => 'La risorsa che stai cercando non è stata trovata'],404,array(),JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $persona = Persona::find($id);
        if($persona != null){
            $persona->nome = $request->filled('nome')? $request->input('nome') : $persona->nome;
            $persona->cognome = $request->filled('cognome')? $request->input('cognome') : $persona->cognome;
            $persona->età = $request->filled('eta')? $request->input('eta') : $persona->età;
            $persona->altezza = $request->filled('altezza')? $request->input('altezza') : $persona->altezza;
            $persona->residenza = $request->filled('residenza')? $request->input('residenza') : $persona->residenza;
            $save = $persona->save();
            if($save){
                $messaggio = "La persona con id {$id} è stata aggiornata";
            }
            else{
                $messaggio = "Errore durante l'aggiornamento della persona con id {$id}";
            }
            return view('personas.update')->with('messaggio',$messaggio);
        }
        else{
            return redirect('error/404')->withErrors(['msg' => 'La risorsa che vuoi modificare non è stata trovata']);
        }

    }

    /**
     * Modifica una persona con id specifico e restituisce una risposta JSON
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateJson(Request $request, $id)
    {
        $persona = Persona::find($id);
        if($persona != null){
            $persona->nome = $request->filled('nome')? $request->input('nome') : $persona->nome;
            $persona->cognome = $request->filled('cognome')? $request->input('cognome') : $persona->cognome;
            $persona->età = $request->filled('eta')? $request->input('eta') : $persona->età;
            $persona->altezza = $request->filled('altezza')? $request->input('altezza') : $persona->altezza;
            $persona->residenza = $request->filled('residenza')? $request->input('residenza') : $persona->residenza;
            $save = $persona->save();
            if($save){
                $messaggio = array("msg" => "La persona con id {$id} è stata aggiornata");
            }
            else{
                $messaggio = array("msg" => "Errore durante l'aggiornamento della persona con id {$id}");
            }
            return response()->json($messaggio,200,array(),JSON_UNESCAPED_UNICODE);
        }
        else{
            return response()->json(['msg' => 'La risorsa che vuoi modificare non è stata trovata'],404,array(),JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::Find($id);
        if($persona != null){
            $del = $persona->delete();
            if($del){
                return view('personas.destroy')->with('delete',"L'id {$id} è stato cancellato");
            }
            else{
                return view('personas.destroy')->with('delete',"Errore durante la cancellazione dell'id {$id}");
            }
            
        }
        else{
            return redirect('error/404')->withErrors(['msg' => 'La risorsa che vuoi cancellare non è stata trovata']);
        }
    }

     /**
     * Elimina una persona con ID specifico e restituisce una risposta JSON
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyJson($id)
    {
        $persona = Persona::Find($id);
        if($persona != null){
            $del = $persona->delete();
            if($del){
                $messaggio = array("msg" => "L'id {$id} è stato cancellato");
            }
            else{
                $messaggio = array("msg" => "Errore durante la cancellazione dell'id {$id}");
            }
            return response()->json($messaggio,200,array(),JSON_UNESCAPED_UNICODE);
            
        }
        else{
            return response()->json(['msg' => 'La risorsa che vuoi cancellare non è stata trovata'],404,array(),JSON_UNESCAPED_UNICODE);
        }
    }
}
