<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Preview extends Component
{
    public $previewData;
    /**
     * Create a new component instance.
     *
     * @param array() previewData
     */
    public function __construct($previewData)
    {
        $this->previewData = $previewData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.preview');
    }
}
