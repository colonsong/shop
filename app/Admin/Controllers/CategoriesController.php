<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Tree;

class CategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    public function index(Content $content)
    {
        $tree = new Tree(new Category);
        $tree->branch(function ($branch) {
            $src = config('admin.upload.host') . '/'  ;
            $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

            return "{$branch['id']} - {$branch['title']} $logo";
        });
        return $content
            ->header('树状模型')
            ->body($tree);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());



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
        $show = new Show(Category::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());
        $categories = Category::all()->pluck('title','id');
        $categories->prepend('root', '0');

        $form->select('parent_id','PID')->options($categories);
        $form->text('title', __('Name'));
        $form->textarea('description', __('description'));

        $form->number('order', __('sort'))->default(0);



        return $form;
    }
}
