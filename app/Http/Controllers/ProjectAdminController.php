<?php

namespace App\Http\Controllers;

use App\Models\ProjectApi;
use Illuminate\Http\Request;

class ProjectAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index',[
            'project' => ProjectApi::getDataFromAPI()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_project = $request->validate([
            'nama_project' => ['required', 'numeric'],
            'tugas' => ['required'],
            'deskripsi' => ['required'],
            'tgl_mulai' => ['required'],
            'tgl_selesai' => ['required']
        ]);
    
        // Panggil metode postDataToAPI() dengan data yang divalidasi
        ProjectApi::postDataToAPI($data_project);
    
        return redirect('index')->with('success', 'Data project Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, ProjectApi $project)
    {
        return view('project.edit',[
            'project' => $project
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data_project = $request->validate([
            'nama_project' => ['required', 'numeric'],
            'tugas' => ['required'],
            'deskripsi' => ['required'],
            'tgl_mulai' => ['required'],
            'tgl_selesai' => ['required']
        ]);
    
        // Panggil metode postDataToAPI() dengan data yang divalidasi
        ProjectApi::updateDataInAPI($id, $data_project);
    
        return redirect('index')->with('success', 'Data project Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectApi $project)
    {
        
    }
}