<?php namespace Eyarij\Blog\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'title'                 => 'required|between:4,90',
        'slug'                  => 'required|between:4,90',
        ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'eyarij_blog_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'articles' => 'Eyarij\Blog\Models\Article'
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
