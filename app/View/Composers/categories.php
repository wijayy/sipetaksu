<?php

namespace App\View\Composers;

use App\Models\Categories as ModelsCategories;
use Illuminate\View\View;

class categories
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
      $view->with('categories', ModelsCategories::all());
    }
}
