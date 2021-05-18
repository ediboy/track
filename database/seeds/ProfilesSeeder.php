<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PERSONAL
        Profile::create([
            "name" => "Profile Picture",
            "type" => "image",
            "order" => 1,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Firstname",
            "type" => "text",
            "order" => 2,
            "required" => true,
            "group" => "personal",
            "locked" => true
        ]);

        Profile::create([
            "name" => "Lastname",
            "type" => "text",
            "order" => 3,
            "required" => true,
            "group" => "personal",
            "locked" => true
        ]);

        Profile::create([
            "name" => "Middlename",
            "type" => "text",
            "order" => 4,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Adddress",
            "type" => "textarea",
            "order" => 5,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Civil Status",
            "value" => [
                "Single" => "Single",
                "Married" => "Married",
                "Separated" => "Separated",
                "Divorced" => "Divorced",
                "Widowed" => "Widowed"
            ],
            "type" => "select",
            "order" => 6,
            "required" => true,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Birthday",
            "type" => "date",
            "order" => 7,
            "required" => true,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Email",
            "type" => "email",
            "order" => 8,
            "required" => true,
            "group" => "personal",
            "locked" => true
        ]);

        Profile::create([
            "name" => "Contact Number",
            "type" => "text",
            "order" => 9,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Contact Person",
            "type" => "text",
            "order" => 10,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Contact Person Number",
            "type" => "text",
            "order" => 11,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "School Attended",
            "type" => "text",
            "order" => 12,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Course",
            "type" => "text",
            "order" => 13,
            "required" => false,
            "group" => "personal",
            "locked" => false
        ]);

        // WORK
        Profile::create([
            "name" => "Employee Number",
            "type" => "text",
            "order" => 1,
            "required" => true,
            "group" => "work",
            "locked" => true
        ]);

        Profile::create([
            "name" => "Position",
            "value" => [
                "CEO" => "CEO",
                "Finance Manager" => "Finance Manager",
                "Lead Developer" => "Lead Developer",
                "Administrator" => "Administrator",
                "Web Developer" => "Web Developer",
                "Graphic Designer" => "Graphic Designer",
                "Graphic Artist" => "Graphic Artist",
                "Multimedia Artist" => "Multimedia Artist",
                "Elearning Specialist" => "Elearning Specialist",
                "Website Administrator" => "Administrator",
                "Business Strategy Consultant" => "Business Strategy Consultant",
                "Quality Assurance Specialist" => "Quality Assurance Specialist",
                "Mobile Developer" => "Mobile Developer",
                "Service Implementation Lead" => "Service Implementation Lead",
                "Voice over Talent" => "Voice over Talent",
                "Maintenance" => "Maintenance",
                "Team Leader" => "Team Leader",
                "Project Lead" => "Project Lead",
                ],
            "type" => "select",
            "order" => 2,
            "required" => true,
            "group" => "work",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Start Date",
            "type" => "date",
            "order" => 3,
            "required" => true,
            "group" => "work",
            "locked" => false
        ]);

        Profile::create([
            "name" => "End Date",
            "type" => "date",
            "order" => 4,
            "required" => false,
            "group" => "work",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Hourly Rate",
            "type" => "text",
            "order" => 5,
            "required" => true,
            "group" => "work",
            "locked" => true
        ]);

        Profile::create([
            "name" => "Status",
            "value" => [
                "Regular" => "Regular",
                "Probationary" => "Probationary",
                "Intern" => "Intern",
                "OJT" => "OJT",
                "Part Time" => "Part Time",
                "Endo" => "Endo"
            ],
            "type" => "select",
            "order" => 6,
            "required" => true,
            "group" => "work",
            "locked" => true
        ]);

        // Other
        Profile::create([
            "name" => "TIN Number",
            "type" => "text-copy",
            "order" => 1,
            "required" => false,
            "group" => "other",
            "locked" => false
        ]);

        Profile::create([
            "name" => "SSS Number",
            "type" => "text-copy",
            "order" => 2,
            "required" => false,
            "group" => "other",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Pag-Ibig Number",
            "type" => "text-copy",
            "order" => 3,
            "required" => false,
            "group" => "other",
            "locked" => false
        ]);

        Profile::create([
            "name" => "Phil Health Number",
            "type" => "text-copy",
            "order" => 4,
            "required" => false,
            "group" => "other",
            "locked" => false
        ]);

        Profile::create([
            "name" => "BDO Account Number",
            "type" => "text-copy",
            "order" => 5,
            "required" => false,
            "group" => "other",
            "locked" => false
        ]);
    }
}
