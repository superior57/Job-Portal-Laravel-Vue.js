<?php

/**
 * Class Page.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use File;

/**
 * Class Page
 *
 */
class Page extends Model
{
    /**
     * Pages can have multiple meta
     *
     * @return relation
     */
    public function meta()
    {
        return $this->morphMany('App\Meta', 'metable');
    }

    /**
     * Posts can have multiple meta
     *
     * @return relation
     */
    public function metaValue($meta_key)
    {
        return $this->morphMany('App\Meta', 'metable')->where('meta_key', $meta_key)->select('id', 'meta_value')->first();
    }

    /**
     * Fillables for the database
     *
     * @access protected
     *
     * @var array $fillable
     */
    protected $fillable = array('title', 'slug', 'body');

    /**
     * Set slug attribute
     *
     * @param int $value page ID
     *
     * @return array
     */
    public function setSlugAttribute($value)
    {
        $temp = str_slug($value, '-');
        if (!Page::all()->where('slug', $temp)->isEmpty()) {
            $i = 1;
            $new_slug = $temp . '-' . $i;
            while (!Page::all()->where('slug', $new_slug)->isEmpty()) {
                $i++;
                $new_slug = $temp . '-' . $i;
            }
            $temp = $new_slug;
        }
        $this->attributes['slug'] = $temp;
    }

    /**
     * Get Pages
     *
     * @return array
     */
    public static function getPages()
    {
        $pages = DB::table('pages')->paginate(10);
        return $pages;
    }

