<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Entry;
use App\Traits\WithModal;

class Index extends Component
{
    use WithModal;

    public $entries;
    public $entry;
    public $search;
    private $regex;

    protected $listeners = ['refreshIndex' => '$refresh'];

    protected function rules()
    {
        $this->entry ? $id = ",{$this->entry->id}" : $id = "";

        return [
            'entry.first_name' => "max:255|required",
            'entry.last_name' => "max:255|required",
            'entry.number' => "max:255|required|unique:entries,number{$id}",
        ];
    }

    public function mount()
    {
        $this->entries = Entry::orderBy('id', 'DESC')->limit(150)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }

    public function search()
    {
        //Search Pattern vom Userinput
        $this->search = trim($this->search);
        $this->search = strtolower($this->search);
        $size = strlen($this->search);

        if($size > 0){
            //Regex Befehl aus Userinput erstellen
            $this->regex = '^';

            for($i = 0; $i < $size; $i++)
            {
                $number = substr($this->search, $i, 1);

                switch ($number) {
                    case "2":
                        $this->regex .= '[abc]';
                        break;
                    case "3":
                        $this->regex .= '[def]'; 
                        break;
                    case "4":
                        $this->regex .= '[ghi]';
                        break;
                    case "5":
                        $this->regex .= '[jkl]';
                        break;
                    case "6":
                        $this->regex .= '[mno]';
                        break;
                    case "7":
                        $this->regex .= '[pqrs]';
                        break;
                    case "8":
                        $this->regex .= '[tuv]';
                        break;
                    case "9":
                        $this->regex .= '[wxyz]';
                        break;
                }

            }

            $this->regex .= '.*';

            $this->entries = Entry::where('first_name', 'REGEXP', $this->regex)
            ->orWhere('last_name', 'REGEXP', $this->regex)
			->limit(150)
            ->get();

            $this->emit('refreshIndex'); 
        } else {
            $this->entries = Entry::orderBy('id', 'DESC')->limit(150)->get();
        };
    }

    public function create()
    {
        $this->entry->first_name = trim($this->entry->first_name);
        $this->entry->last_name = trim($this->entry->last_name);
        $this->entry->number = trim($this->entry->number);

        $this->validate();
        $this->entry->save();

        $this->modal('hide', '#create');
        $this->emit('refreshIndex');
    }

    public function createModal()
    {
        $this->entry = Entry::make();

        $this->modal('show', '#create');
    }
}
