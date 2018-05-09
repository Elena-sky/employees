<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Http\Requests\StoreEmployees;
use Illuminate\Http\Request;
use App\ImageUploader;

class EmployeesController extends Controller
{
    use ImageUploader;

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
     * Display in storage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $employees = Employees::allList();

        return view('employees.list', compact('employees'));
    }

    /**
     * Search all boss by Name
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectBoss(Request $request)
    {
        $queries = Employees::selectBoss($request->q);
        return response()->json($queries);
    }

    /**
     * Store new employee in storage
     *
     * @param StoreEmployees $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmployees $request)
    {
        $parent_id = Employees::getIdByName($request->boss);

        $fileName = ($request->hasFile('photo'))? self::uploader($request) : null;

        $data = [
            'full_name' => $request->full_name,
            'start_date' => $request->start_date,
            'salary' => $request->salary,
            'position' => $request->position,
            'parent_id' => $parent_id,
            'photo' => $fileName,
        ];

        Employees::create($data);

        return redirect()->route('createEmployee');

    }

}