    /**
     * Get Parent Pages
     *
     * @param mixed $request $req->attribute
     *
     * @return array
     */
    public function savePage($request)
    {
        if (!empty($request)) {
            $new_sections = array();
            $count = 0;
            $old_path = Helper::PublicPath() . '/uploads/pages/temp';
            $this->title = filter_var($request->title, FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request->title, FILTER_SANITIZE_STRING);
            $this->body = !empty($request->body) ? $request->body : 'null';
            if ($request->parent_id) {
                $this->relation_type = 1;
            } else {
                $this->relation_type = 0;
            }
            $this->save();
            $page_id =  $this->id;
            $new_path = Helper::PublicPath() . '/uploads/pages/' . $page_id;
            $page = self::findOrFail($this->id);
            $page_banner = '';
            if (!empty($request['meta'])) {
                foreach ($request['meta'] as $key => $value) {
                    if (!empty($value)) {
                        if ($key == 'freelancers' || $key == 'cat' || $key == 'services' || $key == 'articles') {
                            foreach ($value as $meta_key => $meta_value) {
                                $meta = new Meta();
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($meta_value);
                                $page->meta()->save($meta);
                            }
                        } elseif ($key == 'content') {
                            foreach ($value as $meta_key => $meta_value) {
                                $content_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $content_key => $content) {
                                    if ($content_key == 'description') {
                                        $content_section[$content_key] = str_replace('"', "'", $content);
                                    } else {
                                        $content_section[$content_key] = $content;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($content_section);
                                $page->meta()->save($meta);
                            }
                        } elseif ($key == 'sliders') {
                            foreach ($value as $meta_key => $meta_value) {
                                $attachments = array();
                                $slider_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $slider_key => $slider) {
                                    if ($slider_key == 'slider_image' && !empty($slider)) {
                                        foreach ($slider as $attachment_key => $attachment) {
                                            if (!empty($attachment) && file_exists($old_path . '/' . $attachment)) {
                                                if (!file_exists($new_path)) {
                                                    File::makeDirectory($new_path, 0755, true, true);
                                                }
                                                $filename = time() . '-' . $attachment;
                                                rename($old_path . '/' . $attachment, $new_path . '/' . $filename);
                                                $attachments[$attachment_key] = $filename;
                                            }
                                        }
                                        $slider_section[$slider_key] = $attachments;
                                    } elseif (($slider_key == 'inner_banner_image' || $slider_key == 'floating_image01' || $slider_key == 'floating_image02') && !empty($slider)) {
                                        if (file_exists($old_path . '/' . $slider)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $slider;
                                            rename($old_path . '/' . $slider, $new_path . '/' . $filename);
                                            $slider_section[$slider_key] = $filename;
                                        }
                                    } elseif ($slider_key == 'description' || $slider_key == 'video_description') {
                                        $slider_section[$slider_key] = str_replace('"', "'", $slider);
                                    } else {
                                        $slider_section[$slider_key] = $slider;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($slider_section);
                                $page->meta()->save($meta);
                            }
                        } elseif ($key == 'welcome_sections' && !empty($value)) {
                            foreach ($value as $meta_key => $meta_value) {
                                $welcome_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $welcome_key => $welcome) {
                                    if ($welcome_key == 'welcome_background') {
                                        $filename = $welcome;
                                        if (file_exists($old_path . '/' . $welcome)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $welcome;
                                            rename($old_path . '/' . $welcome, $new_path . '/' . $filename);
                                        }
                                        $welcome_section[$welcome_key] = $filename;
                                    } else if ($welcome_key == 'first_description' || $welcome_key == 'second_description') {
                                        $welcome_section[$welcome_key] = str_replace('"', "'", $welcome);
                                    } else {
                                        $welcome_section[$welcome_key] = $welcome;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($welcome_section);
                                $page->meta()->save($meta);
                            }
                        } elseif ($key == 'work_videos' && !empty($value)) {
                            foreach ($value as $meta_key => $meta_value) {
                                $video_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $video_key => $work_video) {
                                    if ($video_key == 'video_poster') {
                                        $filename = $work_video;
                                        if (file_exists($old_path . '/' . $work_video)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $work_video;
                                            rename($old_path . '/' . $work_video, $new_path . '/' . $filename);
                                        }
                                        $video_section[$video_key] = $filename;
                                    } else {
                                        $video_section[$video_key] = $work_video;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($video_section);
                                $page->meta()->save($meta);
                            }
                        } elseif ($key == 'app_section') {
                            foreach ($value as $meta_key => $meta_value) {
                                $app_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $app_key => $app) {
                                    if (($app_key == 'background_image' || $app_key == 'app_image') && !empty($app)) {
                                        if (file_exists($old_path . '/' . $app)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $app;
                                            rename($old_path . '/' . $app, $new_path . '/' . $filename);
                                            $app_section[$app_key] = $filename;
                                        }
                                    } else if ($app_key == 'description') {
                                        $app_section[$app_key] = str_replace('"', "'", $app);
                                    } else {
                                        $app_section[$app_key] = $app;
                                    }
                                    $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                    $meta->meta_value = serialize($app_section);
                                    $page->meta()->save($meta);
                                }
                            }
                        } elseif ($key == 'work_tabs') {
                            foreach ($value as $meta_key => $meta_value) {
                                $work_tab_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $work_tab_key => $work_tab) {
                                    if (($work_tab_key == 'background_image' || $work_tab_key == 'first_tab_icon' || $work_tab_key == 'second_tab_icon' || $work_tab_key == 'third_tab_icon' || $work_tab_key == 'fourth_tab_icon') && !empty($work_tab)) {
                                        if (file_exists($old_path . '/' . $work_tab)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $work_tab;
                                            rename($old_path . '/' . $work_tab, $new_path . '/' . $filename);
                                            $work_tab_section[$work_tab_key] = $filename;
                                        }
                                    } else if ($work_tab_key == 'description') {
                                        $work_tab_section[$work_tab_key] = str_replace('"', "'", $work_tab);
                                    } else {
                                        $work_tab_section[$work_tab_key] = $work_tab;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($work_tab_section);
                                $page->meta()->save($meta);
                            }
                        } elseif ($key == 'title') {
                            $meta = new Meta();
                            $meta->meta_key = $key;
                            $meta->meta_value = $value['show'];
                            $page->meta()->save($meta);
                        }
                    }
                }
            }
            if (!empty(json_decode($request['sections']))) {
                $sections = json_decode($request['sections']);
                $page->sections = serialize($sections);
                $page->save();
            }
            if (!file_exists($old_path)) {
                File::makeDirectory($old_path, 0755, true, true);
            }
            if (!empty($request['page_banner_value'])) {
                $page_banner = $request['page_banner_value'];
                if (file_exists($old_path . '/' . $request['page_banner_value'])) {
                    if (!file_exists($new_path)) {
                        File::makeDirectory($new_path, 0755, true, true);
                    }
                    $filename = time() . '-' . $request['page_banner_value'];
                    rename($old_path . '/' . $request['page_banner_value'], $new_path . '/' . $filename);
                    $page_banner = $filename;
                } 
            }
            if (!empty($request['seo_desc'])) {
                DB::table('site_managements')->insert(
                    [
                        'meta_key' => 'seo-desc-' . $page_id, 'meta_value' => $request['seo_desc'],
                        "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                    ]
                );
            }
            if ($request['show_page'] == true) {
                $show_page = 1;
            } else {
                $show_page = 0;
            }
            DB::table('site_managements')->where('meta_key', '=', 'show-page-' . $page_id)->delete();
            DB::table('site_managements')->insert(
                [
                    'meta_key' => 'show-page-' . $page_id, 'meta_value' => $show_page,
                    "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                ]
            );
            if ($request['show_page_banner'] == true) {
                $show_banner = 1;
            } else {
                $show_banner = 0;
            }
            DB::table('site_managements')->where('meta_key', '=', 'show-banner-' . $page_id)->delete();
            DB::table('site_managements')->insert(
                [
                    'meta_key' => 'show-banner-' . $page_id, 'meta_value' => $show_banner,
                    "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                ]
            );
            if (!empty($page_banner)) {
                DB::table('site_managements')->insert(
                    [
                        'meta_key' => 'page-banner-' . $page_id, 'meta_value' => $page_banner,
                        "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                    ]
                );
            }
            return $page_id;
        }
    }

    /**
     * Get Parent Pages
     *
     * @param int   $id      page ID
     * @param mixed $request request
     *
     * @return array
     */
    public function updatePage($id, $request)
    {
        $old_path = Helper::PublicPath() . '/uploads/pages/temp';
        if (!empty($id) && !empty($request)) {
            $pages = Page::find($id);  // select * from pages where id=id
            if ($pages->title != $request->title) {
                $pages->slug = filter_var($request->title, FILTER_SANITIZE_STRING);
            }
            $pages->title = filter_var($request->title, FILTER_SANITIZE_STRING);
            $pages->body = !empty($request->body) ? $request->body : 'null';
            if ($request->parent_id == null) {
                $pages->relation_type = 0;
            } elseif ($request->parent_id) {
                $pages->relation_type = 1;
            }
            $pages->save();
            $new_path = Helper::PublicPath() . '/uploads/pages/' . $id;
            $slider_section = array();
            $welcome_section = array();
            $app_section = array();
            $attachments = array();
            $work_tab_section = array();
            $page_banner = '';
            if (!empty($request['meta'])) {
                $pages->meta()->delete();
                foreach ($request['meta'] as $key => $value) {
                    if (!empty($value)) {
                        if ($key == 'freelancers' || $key == 'cat' || $key == 'services' || $key == 'articles') {
                            foreach ($value as $meta_key => $meta_value) {
                                $meta = new Meta();
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($meta_value);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'content') {
                            foreach ($value as $meta_key => $meta_value) {
                                $content_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $content_key => $content) {
                                    if ($content_key == 'description') {
                                        $content_section[$content_key] = str_replace('"', "'", $content);
                                    } else {
                                        $content_section[$content_key] = $content;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($content_section);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'sliders') {
                            foreach ($value as $meta_key => $meta_value) {
                                $attachments = array();
                                $slider_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $slider_key => $slider) {
                                    if ($slider_key == 'slider_image' && !empty($slider)) {
                                        foreach ($slider as $attachment_key => $attachment) {
                                            if (!empty($attachment)) {
                                                $filename = $attachment;
                                                if (file_exists($old_path . '/' . $attachment)) {
                                                    if (!file_exists($new_path)) {
                                                        File::makeDirectory($new_path, 0755, true, true);
                                                    }
                                                    $filename = time() . '-' . $attachment;
                                                    rename($old_path . '/' . $attachment, $new_path . '/' . $filename);
                                                    // echo $filename;
                                                }
                                                $attachments[$attachment_key] = $filename;
                                            }
                                        }
                                        $slider_section[$slider_key] = $attachments;
                                    } elseif (($slider_key == 'inner_banner_image' || $slider_key == 'floating_image01' || $slider_key == 'floating_image02')) {
                                        if (!empty($slider)) {
                                            $filename = $slider;
                                            if (file_exists($old_path . '/' . $slider)) {
                                                if (!file_exists($new_path)) {
                                                    File::makeDirectory($new_path, 0755, true, true);
                                                }
                                                $filename = time() . '-' . $slider;
                                                rename($old_path . '/' . $slider, $new_path . '/' . $filename);
                                            }
                                            $slider_section[$slider_key] = $filename;
                                        }
                                    } elseif ($slider_key == 'description' || $slider_key == 'video_description') {
                                        $slider_section[$slider_key] = str_replace('"', "'", $slider);
                                    } else {
                                        $slider_section[$slider_key] = $slider;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($slider_section);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'welcome_sections' && !empty($value)) {
                            foreach ($value as $meta_key => $meta_value) {
                                $welcome_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $welcome_key => $welcome) {
                                    if ($welcome_key == 'welcome_background' && !empty($welcome)) {
                                        if (file_exists($old_path . '/' . $welcome)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $welcome;
                                            rename($old_path . '/' . $welcome, $new_path . '/' . $filename);
                                        } else {
                                            $filename = $welcome;
                                        }
                                        $welcome_section[$welcome_key] = $filename;
                                    } elseif ($welcome_key == 'first_description' || $welcome_key == 'second_description') {
                                        $welcome_section[$welcome_key] = str_replace('"', "'", $welcome);
                                    } else {
                                        $welcome_section[$welcome_key] = $welcome;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($welcome_section);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'work_videos' && !empty($value)) {
                            foreach ($value as $meta_key => $meta_value) {
                                $video_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $video_key => $work_video) {
                                    if ($video_key == 'video_poster' && !empty($work_video)) {
                                        $filename = $work_video;
                                        if (file_exists($old_path . '/' . $work_video)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $work_video;
                                            rename($old_path . '/' . $work_video, $new_path . '/' . $filename);
                                        }
                                        $video_section[$video_key] = $filename;
                                    } else {
                                        $video_section[$video_key] = $work_video;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($video_section);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'app_section') {
                            foreach ($value as $meta_key => $meta_value) {
                                $app_section = array();
                                $meta = new Meta();
                                foreach ($meta_value as $app_key => $app) {
                                    if (($app_key == 'background_image' || $app_key == 'app_image') && !empty($app)) {
                                        $filename = $app;
                                        if (file_exists($old_path . '/' . $app)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $app;
                                            rename($old_path . '/' . $app, $new_path . '/' . $filename);
                                        }
                                        $app_section[$app_key] = $filename;
                                    } else if ($app_key == 'description') {
                                        $app_section[$app_key] = str_replace('"', "'", $app);
                                    } else {
                                        $app_section[$app_key] = $app;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($app_section);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'work_tabs') {
                            foreach ($value as $meta_key => $meta_value) {
                                $work_tab_section = array();
                                // $meta_id = !empty($pages->metaValue($key . (string) $value[$meta_key]['parentIndex'])->id) ? $pages->metaValue($key . (string) $value[$meta_key]['parentIndex'])->id : '';
                                // if (!empty($meta_id)) {
                                //     $meta = Meta::find($meta_id);
                                // } else {
                                //     $meta = new Meta();
                                // }
                                $meta = new Meta();
                                foreach ($meta_value as $work_tab_key => $work_tab) {
                                    if (($work_tab_key == 'background_image' || $work_tab_key == 'first_tab_icon' || $work_tab_key == 'second_tab_icon' || $work_tab_key == 'third_tab_icon' || $work_tab_key == 'fourth_tab_icon') && !empty($work_tab)) {
                                        $filename = $work_tab;
                                        if (file_exists($old_path . '/' . $work_tab)) {
                                            if (!file_exists($new_path)) {
                                                File::makeDirectory($new_path, 0755, true, true);
                                            }
                                            $filename = time() . '-' . $work_tab;
                                            rename($old_path . '/' . $work_tab, $new_path . '/' . $filename);
                                        } 
                                        $work_tab_section[$work_tab_key] = $filename;
                                    } elseif ($work_tab_key == 'description') {
                                        $work_tab_section[$work_tab_key] = str_replace('"', "'", $work_tab);
                                    } else {
                                        $work_tab_section[$work_tab_key] = $work_tab;
                                    }
                                }
                                $meta->meta_key = $key . (string) $value[$meta_key]['parentIndex'];
                                $meta->meta_value = serialize($work_tab_section);
                                $pages->meta()->save($meta);
                            }
                        } elseif ($key == 'title') {
                            $meta = new Meta();
                            $meta->meta_key = $key;
                            $meta->meta_value = $value['show'];
                            $pages->meta()->save($meta);
                        }
                    }
                }
            }
            if (!empty(json_decode($request['sections']))) {
                $sections = json_decode($request['sections']);
                $pages->sections = serialize($sections);
                $pages->save();
            }
            if (!file_exists($old_path)) {
                File::makeDirectory($old_path, 0755, true, true);
            }
            if (!empty($request['page_banner_value'])) {
                $page_banner = $request['page_banner_value'];
                if (file_exists($old_path . '/' . $request['page_banner_value'])) {
                    if (!file_exists($new_path)) {
                        File::makeDirectory($new_path, 0755, true, true);
                    }
                    $filename = time() . '-' . $request['page_banner_value'];
                    rename($old_path . '/' . $request['page_banner_value'], $new_path . '/' . $filename);
                    $page_banner = $filename;
                }
            }
            if (!empty($request['seo_desc'])) {
                DB::table('site_managements')->where('meta_key', '=', 'seo-desc-' . $id)->delete();
                DB::table('site_managements')->insert(
                    [
                        'meta_key' => 'seo-desc-' . $id, 'meta_value' => $request['seo_desc'],
                        "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                    ]
                );
            }
            if ($request['show_page'] == true) {
                $show_page = 1;
            } else {
                $show_page = 0;
            }
            DB::table('site_managements')->where('meta_key', '=', 'show-page-' . $id)->delete();
            DB::table('site_managements')->insert(
                [
                    'meta_key' => 'show-page-' . $id, 'meta_value' => $show_page,
                    "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                ]
            );
            if ($request['show_page_banner'] == true) {
                $show_banner = 1;
            } else {
                $show_banner = 0;
            }
            DB::table('site_managements')->where('meta_key', '=', 'show-banner-' . $id)->delete();
            DB::table('site_managements')->insert(
                [
                    'meta_key' => 'show-banner-' . $id, 'meta_value' => $show_banner,
                    "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                ]
            );
            
            if (!empty($page_banner)) {
                DB::table('site_managements')->where('meta_key', '=', 'page-banner-' . $id)->delete();
                DB::table('site_managements')->insert(
                    [
                        'meta_key' => 'page-banner-' . $id, 'meta_value' => $page_banner,
                        "created_at" => Carbon::now(), "updated_at" => Carbon::now()
                    ]
                );
            }
        }
    }

    /**
     * Get Page Data
     *
     * @param int $slug Slug
     *
     * @return array
     */
    public static function getPageData($slug)
    {
        if (!empty($slug) && is_string($slug)) {
            return DB::table('pages')->select('*')->where('slug', $slug)->get()->first();
        }
    }

    /**
     * Get Parent Slug
     *
     * @param int $id page ID
     *
     * @return array
     */
    public static function getPageslug($id)
    {
        if (!empty($id) && is_numeric($id)) {
            return DB::table('pages')->select('slug')->where('id', $id)->get()->first();
        }
    }


    /**
     * Get Parent Pages
     *
     * @param int $id pageID
     *
     * @return array
     */
    public function getParentPages($id = '')
    {
        if (!empty($id)) {
            return DB::table('pages')->where('relation_type', 0)->where('id', '!=', $id)->pluck('title', 'id')->prepend('Select parent', '');
        } else {
            return DB::table('pages')->where('relation_type', '=', 0)->pluck('title', 'id')->prepend('Select parent', '');
        }
    }

    /**
     * Get Page List
     *
     * @return array
     */
    public static function getPageList()
    {
        return DB::table('pages')->select('title', 'slug')->pluck('title', 'slug');
    }

    /**
     * Get Child Pages
     *
     * @param int $child_id page child ID
     *
     * @return array
     */
    public static function getChildPages($child_id)
    {
        return DB::table('pages')->select('title', 'slug', 'id')->where('id', $child_id)->get()->first();
    }

    /**
     * Get pages with child
     *
     * @param int $page_id page ID
     *
     * @return array
     */
    public static function pageHasChild($page_id)
    {
        if (!empty($page_id) && is_numeric($page_id)) {
            return DB::table('pages')
                ->join('child_pages', 'pages.id', '=', 'child_pages.parent_id')
                ->select('pages.id', 'pages.title', 'child_pages.child_id')
                ->where('child_pages.parent_id', '=', $page_id)
                ->get()->all();
        }
    }

    /**
     * Get Slider
     *
     * @param int $page_id page ID
     *
     * @return array
     */
    public static function getPageSlider($meta)
    {
        if ($meta['style'] == 'style1') {
            ob_start();
?>
            <div class="wt-haslayout wt-bannerholder" style="background-image:url(<?php url('/'); ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                            <div class="wt-bannerimages">
                                <figure class="wt-bannermanimg" data-tilt>
                                    <img src="{{{ asset(Helper::getHomeBanner('inner_image')) }}}" alt="{{{ trans('lang.img') }}}">
                                </figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                            <div class="wt-bannercontent">
                                <div class="wt-bannerhead">
                                    <div class="wt-title">
                                        <h1>
                                            <span>{{{ Helper::getHomeBanner('title') }}}</span>
                                            {{{ Helper::getHomeBanner('subtitle') }}}
                                        </h1>
                                    </div>
                                    <div class="wt-description">
                                        <p>{{{ Helper::getHomeBanner('description') }}}</p>
                                    </div>
                                </div>
                                <search-form :widget_type="'home'" :placeholder="'{{ trans('lang.looking_for') }}'" :freelancer_placeholder="'{{ trans('lang.search_filter_list.freelancer') }}'" :employer_placeholder="'{{ trans('lang.search_filter_list.employers') }}'" :job_placeholder="'{{ trans('lang.search_filter_list.jobs') }}'" :service_placeholder="'{{ trans('lang.search_filter_list.services') }}'" :no_record_message="'{{ trans('lang.no_record') }}'">
                                </search-form>
                                <div class="wt-videoholder">
                                    <div class="wt-videoshow">
                                        <a data-rel="prettyPhoto[video]" href="{{{ Helper::getHomeBanner('video_url') }}}"><i class="fa fa-play"></i></a>
                                    </div>
                                    <div class="wt-videocontent">
                                        <span>{{{ Helper::getHomeBanner('video_title') }}}<em>{{{ Helper::getHomeBanner('video_description') }}}</em></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
            return ob_get_clean();
        }
    }
}
