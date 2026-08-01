<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\HeroSection;
use App\Models\Partner;
use App\Models\Room;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedAdminUser();
        $this->seedSettings();
        $this->seedHeroSection();
        $this->seedRooms();
        $this->seedExperiences();
        $this->seedPartners();
    }

    private function seedAdminUser(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => 'password',
                'email_verified_at' => now(),
            ],
        );
    }

    private function seedSettings(): void
    {
        Setting::instance();
    }

    private function seedHeroSection(): void
    {
        if (HeroSection::query()->exists()) {
            return;
        }

        $slides = [
            [
                'label' => 'Stay with Purpose.',
                'heading' => 'Help Heal with Us',
                'description' => 'Premium, ultra-secure apartments in Uganda where your travel experience directly funds 24/7 medical wellness, sanctuary, and dignity for women and young girls battling Endometriosis.',
                'image_alt' => 'Premium apartments with warm evening light',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=2000&auto=format&fit=crop',
                'sort_order' => 1,
            ],
            [
                'label' => 'More Than a Stay',
                'heading' => 'A Gift of Hope',
                'description' => 'Welcome to Endo Wellness Accommodation — a place of comfort, care, and purpose. Every booking helps support women and girls living with endometriosis across Africa.',
                'image_alt' => 'Comfortable boutique hotel bedroom',
                'image_url' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=2000&auto=format&fit=crop',
                'sort_order' => 2,
            ],
            [
                'label' => 'Rest With Meaning',
                'heading' => 'Hospitality That Heals',
                'description' => 'Rest with comfort. Stay with purpose. Create hope — one booking at a time.',
                'image_alt' => 'Warm and inviting guest suite',
                'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=2000&auto=format&fit=crop',
                'sort_order' => 3,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSection::query()->create([
                ...$slide,
                'is_published' => true,
            ]);
        }
    }

    private function seedRooms(): void
    {
        $rooms = [
            [
                'name' => 'The Nile Suite',
                'slug' => 'the-nile-suite',
                'tagline' => 'Our signature suite with sweeping garden views',
                'description' => "A sanctuary of calm wrapped in warm chocolate tones and hand-woven Ugandan textiles. The Nile Suite features a private terrace overlooking the gardens, a deep soaking tub, and a king bed dressed in organic cotton.\n\nEvery night in this suite funds two nights of 24/7 medical wellness care for a woman living with endometriosis.",
                'price_per_night' => 320000,
                'capacity' => 2,
                'size_sqm' => 68,
                'bed_setup' => '1 King Bed',
                'amenities' => ['Private terrace', 'Soaking tub', 'Rain shower', 'Espresso bar', 'High-speed Wi-Fi', 'Air conditioning', 'Daily breakfast', '24/7 concierge'],
                'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Karamoja Garden Villa',
                'slug' => 'karamoja-garden-villa',
                'tagline' => 'A private villa surrounded by tropical greenery',
                'description' => "Set apart from the main house, the Karamoja Garden Villa offers total privacy with its own courtyard garden, outdoor shower, and shaded reading veranda. Interiors blend contemporary luxury with craftsmanship from Karamojong artisans.\n\nIdeal for longer stays, honeymoons, and travelers seeking deep rest with purpose.",
                'price_per_night' => 450000,
                'capacity' => 3,
                'size_sqm' => 92,
                'bed_setup' => '1 King Bed + Day Bed',
                'amenities' => ['Private courtyard', 'Outdoor shower', 'Kitchenette', 'Dedicated host', 'High-speed Wi-Fi', 'Air conditioning', 'Daily breakfast', '24/7 concierge'],
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'The Advocate Room',
                'slug' => 'the-advocate-room',
                'tagline' => 'Thoughtful comfort for the conscious traveler',
                'description' => "Designed for solo travelers, digital nomads, and young advocates, this light-filled room pairs a dedicated workspace with a plush queen bed and views over the courtyard. The walls feature rotating artwork by Ugandan women artists, sold in support of PAHEWO.\n\nStay a while — weekly and monthly rates directly extend care hours at the wellness sanctuary.",
                'price_per_night' => 140000,
                'capacity' => 2,
                'size_sqm' => 32,
                'bed_setup' => '1 Queen Bed',
                'amenities' => ['Work desk', 'Fast Wi-Fi', 'Courtyard view', 'Rain shower', 'Air conditioning', 'Daily breakfast', '24/7 concierge'],
                'image_url' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Family Baraza Suite',
                'slug' => 'family-baraza-suite',
                'tagline' => 'Generous space for families and small groups',
                'description' => "Two interconnected rooms arranged around a shared lounge — the baraza — where families gather over fresh juice and Ugandan coffee. Sleeps up to five with space to breathe.\n\nChildren stay free, and every family stay funds a full week of wellness check-ins for women in the PAHEWO program.",
                'price_per_night' => 380000,
                'capacity' => 5,
                'size_sqm' => 84,
                'bed_setup' => '1 King Bed + 2 Queen Beds',
                'amenities' => ['Two bedrooms', 'Shared lounge', 'Family dining', 'Kids welcome pack', 'High-speed Wi-Fi', 'Air conditioning', 'Daily breakfast', '24/7 concierge'],
                'image_url' => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Sunrise Deluxe Room',
                'slug' => 'sunrise-deluxe-room',
                'tagline' => 'Wake with the light over Kampala\'s hills',
                'description' => "East-facing and bathed in morning light, the Sunrise Deluxe Room is a favourite of returning guests. A window seat invites slow mornings; blackout drapes promise deep nights.\n\nA warm, elegant base for exploring the city and its culture — with care built into every night.",
                'price_per_night' => 180000,
                'capacity' => 2,
                'size_sqm' => 40,
                'bed_setup' => '1 King Bed',
                'amenities' => ['Sunrise view', 'Window seat', 'Rain shower', 'Minibar', 'High-speed Wi-Fi', 'Air conditioning', 'Daily breakfast', '24/7 concierge'],
                'image_url' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'The Wellness Loft',
                'slug' => 'the-wellness-loft',
                'tagline' => 'Restorative design for body and mind',
                'description' => "Our most restful room, developed with the PAHEWO care team. The Wellness Loft features a heat-therapy corner, ergonomic seating, gentle circadian lighting, and a menu of anti-inflammatory dining options.\n\nDesigned for guests managing chronic conditions — because rest should never be a luxury reserved for the well.",
                'price_per_night' => 220000,
                'capacity' => 2,
                'size_sqm' => 48,
                'bed_setup' => '1 Queen Bed',
                'amenities' => ['Heat-therapy corner', 'Circadian lighting', 'Wellness dining menu', 'Meditation kit', 'High-speed Wi-Fi', 'Air conditioning', 'Daily breakfast', '24/7 care line'],
                'image_url' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($rooms as $room) {
            Room::query()->updateOrCreate(['slug' => $room['slug']], $room);
        }
    }

    private function seedExperiences(): void
    {
        $experiences = [
            [
                'name' => 'Women Artisans of Kampala Tour',
                'slug' => 'women-artisans-of-kampala-tour',
                'category' => 'Culture',
                'description' => "Meet the basket weavers, bark-cloth makers, and jewellers keeping Ugandan craft traditions alive. Led by women guides, with every purchase going directly to the artisans and a share to PAHEWO's programs.",
                'duration' => 'Half day',
                'price' => 65000,
                'image_url' => 'https://images.unsplash.com/photo-1489493585363-d69421e0edd3?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Wellness Circle & Herbal Garden Walk',
                'slug' => 'wellness-circle-herbal-garden-walk',
                'category' => 'Wellness',
                'description' => "Join a guided morning circle at the sanctuary gardens: gentle movement, breathwork, and a walk through the medicinal herb garden used in PAHEWO's holistic care. Open to all guests, no experience needed.",
                'duration' => '2 hours',
                'price' => 30000,
                'image_url' => 'https://images.unsplash.com/photo-1545389336-cf090694435e?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Source of the Nile Day Trip',
                'slug' => 'source-of-the-nile-day-trip',
                'category' => 'Adventure',
                'description' => 'Travel to Jinja to stand where the Nile begins. Boat cruise, riverside lunch, and optional kayaking — guided by local experts and arranged door-to-door from the hotel.',
                'duration' => 'Full day',
                'price' => 140000,
                'image_url' => 'https://images.unsplash.com/photo-1523805009345-7448845a9e53?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Ugandan Cooking Class: The Family Table',
                'slug' => 'ugandan-cooking-class-the-family-table',
                'category' => 'Culture',
                'description' => 'Cook luwombo, matooke, and groundnut stew with our kitchen team, then share the meal together at the family table. Recipes travel home with you; proceeds stay with the community.',
                'duration' => '3 hours',
                'price' => 55000,
                'image_url' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Advocacy Afternoon at PAHEWO',
                'slug' => 'advocacy-afternoon-at-pahewo',
                'category' => 'Community',
                'description' => 'Spend an afternoon at the PAHEWO wellness sanctuary. Hear from the care team, learn what 24/7 endometriosis support really involves, and discover how travelers become lifelong advocates.',
                'duration' => 'Half day',
                'price' => null,
                'image_url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'Drumming & Dance Under the Stars',
                'slug' => 'drumming-and-dance-under-the-stars',
                'category' => 'Culture',
                'description' => 'An evening of traditional drumming, dance, and storytelling in the hotel courtyard, performed by a women-led troupe. Ends with a fireside conversation and Ugandan coffee.',
                'duration' => '2 hours',
                'price' => 40000,
                'image_url' => 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?q=80&w=1600&auto=format&fit=crop',
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::query()->updateOrCreate(['slug' => $experience['slug']], $experience);
        }
    }

    private function seedPartners(): void
    {
        $partners = [
            [
                'name' => 'PAHEWO',
                'slug' => 'pahewo',
                'description' => 'The Pan African Holistic Endometriosis Wellness Organisation provides 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis across Uganda and beyond.',
                'website_url' => 'https://www.pahewo.org',
                'logo_url' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Uganda Community Tourism Association',
                'slug' => 'uganda-community-tourism-association',
                'description' => 'Connecting travelers with authentic, community-owned cultural experiences across Uganda.',
                'website_url' => null,
                'logo_url' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Women Artisans Collective Kampala',
                'slug' => 'women-artisans-collective-kampala',
                'description' => 'A women-led collective of craftmakers whose work furnishes our rooms and fills our gallery walls.',
                'website_url' => null,
                'logo_url' => null,
                'is_featured' => false,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::query()->updateOrCreate(['slug' => $partner['slug']], $partner);
        }
    }
}
