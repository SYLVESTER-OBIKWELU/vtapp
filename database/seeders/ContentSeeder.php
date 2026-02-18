<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Review;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Sample Projects
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'short_description' => 'A modern e-commerce solution with payment integration',
                'full_description' => 'A comprehensive e-commerce platform built with Laravel and Vue.js. Features include product management, cart functionality, Stripe payment integration, and order tracking.',
                'category' => 'web',
                'technologies' => ['Laravel', 'Vue.js', 'Stripe', 'Tailwind CSS'],
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/example/ecommerce',
                'gradient_color' => 'from-cyan-500 to-blue-500',
                'display_order' => 1,
                'is_active' => true,
                'show_on_homepage' => true,
                'show_on_portfolio' => true,
            ],
            [
                'title' => 'Mobile Banking App',
                'slug' => 'mobile-banking-app',
                'short_description' => 'Secure mobile banking application with biometric authentication',
                'full_description' => 'A secure mobile banking application featuring biometric authentication, real-time transactions, and push notifications.',
                'category' => 'mobile',
                'technologies' => ['React Native', 'Node.js', 'MongoDB'],
                'live_url' => null,
                'github_url' => null,
                'gradient_color' => 'from-purple-500 to-pink-500',
                'display_order' => 2,
                'is_active' => true,
                'show_on_homepage' => true,
                'show_on_portfolio' => true,
            ],
            [
                'title' => 'SaaS Dashboard',
                'slug' => 'saas-dashboard',
                'short_description' => 'Analytics dashboard for SaaS businesses',
                'full_description' => 'A comprehensive analytics dashboard designed for SaaS businesses to track KPIs, user engagement, and revenue metrics.',
                'category' => 'web',
                'technologies' => ['React', 'TypeScript', 'Tailwind CSS', 'Chart.js'],
                'live_url' => 'https://dashboard.example.com',
                'gradient_color' => 'from-emerald-500 to-teal-500',
                'display_order' => 3,
                'is_active' => true,
                'show_on_homepage' => false,
                'show_on_portfolio' => true,
            ],
            [
                'title' => 'Brand Identity Design',
                'slug' => 'brand-identity-design',
                'short_description' => 'Complete brand identity package for startups',
                'full_description' => 'A comprehensive brand identity design including logo, color palette, typography, and brand guidelines for modern startups.',
                'category' => 'design',
                'technologies' => ['Figma', 'Illustrator', 'Photoshop'],
                'gradient_color' => 'from-orange-500 to-red-500',
                'display_order' => 4,
                'is_active' => true,
                'show_on_homepage' => false,
                'show_on_portfolio' => true,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        // Seed Sample Reviews
        $reviews = [
            [
                'reviewer_name' => 'TWEX',
                'reviewer_title' => 'CEO',
                'company_name' => 'THE WESTERN EXIM SERVICES & LTD.',
                'company_tagline' => 'Exchange with Ease',
                'company_website' => 'https://thewesternexim.com',
                'review_text' => 'We give VTAPP five stars for their exceptional work. They delivered more than we expected, their user friendly UI UX design is absolutely amazing, thank you so much VTAPP.',
                'rating' => 5,
                'gradient_color' => 'from-cyan-400 to-blue-500',
                'is_featured' => true,
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'reviewer_name' => 'GOLF LTD',
                'reviewer_title' => 'Founder',
                'company_name' => 'Crypto exchange group',
                'company_tagline' => 'Your Gateway to Affordable Trading',
                'company_website' => 'https://golfstrade.com',
                'review_text' => 'From idea to launch, VTAPP was instrumental in building our exchange website. The UI is beautiful, performance is smooth, and they stayed with us post-launch for optimization and updates. Highly recommend!',
                'rating' => 5,
                'gradient_color' => 'from-purple-400 to-pink-500',
                'is_featured' => true,
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'reviewer_name' => 'John Smith',
                'reviewer_title' => 'CTO',
                'company_name' => 'Tech Innovations Inc.',
                'company_tagline' => 'Innovating Tomorrow',
                'company_website' => 'https://techinnovations.com',
                'review_text' => 'The team at VTAPP exceeded our expectations. Their technical expertise and attention to detail resulted in a product that our users love.',
                'rating' => 5,
                'gradient_color' => 'from-green-400 to-teal-500',
                'is_featured' => false,
                'is_active' => true,
                'display_order' => 3,
            ],
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }

        // Seed Site Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Virtual Tech Applications', 'type' => 'text', 'group' => 'general', 'label' => 'Site Name'],
            ['key' => 'site_tagline', 'value' => 'Empowering Your Digital Vision', 'type' => 'text', 'group' => 'general', 'label' => 'Site Tagline'],
            ['key' => 'contact_email', 'value' => 'contact@vtapp.com', 'type' => 'text', 'group' => 'general', 'label' => 'Contact Email'],
            ['key' => 'social_facebook', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL'],
            ['key' => 'social_twitter', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'Twitter URL'],
            ['key' => 'social_linkedin', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'LinkedIn URL'],
            ['key' => 'social_github', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'GitHub URL'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}
