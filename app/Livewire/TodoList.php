<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class TodoList extends Component
{

 use WithPagination;

    #[Rule('required|min:3|max:30')]
    public $name;

    public $search;

    public $editingTodoID;
    
    #[Rule('required|min:3|max:30')]
    public $editingTodoName;

    public function createTodo () {
        $validated = $this->validateOnly('name');

        Todo::create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        session()->flash('success','Saved');
    }

    public function delete ($todoID) {
        Todo::find($todoID)->delete();
    }

    public function toggle ($todoID) {
        $todo = Todo::find($todoID);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit ($todoID){
        $this->editingTodoID = $todoID;
        $this->editingTodoName = Todo::find($todoID)->name;
    }

    public function cancel () {
        $this->reset('editingTodoID','editingTodoName');
    }

    public function update () {
        $this->validateOnly('editingTodoName');
        Todo::find($this->editingTodoID)->update([
            'name'=> $this->editingTodoName,
        ]);

        $this->cancel();
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->where('name','like','%'.$this->search.'%')->paginate(5),
        ]);
    }
}