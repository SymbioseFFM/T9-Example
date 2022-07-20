<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableBodyActions extends Component
{
    public $show;
    public $edit;
    public $delete;
    public $objectId;
 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($show = NULL, $edit = NULL, $delete = NULL, $objectId = NULL)
    {
        $this->show = $show;
        $this->edit = $edit;
        $this->delete = $delete;
        $this->objectId = $objectId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-body-actions');
    }
}
