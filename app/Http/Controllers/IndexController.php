<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeesRepository;
use App\WorkersTrait;
use Illuminate\Http\Request;
use App\Employees as Employees;


class IndexController extends Controller
{

    /**
     * Display the tree.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBoss = Employees::getBoss();

        return view('index',compact('dataBoss'));
    }


    /**
     * Get subordinates
     *
     * @param Request $request
     * @return mixed
     */
    public function getNextLevel(Request $request)
    {
        return Employees::find($request->id)->workers()->get();

    }

}
