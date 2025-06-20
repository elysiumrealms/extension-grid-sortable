<?php

namespace Dcat\Admin\GridSortable;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Grid;

class GridSortableServiceProvider extends ServiceProvider
{
    protected $column = '__sortable__';

    public function init()
    {
        parent::init();

        $column = $this->column;

        Grid::macro(
            'sortable',
            function ($sortName = 'order') use ($column) {
                /** @var \Dcat\Admin\Grid $this */
                $this->tools(new SaveOrderButton($sortName));

                if (!request()->has($sortName)) {
                    $this->model()->ordered();
                }

                $this->column($column, ' ')
                    ->displayUsing(SortableDisplay::class, [$sortName]);
            }
        );
    }

    public function settingForm()
    {
        return new Setting($this);
    }
}
