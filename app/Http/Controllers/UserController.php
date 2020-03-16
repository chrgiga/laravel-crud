<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Support\Str;
use \Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::all();
        return view('User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $departmentOptions = [];

        foreach(Department::all() as $department) {
            $departmentOptions[] = (object)[
                'value' => $department->id,
                'text' => $department->name
            ];
        }
        return view('User.create', compact('departmentOptions'));
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
            'email' => 'required',
            'work_position' => 'required',
            'work_functions' => 'required'
        ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Str::random(6),
            'work_position' => $request->get('work_position'),
            'work_functions' => $request->get('work_functions'),
        ]);
        $user->save();

        foreach($request->get('departments') as $departmentId) {
            $department = Department::find($departmentId);
            $user->departments()->save($department);
        }

        return redirect()->route('users.index')->with('success','User created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        $user = User::find($id);
        return  view('User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $departmentOptions = [];

        foreach(Department::all() as $department) {
            $departmentOptions[] = (object)[
                'value' => $department->id,
                'text' => $department->name,
                'assigned' => !!$user->departments->find($department->id)
            ];
        }
        return  view('User.edit', compact('user'), compact('departmentOptions'));
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
            'email' => 'required',
            'work_position' => 'required',
            'work_functions' =>'required'
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->work_position = $request->get('work_position');
        $user->work_functions = $request->get('work_functions');
        $user->save();
        $user->departments()->detach();

        foreach($request->get('departments') as $departmentId) {
            $department = Department::find($departmentId);
            $user->departments()->save($department);
        }

        return redirect()->route('users.index')->with('success','User updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successful');
    }
}
