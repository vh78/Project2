<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Middle;
use App\Device;
use App\Sensor;

class MiddleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Middle::latest()->paginate(15);
        return view('device_sensors/index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 1);

                /*$data = Middle::with('device')->get();
                return view('device_sensors/index',compact('device'));*/

               /* $middle = Middle::all();
                $device = Device::all();
                $sensor = Sensor::all();
            
                return view('device_sensors/index')->with('middle', $middle)->with('device', $device)->with('sensor', $sensor);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $middle = Middle::all();
        $device = Device::all();
        $sensor = Sensor::all();
        return view('device_sensors/create')->with('device', $device)->with('sensor', $sensor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'dev_id'       => 'required',
            'sens_id' => 'required'
          
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('middle')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {

            $middle = new Middle([
                'sens_id' => $request->get('sens_id'),
                'dev_id' => $request->get('dev_id'),
            ]);
            $middle->save();
            return redirect('device_sensors/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Middle::findOrFail($id);
        return view('device_sensors/show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
