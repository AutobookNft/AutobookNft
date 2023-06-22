<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Sidebar as sdb;

class SidebarEditItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;

    public $message;

    public $title;

    public $team;

    public $currentTeamId;

    public $sidebars;

    public $wichsidebar;

    public $dateCreation;


     public function __construct($wichsidebar)
    {
        $this->wichsidebar = $wichsidebar;
        $this->sidebars = config('SidebarConfiguration.' . $wichsidebar, []);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-edit-item', [
             'sidebars' => $this->sidebars,
        ]);
    }
}
