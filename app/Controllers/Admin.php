<?php

namespace App\Controllers;

class Admin extends BaseController
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
        return view('admin_dashboard');
    }
}
