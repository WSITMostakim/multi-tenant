<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, 'plan_tenant', 'plan_id', 'tenant_id');
    }
    protected $fillable = [
        'name',
        'price',
        'interval',
        'description',
        'features',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];
}
