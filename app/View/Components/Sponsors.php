<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sponsors extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sponsors');
    }

    public function sponsors()
    {
        return [
            'crystal-bars' => [
                'name' => 'Crystal Bars',
                'url' => 'https://crystalbars.co.za',
                'img' => 'sponsor_crystal-bars.svg',
                'alt' => 'Transparent burglar bars'
            ],
            'coenie-marias' => [
                'name' => 'Coenie Marais inhouse finishings',
                'url' => 'https://coeniemarais.co.za',
                'img' => 'sponsor_coenie-marais.svg',
                'alt' => 'House redesign'
            ],
            'designbycode' => [
                'name' => 'DesignByCode',
                'url' => 'https://designbycode.co.za',
                'img' => 'sponsor_designbycode.svg',
                'alt' => 'Web design and development'
            ],
            'busimix-transport' => [
                'name' => 'Busimix Transport',
                'url' => 'https://busimixtransport.co.za',
                'img' => 'sponsor_busimix.svg',
                'alt' => 'Transparent burglar bars'
            ],
            'unique-tillers' => [
                'name' => 'Unique Tillers',
                'url' => 'https://uniquetillers.co.za',
                'img' => 'sponsor_unique-tillers.svg',
                'alt' => 'Gardern Tillers'
            ],
        ];
    }
}
