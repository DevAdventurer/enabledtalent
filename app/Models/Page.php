<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function pageItems() {
        return $this->hasMany(PageItem::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}