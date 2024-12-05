<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasSEO;

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }
}
