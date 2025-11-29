<?php
namespace App\Models;

use CodeIgniter\Model;

class Events extends Model
{
    protected $table = 'services';
    protected $allowedFields = ['title', 'slug', 'description'];

    public function generateUniqueSlug($title)
    {
        // Generate the initial slug
        $slug = url_title($title, '-', true);

        // Check if the slug already exists
        $i = 0;
        $newSlug = $slug;
        while ($this->where('slug', $newSlug)->first()) {
            $i++;
            $newSlug = $slug . '-' . $i; // Append a number to make it unique
        }

        return $newSlug;
    }
}