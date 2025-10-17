<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Welcome to the Student Portal!',
                'content' => 'We are excited to have you here. Stay tuned for upcoming news and events.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Midterm Examination Schedule',
                'content' => 'Midterm exams will start on October 25, 2025. Please check your subjects for the schedule.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert multiple rows into the announcements table
        $this->db->table('announcements')->insertBatch($data);
    }
}
