<?php namespace Eyarij\Blog\Models;

use Model;
use \October\Rain\Database\Traits\Validation;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\NestedTree;

/**
 * Article Model
 */
class Article extends Model
{
    use Validation, Sortable;

    const SORT_ORDER = 'position';

    public $rules = [
        'title'                 => 'required|between:4,90',
        'slug'                  => 'required|between:4,90',
        'description'           => 'required|between:30,100000',
        'created_at'            => 'required',
        'images'                => 'required',
        'category_id'                => 'required',
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'eyarij_blog_articles';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public function getCategoryIdOptions($value, $formData)
    {
        $categories = Category::where('show_content','=','1')->get();
        $array = array();
        foreach ($categories as $value){
            $array[$value['id']] = [$value['title']];
    }
        return  $array;
    }

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'category' => 'Eyarij\Blog\Models\Category'
    ];
    public $belongsToMany = [
        'tags' =>[
            'Eyarij\Blog\Models\Tag',
            'table' =>'eyarij_blog_articles_tags',
            'order' => 'position asc'

        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = ['images' => ['System\Models\File']];
}
