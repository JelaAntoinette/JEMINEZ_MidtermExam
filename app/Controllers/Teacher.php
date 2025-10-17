<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    /**
     * Teacher Dashboard
     */
    public function dashboard()
    {
        return view('teacher_dashboard');
    }
}
