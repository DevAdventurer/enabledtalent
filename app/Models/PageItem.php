<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageItem extends Model {
    use HasFactory;

    protected $fillable = [
        'page_id', 
        'heading', 
        'subheading', 
        'button_label', 
        'button_link', 
        'type', 
        'content', 
        'ordering',
        'styles',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function page() {
        return $this->belongsTo(Page::class);
    }
}
