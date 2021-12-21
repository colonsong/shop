<?php

namespace App\Admin\Controllers;

use App\Models\Category;
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

        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('name', 'name');
            $create->text('pic', 'pic');
            $create->text('content', 'content');
            $create->datetime('sell_at', 'sell_at');
            $create->text('enabled', 'enabled');
        });

        $grid->column('id', __('Id'));
        $grid->categories()->display(function ($category) {

            $category = array_map(function ($category) {
                return "<span class='label label-success'>{$category['title']}</span>";
            }, $category);

            return join('&nbsp;', $category);
        });
        $grid->column('name', __('Name'));
        $grid->column('pic', __('Pic'));
        $grid->column('content', __('Content'));
        $grid->column('price', __('Price'));
        $grid->column('sell_at', __('Sell at'));



        $states = [
        'on'  => ['value' => 1, 'text' => 'OPEN', 'color' => 'primary'],
        'off' => ['value' => 0, 'text' => 'CLOSE', 'color' => 'default'],
        ];
        $grid->column('enabled')->switch($states);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));


        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->between('price', 'price');
            // 在这里添加字段过滤器
            $filter->like('name', 'name');
            $filter->like('content', 'content');


            // 多条件查询
            $filter->between('sell_at', '賣出日期')->datetime();

        });

        $grid->expandFilter();
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
        $form->multipleSelect('categories','Category')->options(Category::all()->pluck('title','id'));
        $form->text('name', __('Name'));
        $form->image('pic', __('Pic'));
       // $form->textarea('content', __('Content'));
        $form->number('price', __('Price'));
        $form->datetime('sell_at', __('Sell at'))->default(date('Y-m-d H:i:s'));
        $form->switch('enabled', __('Enabled'))->default(1);


        $form->ckeditor('content', __('Content'));



        return $form;
    }
}
