<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $departments = Department::all();
        return view('Department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('Department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);
        $department = new Department([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $department->save();
        return redirect()->route('departments.index')->with('success','Department created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        $department = Department::find($id);
        return  view('Department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return  view('Department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $department = Department::find($id);
        $department->name = $request->get('name');
        $department->description = $request->get('description');
        $department->save();

        return redirect()->route('departments.index')->with('success','Department updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success','Department deleted successful');
    }
}
