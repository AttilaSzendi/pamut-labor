<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
