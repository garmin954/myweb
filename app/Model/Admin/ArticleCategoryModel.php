<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ArticleCategoryModel extends Base
{
    //
    protected $table = 'article_category';
    protected $primaryKey = 'category_id';
    public $timestamps = true;
}
