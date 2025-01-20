<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string name
 * @property string status
 * @property int contact_id
 * @property Contact contact
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'contact_id'];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
