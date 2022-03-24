<?php

namespace App\Http\Controllers;

use App\Models\ItemTask;
use App\Models\Task;
use Illuminate\Http\Request;

class ItemTaskController extends Controller
{
    public function __construct(ItemTask $itemTask){
        $this->model = $itemTask;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemTask = $this->model->all();
        return view('itemTask',compact('itemTask'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelTask = new Task();
        $task= $modelTask->all();
        return view('createTaskItem',compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->model->create($request->all());
            return redirect('itemTask');

        }
        catch (\Throwable $th){
            return redirect('itemTask');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('itemTask');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemTask=$this->model->find($id);
        $task = Task::all();
        return view('createTaskItem',compact('itemTask','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemTask = $this->model->find($id);
        if(!$itemTask){
            return redirect('itemTask');
        }
        try{
            $dados = $request->all();
            $itemTask->fill($dados)->save();
            return redirect('itemTask');
        }catch (\Throwable $th){
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del= ItemTask::destroy($id);
        return($del)?"sim":"não";
    }
}
