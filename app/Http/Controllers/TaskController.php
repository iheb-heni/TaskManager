<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\file;


class TaskController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->paginate(5);
        return view('task.index', compact('tasks'));
    }

   


    public function ShowaddTaskform(){
        return view('Task.create');
    }





    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:5',
            'description' => 'required|string',
            'phone' => 'required|numeric|unique:tasks,phone|digits:8',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $existingTask = Task::where('phone', $request->phone)->first();
        if ($existingTask) {
            return redirect()->back()->with('error', 'Ce numéro de téléphone existe déjà. Veuillez en choisir un autre.');
        }
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->phone = $request->phone;
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $task->picture = $imageName;
        }
        $task->save();
        return redirect()->route('index')->with('success', 'Tâche ajoutée avec succès');
    }







        public function DeleteTask($id)
{
    try {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('index')->with('success', 'Tâche supprimée avec succès.');
    } catch (\Exception $e) {
        return redirect()->route('index')->with('error', 'Une erreur s\'est produite lors de la suppression de la tâche.');
    }
}





public function showUpdateModal($id)
    {
        $task = Task::find($id);

        if ($task) {
            return view('modals.update-modal', compact('task'));
        } else {
            return redirect()->route('index')->with('error', 'La tâche spécifiée n\'existe pas.');
        }
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'phone' => 'required|numeric|unique:tasks,phone|digits:8',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        try {
            $task = Task::find($id);
            if ($task->picture) {
                $oldImagePath = storage_path('app/public/images/' . $task->picture);
    
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->phone = $request->input('phone');
    
            if ($request->hasFile('picture')) {
                $imagePath = $request->file('picture')->store('public/images');
                    $imageName = basename($imagePath);
                    $task->picture = $imageName;
            }
                $task->save();
                return redirect()->route('index')->with('success', 'La tâche a été mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Une erreur s\'est produite lors de la mise à jour de la tâche.');
        }
    }
    
    }    


    

