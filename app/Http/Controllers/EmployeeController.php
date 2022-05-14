<?php

namespace App\Http\Controllers;

use App\Companie;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companie::all();
        return view('employees.create',['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $employee = new Employee();
        $employee['first_name'] = $request->first_name;
        $employee['last_name'] = $request->last_name;
        $employee['company_id'] = $request->company_id;
        $employee['email'] = $request->email;
        $employee['phone'] = $request->phone;
        $employee['city'] = $request->city;
        $employee['joining_date'] = $request->join_date;

        if($employee->save()){
            return redirect()->back()->with('success','Successfully data inserted');
        }else{
             return redirect()->back()->with('error','Data not inserted');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function showtable(){

        $data = DB::table('employees AS EMP')
        ->join('companies AS CMP',function($join){
            $join->on('CMP.id','=','EMP.company_id');
        })
        ->select('EMP.id','EMP.first_name','EMP.last_name','EMP.phone as EmpPhone','EMP.email as EmpEmail','EMP.city','CMP.name as company_name','CMP.logo','EMP.joining_date as join_date')
        ->get();

        return view('employees.list',['list'=>$data]);
    }


    // public function showList()
    public function showList(Request $r)
    {
// dd($r->all());
        if ($r->ajax()) {
            // dd($r->search['value']);
            $list_data = DB::table('employees AS EMP')
                        ->join('companies AS CMP',function($join){
                            $join->on('CMP.id','=','EMP.company_id');
                        })
                        ->select('EMP.id as emp_id',DB::raw('CONCAT(EMP.first_name," ",EMP.last_name) AS name'), 'EMP.first_name','EMP.last_name','EMP.phone as EmpPhone','EMP.email as EmpEmail','EMP.city','CMP.name as company_name','CMP.logo','EMP.joining_date as join_date')
                        ->when(isset($r->search['value']),function($q) use($r){
                            $q->where('EMP.first_name','like',"%" . $r->search['value'] . "%")
                            ->orWhere('EMP.last_name','like',"%" . $r->search['value'] . "%")
                            ->orWhere('EMP.phone','like',"%" . $r->search['value'] . "%")
                            ->orWhere('EMP.email','like',"%" . $r->search['value'] . "%")
                            ->orWhere('EMP.city','like',"%" . $r->search['value'] . "%")
                            ->orWhere('EMP.joining_date','like',"%" . $r->search['value'] . "%")
                            ->orWhere('CMP.name','like',"%" . $r->search['value'] . "%");
                        })
                        ->get();

            return DataTables::of($list_data)
                ->addIndexColumn()
                ->filter(function ($query) {
                    if (request()->has('name')) {
                        $query->where('name', 'like', "%" . request('name') . "%");
                    }
                    if (request()->has('EmpPhone')) {
                        $query->where('EmpPhone', 'like', "%" . request('EmpPhone') . "%");
                    }
                    if (request()->has('name')) {
                        $query->where('name', 'like', "%" . request('name') . "%");
                    }
                    if (request()->has('EmpEmail')) {
                        $query->where('EmpEmail', 'like', "%" . request('EmpEmail') . "%");
                    }
                    if (request()->has('city')) {
                        $query->where('city', 'like', "%" . request('city') . "%");
                    }
                    if (request()->has('company_name')) {
                        $query->where('company_name', 'like', "%" . request('company_name') . "%");
                    }
                    if (request()->has('join_date')) {
                        $query->where('join_date', 'like', "%" . request('join_date') . "%");
                    }
                })
                ->make(true);
        }
        return view('employees.list');




        // $list_data = DB::table('employees AS EMP')
        // ->join('companies AS CMP',function($join){
        //     $join->on('CMP.id','=','EMP.company_id');
        // })
        // ->select('EMP.id','EMP.first_name','EMP.last_name','EMP.phone as EmpPhone','EMP.email as EmpEmail','EMP.city','CMP.name as company_name','CMP.logo','EMP.joining_date as join_date')
        // ->get();

        // return Datatables::of($list_data)
        //         ->addIndexColumn()
        //         ->make(true);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
