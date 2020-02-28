# laravel-principiante

## routing

en `routes/web.php`

```php
Route::get('mensajes',['as'=>'messages.index','uses'=>'MessagesController@index']);

Route::get('mensajes/create',['as'=>'messages.create','uses'=>'MessagesController@create']);

Route::get('mensajes/{id}',['as'=>'messages.show','uses'=>'MessagesController@show']);

Route::post('mensajes',['as'=>'messages.store','uses'=>'MessagesController@store']);

Route::get('mensajes/{id}/edit',['as'=>'messages.edit','uses'=>'MessagesController@edit']);

Route::put('mensajes/{id}',['as'=>'messages.update','uses'=>'MessagesController@update']);

Route::delete('mensajes/{id}',['as'=>'messages.destroy','uses'=>'MessagesController@destroy']);
```

## controller

en `app/Http/Controllers/NameController.php`

```php
<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //$messages = DB::table('messages')->get();
     $messages = Message::all();
     return view("messages.index",compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //DB::table('messages')->insert([
        //    "nombre"=>$request->input('nombre'),
        //    "email"=>$request->input('email'),
        //    "mensaje"=>$request->input('mensaje'),
        //    "created_at"=>Carbon::now(),
        //    "updated_at"=>Carbon::now()
        //]);
        Message::create($request->all());
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);

        return view('messages.edit',compact('message'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$message = DB::table('messages')->where('id',$id)->update([
        //    "nombre"=>$request->input('nombre'),
        //    "email"=>$request->input('email'),
        //    "mensaje"=>$request->input('mensaje'),
        //    "updated_at"=>Carbon::now()
        //]);
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$message = DB::table('messages')->where('id',$id)->delete();
        $message = Message::findOrFail($id)->delete();

        return redirect()->route('messages.index');

    }
}
```
