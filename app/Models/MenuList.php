<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    use HasFactory;

    protected $table = "menu_list";

    protected $fillable = [
        'link',
        'title',
        'parent_id',
        'level',
        'sequence',
        'status_id',
    ];


    public function SubMenu()
    {
        return $this->hasMany(MenuList::class,'parent_id');
    }

    public function Status()
    {
        return $this->hasOne(Status::class,'id','status_id');
    }
}
