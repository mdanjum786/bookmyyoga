<?php
namespace App\Models;

use CodeIgniter\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $allowedFields = ['title', 'slug', 'description'];

    public function generateUniqueSlug($title, $id = null)
    {
       // Generate the initial slug
        $slug = url_title($title, '-', true);

        // Check if the slug already exists, excluding the current record if updating
        $i = 0;
        $newSlug = $slug;
        $query = $this->where('slug', $newSlug);

        if ($id) {
            $query->where('id !=', $id); // Exclude the current record
        }

        while ($query->first()) {
            $i++;
            $newSlug = $slug . '-' . $i; // Append a number to make it unique
            $query = $this->where('slug', $newSlug);
            if ($id) {
                $query->where('id !=', $id); // Exclude the current record
            }
        }

        return $newSlug;
    }
}