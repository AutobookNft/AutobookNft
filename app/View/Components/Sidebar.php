<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\Sidebar as sdb;

class Sidebar extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    public $title;

    public $team;

    public $currentTeamId;

    public $sidebars;

    public $wichsidebar;

    public $dateCreation;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
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

        // $this->sidebars = sdb::where('sidebar', $this->wichsidebar)->orderby('position', 'asc')->get();

        // return view('components.sidebar');

        return view('components.sidebar', [
            'sidebars' => $this->sidebars,
        ]);
    }

}
