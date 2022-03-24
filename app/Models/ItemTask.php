<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTask extends Model
{
    use HasFactory;
    protected $table = 'item_task';
    
    public $fillable = [
        'descricao',
        'realizada',
        'task_id'
    ];

    public function relTask(){
        return $this->hasOne(related: 'App\Models\Task',foreignKey:'id',localKey:'task_id');
    }

}
