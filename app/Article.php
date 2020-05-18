<?php

namespace App;

use Auth;
use App\ArticleCategory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     *
     * @var array $fillable
     */
    protected $fillable = array(
        'title', 'slug', 'description'
    );

    /**
     * Protected Date
     *
     * @access protected
     * @var    array $dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Article belongs to a user.
     *
     * @return relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Articles can have multiple categories.
     *
     * @return relation
     */
    public function categories()
    {
        return $this->belongsToMany('App\ArticleCategory', 'article_category');
    }

    /**
     * Set slug before saving in DB
     *
     * @param string $value value
     *
     * @access public
     *
     * @return string
     */
    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $temp = str_slug($value, '-');
            if (!Article::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!Article::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * Saving categories
     *
     * @param string $request get req attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function saveArticles($request)
    {
        if (!empty($request)) {
            $this->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->description = $request['description'];
            $this->user()->associate(Auth::user());
            $old_path = Helper::PublicPath() . '/uploads/articles/temp';
            if (!empty($request['uploaded_image'])) {
                $filename = $request['uploaded_image'];
                if (file_exists($old_path . '/' . $request['uploaded_image'])) {
                    $new_path = Helper::PublicPath().'/uploads/articles/';
                    if (!file_exists($new_path)) {
                        File::makeDirectory($new_path, 0755, true, true);
                    }
                    $filename = time() . '-' . $request['uploaded_image'];
                    rename($old_path . '/' . $request['uploaded_image'], $new_path . '/' . $filename);
                    rename($old_path . '/x-small-' . $request['uploaded_image'], $new_path . '/x-small-' . $filename);
                    rename($old_path . '/small-' . $request['uploaded_image'], $new_path . '/small-' . $filename);
                    rename($old_path . '/medium-' . $request['uploaded_image'], $new_path . '/medium-' . $filename);
                    rename($old_path . '/large-' . $request['uploaded_image'], $new_path . '/large-' . $filename);
                }
                $this->banner = filter_var($filename, FILTER_SANITIZE_STRING);
            } else {
                $this->banner = null;
            }
            $this->save();
            if (!empty($request['cats'])) {
                foreach ($request['cats'] as $cat) {
                    $this->categories()->attach($cat, ['article_id' => $this->id]);
                }
            }
            $json['type'] = 'success';
            $json['message'] = trans('lang.article_created');
            return $json;
        }
    }

    /**
     * Updating Categories
     *
     * @param string $request get request attributes
     * @param int    $id      get department id for updation
     *
     * @return \Illuminate\Http\Response
     */
    public function updateArticles($request, $id)
    {
        if (!empty($request)) {
            $article = self::find($id);
            if ($article->title != $request['title']) {
                $article->slug  =  filter_var($request['title'], FILTER_SANITIZE_STRING);
            }
            $article->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $article->description = $request['description'];
            $old_path = Helper::PublicPath() . '/uploads/articles/temp';
            if (!empty($request['uploaded_image'])) {
                $filename = $request['uploaded_image'];
                if (file_exists($old_path . '/' . $request['uploaded_image'])) {
                    $new_path = Helper::PublicPath().'/uploads/articles/';
                    if (!file_exists($new_path)) {
                        File::makeDirectory($new_path, 0755, true, true);
                    }
                    $filename = time() . '-' . $request['uploaded_image'];
                    rename($old_path . '/' . $request['uploaded_image'], $new_path . '/' . $filename);
                    rename($old_path . '/x-small-' . $request['uploaded_image'], $new_path . '/x-small-' . $filename);
                    rename($old_path . '/small-' . $request['uploaded_image'], $new_path . '/small-' . $filename);
                    rename($old_path . '/medium-' . $request['uploaded_image'], $new_path . '/medium-' . $filename);
                    rename($old_path . '/large-' . $request['uploaded_image'], $new_path . '/large-' . $filename);
                }
                $article->banner = filter_var($filename, FILTER_SANITIZE_STRING);
            } else {
                $article->banner = null;
            }
            $article->save();
            $article->categories()->detach();
            if (!empty($request['cats'])) {
                foreach ($request['cats'] as $cat) {
                    $article->categories()->attach($cat, ['article_id' => $article->id]);
                }
            }
            $json['type'] = 'success';
            return $json;
        }
    }
}
