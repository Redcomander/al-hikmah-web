<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $guarded = ['id'];

    public function scopeSearch($query, $search, $columns = ['nama_lengkap'], $selectedColumn = 'nama_lengkap')
    {
        return $query->when($search, function ($query) use ($search, $columns, $selectedColumn) {
            $query->where(function ($query) use ($search, $columns, $selectedColumn) {
                $first = true; // Flag to determine if it's the first iteration

                foreach ($columns as $column) {
                    if ($column === $selectedColumn) {
                        if ($first) {
                            $query->where($column, 'like', '%' . $search . '%');
                            $first = false;
                        } else {
                            $query->orWhere($column, 'like', '%' . $search . '%');
                        }
                    }
                }
            });
        });
    }
}
