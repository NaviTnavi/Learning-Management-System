<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create instructors if they don't exist
        $instructor1 = User::firstOrCreate(
            ['email' => 'instructor@test.com'],
            [
                'name' => 'John Smith',
                'password' => Hash::make('password'),
                'role' => 'instructor',
            ]
        );

        $instructor2 = User::firstOrCreate(
            ['email' => 'jane.doe@test.com'],
            [
                'name' => 'Jane Doe',
                'password' => Hash::make('password'),
                'role' => 'instructor',
            ]
        );

        $instructor3 = User::firstOrCreate(
            ['email' => 'mike.johnson@test.com'],
            [
                'name' => 'Mike Johnson',
                'password' => Hash::make('password'),
                'role' => 'instructor',
            ]
        );

        // Create 5 courses
        $courses = [
            [
                'instructor_id' => $instructor1->id,
                'title' => 'Web Development Fundamentals',
                'short_description' => 'Learn HTML, CSS, and JavaScript basics to build modern websites',
                'content' => "This comprehensive course covers the essential skills needed to become a web developer.\n\n**What you'll learn:**\n- HTML5 semantic markup\n- CSS3 styling and layouts\n- JavaScript fundamentals\n- Responsive design principles\n- Building interactive web pages\n\n**Prerequisites:** None - perfect for beginners!\n\n**Duration:** 8 weeks\n\nBy the end of this course, you'll be able to create fully functional, responsive websites from scratch.",
            ],
            [
                'instructor_id' => $instructor1->id,
                'title' => 'Advanced Laravel Development',
                'short_description' => 'Master Laravel framework with advanced patterns and best practices',
                'content' => "Take your Laravel skills to the next level with this advanced course.\n\n**Topics covered:**\n- Service Container and Dependency Injection\n- Repository Pattern\n- Laravel Events and Listeners\n- Queue Management\n- API Development with Laravel\n- Testing with PHPUnit\n- Performance Optimization\n\n**Prerequisites:** Basic PHP and Laravel knowledge\n\n**Duration:** 10 weeks\n\nLearn industry best practices and build scalable applications.",
            ],
            [
                'instructor_id' => $instructor2->id,
                'title' => 'Database Design and SQL',
                'short_description' => 'Comprehensive guide to database design, normalization, and SQL queries',
                'content' => "Master database design principles and SQL from beginner to advanced.\n\n**Course content:**\n- Database fundamentals and concepts\n- Entity-Relationship diagrams\n- Normalization (1NF, 2NF, 3NF, BCNF)\n- SQL queries (SELECT, JOIN, subqueries)\n- Indexing and optimization\n- Transactions and ACID properties\n- Database security\n\n**Prerequisites:** Basic computer literacy\n\n**Duration:** 6 weeks\n\nLearn to design efficient databases and write complex SQL queries.",
            ],
            [
                'instructor_id' => $instructor2->id,
                'title' => 'Mobile App Development with Flutter',
                'short_description' => 'Build beautiful cross-platform mobile apps using Flutter and Dart',
                'content' => "Create stunning iOS and Android apps with a single codebase.\n\n**What we'll cover:**\n- Dart programming language\n- Flutter widgets and layouts\n- State management (Provider, Bloc)\n- Navigation and routing\n- API integration\n- Local storage\n- Publishing to app stores\n\n**Prerequisites:** Basic programming knowledge\n\n**Duration:** 12 weeks\n\nBuild real-world mobile applications from scratch.",
            ],
            [
                'instructor_id' => $instructor3->id,
                'title' => 'Machine Learning with Python',
                'short_description' => 'Introduction to machine learning algorithms and practical applications',
                'content' => "Learn the fundamentals of machine learning and AI.\n\n**Course outline:**\n- Python for data science\n- NumPy and Pandas libraries\n- Data visualization with Matplotlib\n- Supervised learning algorithms\n- Unsupervised learning (clustering, PCA)\n- Neural networks basics\n- Model evaluation and optimization\n- Real-world ML projects\n\n**Prerequisites:** Python programming basics\n\n**Duration:** 14 weeks\n\nGain hands-on experience with modern ML techniques and tools.",
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }

        // Create a student user for testing enrollment
        User::firstOrCreate(
            ['email' => 'student@test.com'],
            [
                'name' => 'Alice Student',
                'password' => Hash::make('password'),
                'role' => 'student',
            ]
        );
    }
}