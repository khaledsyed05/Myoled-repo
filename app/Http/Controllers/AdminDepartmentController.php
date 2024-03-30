<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class AdminDepartmentController extends Controller
{
    public function index()
    {
        return view('admin.departmentIndex', [
            'departments' => department::all()
        ]);
    }

    public function create()
    {
        return view('admin.departmentCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         =>          "required",
            "description"   =>          "required",
            "cover"         =>          "required|mimes:png,jpg"
        ]);
        $fileName = uniqid("dept_") . "." . $request->file('cover')->getClientOriginalExtension();
        $department = department::create([
            'name'         =>          $request->name,
            'description'   =>          $request->description,
            'cover'         =>          $fileName
        ]);
        $request->file('cover')->move(public_path("dept-images"), $fileName);
        if ($department) {
            return redirect()->route('department.index')->with("success", "added successfully");
        } else {
            return redirect()->back()->with("errox", "error");
        }
    }



    public function show(Department $department)
    {
        if (!$department) {
            return redirect()->route('department.index');
        }

        return view('admin.departmentShow', [
            'department' => $department
        ]);
    }

    public function edit($id)
    {
        $department = department::find($id);

        $data = [
            'department'          =>          $department
        ];

        return view("admin.departmentEdit", $data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'         =>          "required",
            "description"   =>          "required",
        ]);
        $department= department::find($id);
        $department->name      = $request->name;
        $department->description = $request->description;


        if ($request->hasFile('cover')) {

            if ($department->cover && file_exists(public_path("dept-images/{$department->cover}"))) {
                unlink(public_path("dept-images/{$department->cover}"));
            }

            $newFileName = uniqid('dept_') . '.' . $request->file('cover')->getClientOriginalExtension();

            $request->file('cover')->move(public_path('dept-images'), $newFileName);

            $department->cover = $newFileName;
        }

        $department->save();

        if (!$department->save()) {

            return back()->withErrors([
                'error' => 'Error updating department'
            ]);
        }

        return redirect()->route('department.index')
            ->with('success', 'Department updated');
    }
    public function destroy(Department $department)
    {
        if (!$department) {
            return redirect()->back()->withErrors(['id' => 'Department not found']);
        }

        if ($department->cover) {
            unlink(public_path("dept-images/{$department->cover}"));
        }

        $department->forceDelete();

        return redirect()->route('department.index')
            ->with('success', 'Department deleted');
    }
}
