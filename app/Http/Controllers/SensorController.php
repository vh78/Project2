<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sensor;
class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sensor::latest()->paginate(15);
       return view('sensore/index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 1);

                //return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensore/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'params'     =>  'required'
         
        ]);
        $form_data = array(
            'name'       =>   $request->name,
            'params'        =>   $request->params
        );
        Sensor::create($form_data);

        return redirect('sensore')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sensor::findOrFail($id);
        return view('sensore/show', compact('data'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sensor::findOrFail($id);
        return view('sensore/edit', compact('data'));
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
        $request->validate([
            'name'    =>  'required',
            'params'     =>  'required'
        ]);
    

    $form_data = array(
        'name'       =>   $request->name,
        'params'        =>   $request->params
    );

    Sensor::whereId($id)->update($form_data);

    return redirect('sensore')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sensor::find($id);
        $data->delete();
        return redirect('sensore')->with('message', 'Sensore was deleted!');
    }
}
