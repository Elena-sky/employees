<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Http\Requests\StoreEmployees;
use Illuminate\Http\Request;
use App\ImageUploader;

class EmployeesController extends Controller
{
    use ImageUploader;

    public $employyes;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->employyes = new Employees();
    }


    /**
     * Display all employees
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $employees = $this->employyes->allList();

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
        $queries = $this->employyes->selectBoss($request->q);
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
        $parent_id = $this->employyes->getIdByName($request->boss);

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


    /**
     * Display the form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $employee = Employees::find($id);

        return view('employees.update', compact('employee'));
    }


    /**
     * Delete old photo
     *
     * @param $id
     */
    public function deleteOldPhoto($id)
    {
        $imgDelete = $this->employyes->getOldPhoto($id);
        $path = "img/team/" . $imgDelete;
        if (file_exists($path)) {
            unlink($path);
        }
    }


    /**
     * Update the epmloyee
     *
     * @param StoreEmployees $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updated(StoreEmployees $request)
    {
        $id = $request->route('id');

        $parent_id = $this->employyes->getIdByName($request->boss);

        if(!$request->hasFile('photo'))
        {
            // if false
            $data = [
                'full_name' => $request->full_name,
                'start_date' => $request->start_date,
                'salary' => $request->salary,
                'position' => $request->position,
                'parent_id' => $parent_id,
            ];

            $dataE = Employees::find($id);
            $dataE->update($data);

        } else {
            //if true
            self::deleteOldPhoto($id);
            $fileName = self::uploader($request);

            $data = [
                'full_name' => $request->full_name,
                'start_date' => $request->start_date,
                'salary' => $request->salary,
                'position' => $request->position,
                'parent_id' => $parent_id,
                'photo' => $fileName,
            ];

            $dataE = Employees::find($id);
            $dataE->update($data);

        }

        return redirect()->route('updateEmployee', compact('id') );

    }



}
