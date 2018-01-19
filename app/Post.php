<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends BaseModel
{
    use SoftDeletes;
    protected $fillable = [
        'slug', 'title', 'body'
    ];
    public static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->update(['slug' => $post->title]);
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function setSlugAttribute($value)
    {
        $slug = str_slug($value);
        if (static::where('slug', $slug)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }
    public function path()
    {
        return "/post/{$this->slug}";
    }
}
