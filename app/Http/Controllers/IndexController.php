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


}
