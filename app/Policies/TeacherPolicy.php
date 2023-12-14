<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Teacher;

class TeacherPolicy
{
    public function view(User $user)
    {
        // Check if the user has access based on "Grade 1," "Grade 2," or "Grade 3"
        return Teacher::where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('grade_1', 1)
                    ->orWhere('grade_2', 1)
                    ->orWhere('grade_3', 1);
            })
            ->exists();
    }
    public function viewDeveloper(User $user)
    {
        // Check if the user has a "developer" role
        return $user->hasRole('developer');
    }
    public function viewColumn(User $user, $columnName)
    {
        // Logic to determine if the user can view the specified column
        return $user->hasPermissionTo("view-{$columnName}");
    }
}
