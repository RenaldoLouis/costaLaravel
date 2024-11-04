<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Showcase;

class SectionSeeder extends Seeder
{
    public function run()
    {
        $showcase = Showcase::where('slug', 'costa-collect')->first();

        Section::create([
            'showcase_id' => $showcase->id,
            'layout' => 'tripodBlackGradient',
            'content' => [
                'image' => 'img/tripod.png',
                'text1' => 'Elevate Your Photography And Videography Experience With The Versatile And Sturdy COSTA COLLECT TM-02 Aluminum Alloy Camera Tripod Monopod, Featuring 360-Degree Rotation, Quick Release Plate, And Impressive Maximum Load Capacity Of 5kg, Designed For Both Amateurs And Professionals Alike.',
                'text2' => 'Amazingly Versatile',
            ],
            'order' => 1,
        ]);

        Section::create([
            'showcase_id' => $showcase->id,
            'layout' => 'headlineContainer',
            'content' => [
                'headline' => 'Steady Shots, Every Time - Unleash Your Creativity with Our Premium Tripods',
            ],
            'order' => 2,
        ]);

        Section::create([
            'showcase_id' => $showcase->id,
            'layout' => 'newSection',
            'content' => [
                'title' => 'Discover Our New Features',
                'description' => 'Explore the latest advancements in our products that take your creativity to the next level.',
                'image' => 'img/placeholder1.png',
            ],
            'order' => 3,
        ]);

        Section::create([
            'showcase_id' => $showcase->id,
            'layout' => 'anotherSection',
            'content' => [
                'title' => 'Experience Innovation',
                'description' => 'Our products are designed with the latest technology to enhance your workflow.',
                'image' => 'img/placeholder2.png',
            ],
            'order' => 4,
        ]);

        Section::create([
            'showcase_id' => $showcase->id,
            'layout' => 'scrollVideoSection',
            'content' => [
                'video' => 'video/tripod_video.mp4',
            ],
            'order' => 5,
        ]);

        Section::create([
            'layout' => 'imageOverlaySection',
            'content' => [
                'image' => 'img/large-image.png', // Path ke gambar besar
                'text' => 'Your Captivating Overlay Text',
                'gradient_overlay' => 'img/gradient-overlay.png', // Jika Anda menggunakan gambar gradien, atau bisa menggunakan CSS gradien
            ],
            'order' => 6,
        ]);

        Section::create([
            'layout' => 'sliderSection',
            'content' => [
                'slides' => [
                    ['title' => 'One', 'image' => 'img/slide1.jpg'],
                    ['title' => 'Two', 'image' => 'img/slide2.jpg'],
                    ['title' => 'Three', 'image' => 'img/slide3.jpg'],
                    ['title' => 'Four', 'image' => 'img/slide4.jpg'],
                ],
            ],
            'order' => 6,
        ]);

        // Section 7: parallaxSection
        Section::create([
            'layout' => 'parallaxSection',
            'content' => [
                'image' => 'img/example_parallax_bg1.png',
                'content_text' => 'Content 1',
            ],
            'order' => 7,
        ]);

        // Section 8: parallaxSection
        Section::create([
            'layout' => 'parallaxSection',
            'content' => [
                'image' => 'img/example_parallax_bg2.png',
                'content_text' => 'Content 2',
            ],
            'order' => 8,
        ]);

         // Section 9: parallaxSection
         Section::create([
            'layout' => 'parallaxSection',
            'content' => [
                'image' => 'img/example_parallax_bg3.png',
                'content_text' => 'Content 3',
            ],
            'order' => 9,
        ]);

    }
}
