<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServicesExport;

class ServiceController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('services.index-service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->orderBy('name','asc')->get();
        return view('services.create-service', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = $request->all();
        
        Service::create($service);

        return redirect()->route('services.index')->with('success', 'Servicio creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('services.show-service', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $users = DB::table('users')->orderBy('name','asc')->get();
        

        return view('services.edit-service', compact('service','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service_data = $request->all();
        
        $service->update($service_data);

        return redirect()->route('services.index')->with('success', 'Servicio editado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service_select = Service::find($id);

        try{
            $service_select->delete();
            return redirect()->route('services.index')->with('success', 'Servicio eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('services.index')->with('error',$e->getMessage());
        }
    }

    /* Export Services to excel with Personal relationship  */
    public function exportExcel()
    {
        /* dd(Service::with('personal:id,name')->get()); */
        return Excel::download(new ServicesExport(), 'services-list.xlsx');
    }

}


