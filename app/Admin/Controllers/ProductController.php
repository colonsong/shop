<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('pic', __('Pic'));
        $grid->column('content', __('Content'));
        $grid->column('price', __('Price'));
        $grid->column('sell_at', __('Sell at'));
        $grid->column('enabled', __('Enabled'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('pic', __('Pic'));
        $show->field('content', __('Content'));
        $show->field('price', __('Price'));
        $show->field('sell_at', __('Sell at'));
        $show->field('enabled', __('Enabled'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->image('pic', __('Pic'));
        $form->textarea('content', __('Content'));
        $form->number('price', __('Price'));
        $form->datetime('sell_at', __('Sell at'))->default(date('Y-m-d H:i:s'));
        $form->switch('enabled', __('Enabled'))->default(1);

        return $form;
    }
}
