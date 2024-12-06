<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
      /** @return HasMany<Post> */
      public function posts(): HasMany
      {
          return $this->hasMany(Post::class, 'author_id');
      }
}
