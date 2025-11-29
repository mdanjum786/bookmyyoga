<?php

namespace App\Models;

use CodeIgniter\Model;

class TrainersAndStudioModel extends Model
{
    protected $table            = 'trainers_and_studio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['status', 'business_name', 'banner_image', 'logo','mobile_no','email','about_us', 'address', 'user_id', 'city_id', 'state_id', 'country_id', 'slug', 'pincode_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
     public function createSlug($title)
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
