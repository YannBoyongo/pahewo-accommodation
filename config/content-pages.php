<?php

return [
    'home' => [
        'name' => 'Home Page',
        'route' => 'home',
        'fields' => [
            'story_label' => ['label' => 'Story label', 'type' => 'text', 'section' => 'Our Story', 'default' => 'Stay with Purpose'],
            'story_heading' => ['label' => 'Story heading', 'type' => 'text', 'section' => 'Our Story', 'default' => 'Our Story'],
            'story_quote' => ['label' => 'Story text', 'type' => 'textarea', 'section' => 'Our Story', 'default' => 'Hospitality is more than a stay. It is the art of welcoming people with warmth, offering meaningful rest, and turning every visit into care for someone else.'],
            'story_image_one' => ['label' => 'Story image one', 'type' => 'image', 'section' => 'Our Story', 'default' => ''],
            'story_image_two' => ['label' => 'Story image two', 'type' => 'image', 'section' => 'Our Story', 'default' => ''],
            'story_image_three' => ['label' => 'Story image three', 'type' => 'image', 'section' => 'Our Story', 'default' => ''],
            'facility_accommodation' => ['label' => 'Accommodation title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Accommodation'],
            'facility_accommodation_description' => ['label' => 'Accommodation description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Comfortable rooms prepared for restful stays.'],
            'facility_accommodation_image' => ['label' => 'Accommodation photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=85&w=800&auto=format&fit=crop'],

            'facility_conference' => ['label' => 'Conference title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Conference & Meeting'],
            'facility_conference_description' => ['label' => 'Conference description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Spaces designed for focused meetings and events.'],
            'facility_conference_image' => ['label' => 'Conference photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=85&w=800&auto=format&fit=crop'],

            'facility_cafeteria' => ['label' => 'Cafeteria title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Cafeteria'],
            'facility_cafeteria_description' => ['label' => 'Cafeteria description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Casual dining for breakfast and light meals.'],
            'facility_cafeteria_image' => ['label' => 'Cafeteria photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=85&w=800&auto=format&fit=crop'],

            'facility_restaurant' => ['label' => 'Restaurant title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Restaurant & Breakfast'],
            'facility_restaurant_description' => ['label' => 'Restaurant description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Start the day with a warm breakfast and enjoy nice Ugandan food prepared with care.'],
            'facility_restaurant_image' => ['label' => 'Restaurant photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=85&w=800&auto=format&fit=crop'],

            'facility_checkin' => ['label' => 'Shared kitchen title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Shared Kitchen'],
            'facility_checkin_description' => ['label' => 'Shared kitchen description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'A welcoming kitchen space to prepare simple meals during your stay.'],
            'facility_checkin_image' => ['label' => 'Shared kitchen photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1556912173-46c336c7fd55?q=85&w=800&auto=format&fit=crop'],

            'facility_wifi' => ['label' => 'Private floor title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Private Floor'],
            'facility_wifi_description' => ['label' => 'Private floor description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'A floor with 3 rooms for a large family or group — if available.'],
            'facility_wifi_image' => ['label' => 'Private floor photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=85&w=800&auto=format&fit=crop'],

            'facility_parking' => ['label' => 'Parking title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Parking'],
            'facility_parking_description' => ['label' => 'Parking description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Convenient on-site parking for guests.'],
            'facility_parking_image' => ['label' => 'Parking photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1506521781263-d8422e82f27a?q=85&w=800&auto=format&fit=crop'],

            'facility_security' => ['label' => 'Security title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Secure Environment'],
            'facility_security_description' => ['label' => 'Security description', 'type' => 'text', 'section' => 'Facilities', 'default' => 'A calm, protected place to rest easy.'],
            'facility_security_image' => ['label' => 'Security photo', 'type' => 'image', 'section' => 'Facilities', 'default' => 'https://images.unsplash.com/photo-1558002038-809e01403e16?q=85&w=800&auto=format&fit=crop'],
            'reviews_label' => ['label' => 'Reviews label', 'type' => 'text', 'section' => 'Guest Reviews', 'default' => 'Reviews'],
            'reviews_heading' => ['label' => 'Reviews heading', 'type' => 'text', 'section' => 'Guest Reviews', 'default' => 'Our Guests Say'],
            'location_label' => ['label' => 'Location label', 'type' => 'text', 'section' => 'Location', 'default' => 'Find Us'],
            'location_heading' => ['label' => 'Location heading', 'type' => 'text', 'section' => 'Location', 'default' => 'Location'],
            'location_description' => ['label' => 'Location description', 'type' => 'textarea', 'section' => 'Location', 'default' => 'More than a beautiful place to stay, conveniently located in Entebbe, where every booking contributes to awareness, education, advocacy, and access to care for endometriosis in Africa.'],
            'location_background' => ['label' => 'Location background', 'type' => 'image', 'section' => 'Location', 'default' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=85&w=1800&auto=format&fit=crop'],
        ],
    ],
    'rooms' => [
        'name' => 'Rooms Page',
        'route' => 'rooms.index',
        'fields' => [
            'header_label' => ['label' => 'Header label',       'type' => 'text',     'section' => 'Page Header', 'default' => 'Rooms & Suites'],
            'header_title' => ['label' => 'Header title',       'type' => 'text',     'section' => 'Page Header', 'default' => 'Rest Beautifully. Give Meaningfully.'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'Every room blends contemporary comfort with Ugandan craftsmanship, and every night contributes directly to care.'],
            'header_image' => ['label' => 'Header image',       'type' => 'image',    'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1800&auto=format&fit=crop'],

            'impact_label' => ['label' => 'Label',     'type' => 'text',     'section' => 'Impact Block (shown on every room page)', 'default' => "Your stay's impact"],
            'impact_body' => ['label' => 'Text',      'type' => 'textarea', 'section' => 'Impact Block (shown on every room page)', 'default' => "Every night you spend here contributes directly to PAHEWO's 24/7 endometriosis wellness sanctuary - funding real nights of medicine, sanctuary, and dignity for women and girls in Uganda."],
            'impact_link' => ['label' => 'Link text', 'type' => 'text',     'section' => 'Impact Block (shown on every room page)', 'default' => 'Learn about PAHEWO'],
        ],
    ],
    'dining' => [
        'name' => 'Dining Page',
        'route' => 'dining',
        'fields' => [
            'header_label' => ['label' => 'Header label', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Restaurant & Cafeteria'],
            'header_title' => ['label' => 'Header title', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Fresh Flavours, Warm Ugandan Hospitality'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'Relaxed breakfasts, thoughtfully prepared meals, and easy coffee breaks—all served with fresh ingredients and the same care that shapes every stay.'],
            'header_image' => ['label' => 'Header image', 'type' => 'image', 'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=85&w=1800&auto=format&fit=crop'],
            'restaurant_label' => ['label' => 'Restaurant label', 'type' => 'text', 'section' => 'Restaurant', 'default' => 'The Restaurant'],
            'restaurant_title' => ['label' => 'Restaurant title', 'type' => 'text', 'section' => 'Restaurant', 'default' => 'Dining worth slowing down for'],
            'restaurant_body' => ['label' => 'Restaurant description', 'type' => 'textarea', 'section' => 'Restaurant', 'default' => 'Our restaurant brings together seasonal produce, familiar Ugandan flavours, and thoughtful international influences. Each plate is prepared to feel generous, fresh, and quietly memorable.'],
            'restaurant_body_two' => ['label' => 'Restaurant second paragraph', 'type' => 'textarea', 'section' => 'Restaurant', 'default' => 'Whether you are beginning the day with breakfast or settling in for an unhurried evening meal, our team creates an atmosphere that feels polished without losing its warmth.'],
            'restaurant_gallery_one' => ['label' => 'Gallery image one', 'type' => 'image', 'section' => 'Restaurant', 'default' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=85&w=1200&auto=format&fit=crop'],
            'restaurant_gallery_two' => ['label' => 'Gallery image two', 'type' => 'image', 'section' => 'Restaurant', 'default' => 'https://images.unsplash.com/photo-1552566626-52f8b828add9?q=85&w=1200&auto=format&fit=crop'],
            'restaurant_gallery_three' => ['label' => 'Gallery image three', 'type' => 'image', 'section' => 'Restaurant', 'default' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=85&w=1200&auto=format&fit=crop'],
            'restaurant_gallery_four' => ['label' => 'Gallery image four', 'type' => 'image', 'section' => 'Restaurant', 'default' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=85&w=1200&auto=format&fit=crop'],
            'restaurant_feature_one_title' => ['label' => 'Feature one title', 'type' => 'text', 'section' => 'Restaurant', 'default' => 'Fresh ingredients'],
            'restaurant_feature_one_description' => ['label' => 'Feature one description', 'type' => 'textarea', 'section' => 'Restaurant', 'default' => 'Seasonal produce selected for flavour and quality.'],
            'restaurant_feature_two_title' => ['label' => 'Feature two title', 'type' => 'text', 'section' => 'Restaurant', 'default' => 'Relaxed service'],
            'restaurant_feature_two_description' => ['label' => 'Feature two description', 'type' => 'textarea', 'section' => 'Restaurant', 'default' => 'Attentive hospitality at a comfortable pace.'],
            'cafeteria_label' => ['label' => 'Cafeteria label', 'type' => 'text', 'section' => 'Cafeteria', 'default' => 'The Cafeteria'],
            'cafeteria_title' => ['label' => 'Cafeteria title', 'type' => 'text', 'section' => 'Cafeteria', 'default' => 'Your easy pause between plans'],
            'cafeteria_body' => ['label' => 'Cafeteria description', 'type' => 'textarea', 'section' => 'Cafeteria', 'default' => 'The cafeteria is our casual corner for good coffee, light bites, and relaxed conversation. It is ideal for a quick breakfast, an informal meeting, or a quiet moment before heading back into the city.'],
            'cafeteria_image_one' => ['label' => 'Cafeteria image one', 'type' => 'image', 'section' => 'Cafeteria', 'default' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=85&w=900&auto=format&fit=crop'],
            'cafeteria_image_two' => ['label' => 'Cafeteria image two', 'type' => 'image', 'section' => 'Cafeteria', 'default' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=85&w=900&auto=format&fit=crop'],
            'cafeteria_item_one' => ['label' => 'Cafeteria item one', 'type' => 'text', 'section' => 'Cafeteria', 'default' => 'Fresh coffee, tea, and refreshing drinks'],
            'cafeteria_item_two' => ['label' => 'Cafeteria item two', 'type' => 'text', 'section' => 'Cafeteria', 'default' => 'Light meals and freshly prepared snacks'],
            'cafeteria_item_three' => ['label' => 'Cafeteria item three', 'type' => 'text', 'section' => 'Cafeteria', 'default' => 'Comfortable seating for work or conversation'],
        ],
    ],
    'conference-meeting' => [
        'name' => 'Conference & Meeting Page',
        'route' => 'conference-meeting',
        'fields' => [
            'header_label' => ['label' => 'Header label', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Conference & Meeting'],
            'header_title' => ['label' => 'Header title', 'type' => 'text', 'section' => 'Page Header', 'default' => 'A Calm Space for Productive Conversations'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'Flexible meeting facilities in Kampala for focused discussions, team sessions, presentations, and intimate professional gatherings.'],
            'header_image' => ['label' => 'Header image', 'type' => 'image', 'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=85&w=1800&auto=format&fit=crop'],
            'section_label' => ['label' => 'Section label', 'type' => 'text', 'section' => 'Main Content', 'default' => 'Meet With Purpose'],
            'section_title' => ['label' => 'Section title', 'type' => 'text', 'section' => 'Main Content', 'default' => 'Simple, comfortable, and well prepared'],
            'section_body' => ['label' => 'Section description', 'type' => 'textarea', 'section' => 'Main Content', 'default' => 'Our meeting space offers a quiet setting, dependable connectivity, and attentive hospitality so your group can stay focused from arrival to the final conversation.'],
            'gallery_image_one' => ['label' => 'Gallery image one', 'type' => 'image', 'section' => 'Main Content', 'default' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=85&w=1200&auto=format&fit=crop'],
            'gallery_image_two' => ['label' => 'Gallery image two', 'type' => 'image', 'section' => 'Main Content', 'default' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=85&w=1200&auto=format&fit=crop'],
            'gallery_image_three' => ['label' => 'Gallery image three', 'type' => 'image', 'section' => 'Main Content', 'default' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=85&w=1200&auto=format&fit=crop'],
            'gallery_image_four' => ['label' => 'Gallery image four', 'type' => 'image', 'section' => 'Main Content', 'default' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?q=85&w=1200&auto=format&fit=crop'],
            'feature_one_title' => ['label' => 'Feature one title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Reliable Wi-Fi'],
            'feature_one_description' => ['label' => 'Feature one description', 'type' => 'textarea', 'section' => 'Facilities', 'default' => 'Connectivity for meetings, calls, and presentations.'],
            'feature_two_title' => ['label' => 'Feature two title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Flexible setup'],
            'feature_two_description' => ['label' => 'Feature two description', 'type' => 'textarea', 'section' => 'Facilities', 'default' => 'A layout arranged around your group and agenda.'],
            'feature_three_title' => ['label' => 'Feature three title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'Refreshments'],
            'feature_three_description' => ['label' => 'Feature three description', 'type' => 'textarea', 'section' => 'Facilities', 'default' => 'Coffee, tea, and light food options from our cafeteria.'],
            'feature_four_title' => ['label' => 'Feature four title', 'type' => 'text', 'section' => 'Facilities', 'default' => 'On-site support'],
            'feature_four_description' => ['label' => 'Feature four description', 'type' => 'textarea', 'section' => 'Facilities', 'default' => 'A helpful team available throughout your session.'],
        ],
    ],
    'contact' => [
        'name' => 'Contact Page',
        'route' => 'contact',
        'fields' => [
            'header_label' => ['label' => 'Header label', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Contact'],
            'header_title' => ['label' => 'Header title', 'type' => 'text', 'section' => 'Page Header', 'default' => 'We Would Love to Hear From You'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'Planning a stay, a meal, or a meeting? Reach our team directly and we will help you with the details.'],
            'header_image' => ['label' => 'Header image', 'type' => 'image', 'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=85&w=1800&auto=format&fit=crop'],
            'section_label' => ['label' => 'Contact section label', 'type' => 'text', 'section' => 'Contact Details', 'default' => 'Get in Touch'],
            'section_title' => ['label' => 'Contact section title', 'type' => 'text', 'section' => 'Contact Details', 'default' => 'How can we help?'],
            'section_description' => ['label' => 'Contact section description', 'type' => 'textarea', 'section' => 'Contact Details', 'default' => 'Contact us about room reservations, dining, conference arrangements, directions, or anything else that will make your visit easier.'],
        ],
    ],
    'our-story' => [
        'name' => 'Our Story Page',
        'route' => 'our-story',
        'fields' => [
            'header_label' => ['label' => 'Header label', 'type' => 'text', 'section' => 'Page Header', 'default' => 'About Us'],
            'header_title' => ['label' => 'Header title', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Our Story'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'Hospitality with purpose - a boutique stay in Kampala where every booking sustains 24/7 endometriosis care through PAHEWO.'],
            'header_image' => ['label' => 'Header image', 'type' => 'image', 'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1800&auto=format&fit=crop'],

            'section_label' => ['label' => 'Label', 'type' => 'text', 'section' => 'Story Content', 'default' => 'How we began'],
            'section_title' => ['label' => 'Title', 'type' => 'text', 'section' => 'Story Content', 'default' => 'Hospitality that funds care'],
            'section_body' => [
                'label' => 'Description',
                'type' => 'ckeditor',
                'section' => 'Story Content',
                'max' => 50000,
                'default' => '<p>Endo Wellness Accommodation was created so that welcoming guests and supporting women living with endometriosis could be part of the same act.</p><p>Rather than relying only on donations and grants, we built a boutique hotel whose commercial success is deliberately tied to care. Fifteen percent of every booking is committed to PAHEWO before other expenses are considered.</p><p>When you stay with us, you rest well - and you help keep a 24/7 wellness sanctuary open for women and girls who need it.</p>',
            ],
        ],
    ],
    'about-pahewo' => [
        'name' => 'Who We Are Page',
        'route' => 'about-pahewo',
        'fields' => [
            'header_label' => ['label' => 'Header label', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Our Partner'],
            'header_title' => ['label' => 'Header title', 'type' => 'text', 'section' => 'Page Header', 'default' => 'PAHEWO - Pan African Holistic Endometriosis Wellness Organisation'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'The reason this hotel exists. PAHEWO provides 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis - and every booking here keeps its doors open.'],
            'header_image' => ['label' => 'Header image', 'type' => 'image', 'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?q=80&w=1800&auto=format&fit=crop'],

            'section_label' => ['label' => 'Label', 'type' => 'text', 'section' => 'Page Content', 'default' => 'Who we are'],
            'section_title' => ['label' => 'Title', 'type' => 'text', 'section' => 'Page Content', 'default' => 'Care that does not look away'],
            'section_body' => [
                'label' => 'Description',
                'type' => 'ckeditor',
                'section' => 'Page Content',
                'max' => 50000,
                'default' => '<p>PAHEWO - the Pan African Holistic Endometriosis Wellness Organisation - provides consistent, dignified, 24/7 care for women and girls living with endometriosis in Uganda.</p><p>Every day, PAHEWO operates a care line that any woman can call at any hour and reach a trained person. It runs a wellness sanctuary where women in acute crisis can stay overnight, and it conducts school visits and community education so girls are reached before years of silent suffering.</p><p>Endo Wellness Accommodation exists as PAHEWO\'s commercial engine: fifteen percent of every booking is structurally committed to this work. When you stay here, quality hospitality and meaningful care are part of the same transaction.</p>',
            ],
        ],
    ],
    'experiences' => [
        'name' => 'Experiences Page',
        'route' => 'experiences.index',
        'fields' => [
            'header_label' => ['label' => 'Header label', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Cultural Experiences'],
            'header_title' => ['label' => 'Header title', 'type' => 'text', 'section' => 'Page Header', 'default' => 'Uganda, Guided by the Women Who Live It'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'Artisan tours, wellness circles, adventures, and cultural evenings curated with the communities who host them.'],
            'header_image' => ['label' => 'Header image', 'type' => 'image', 'section' => 'Page Header', 'default' => 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?q=80&w=1800&auto=format&fit=crop'],
            'cta_label' => ['label' => 'CTA label', 'type' => 'text', 'section' => 'Bottom Call to Action', 'default' => 'Included with every stay'],
            'cta_title' => ['label' => 'CTA title', 'type' => 'text', 'section' => 'Bottom Call to Action', 'default' => 'The Advocacy Afternoon is always complimentary.'],
            'cta_description' => ['label' => 'CTA description', 'type' => 'textarea', 'section' => 'Bottom Call to Action', 'default' => 'Visit the PAHEWO sanctuary, meet the care team, and see exactly what your booking funds.'],
        ],
    ],
    'privacy' => [
        'name' => 'Privacy Policy',
        'route' => 'privacy',
        'fields' => [
            'header_label' => ['label' => 'Header label',       'type' => 'text',     'section' => 'Page Header', 'default' => 'Legal'],
            'header_title' => ['label' => 'Header title',       'type' => 'text',     'section' => 'Page Header', 'default' => 'Privacy Policy'],
            'header_description' => ['label' => 'Header description', 'type' => 'textarea', 'section' => 'Page Header', 'default' => 'How we collect, use, and protect your personal information when you interact with Endo Wellness Accommodation.'],
            'last_updated' => ['label' => 'Last updated date',  'type' => 'text',     'section' => 'Page Header', 'default' => 'July 2026'],

            'intro_body' => [
                'label' => 'Introduction',
                'type' => 'textarea',
                'section' => 'Introduction',
                'default' => "Endo Wellness Accommodation (\"we\", \"us\", or \"our\") is a boutique hotel based in Kampala, Uganda, operating in partnership with the Pan African Holistic Endometriosis Wellness Organisation (PAHEWO). We are committed to protecting your personal data and handling it responsibly in accordance with the EU General Data Protection Regulation (GDPR), the Uganda Data Protection and Privacy Act 2019, and other applicable privacy laws.\n\nThis Privacy Policy explains what personal data we collect, why we collect it, how we use it, and the rights you have over it. It applies to all visitors to our website, guests, and anyone who contacts us or submits a booking inquiry or donation pledge.",
            ],

            'data_collected_body' => [
                'label' => 'What data we collect',
                'type' => 'textarea',
                'section' => 'What Data We Collect',
                'default' => "We collect personal data only when you voluntarily provide it to us. This includes:\n\n• Booking inquiries: full name, email address, phone number, arrival and departure dates, number of guests, and any additional information you choose to share.\n• Donation pledges: full name, email address, donation amount, and payment preference.\n• Contact form submissions: name, email, and your message.\n• Automatically collected data: IP address, browser type, pages visited, and time spent on the site (via server logs and, where consented, analytics cookies).\n\nWe do not collect sensitive personal data (such as health information) unless you voluntarily share it in the context of a specific inquiry.",
            ],

            'data_use_body' => [
                'label' => 'How we use your data',
                'type' => 'textarea',
                'section' => 'How We Use Your Data',
                'default' => "We use your personal data to:\n\n• Respond to and process your booking inquiries and reservation requests.\n• Process and acknowledge donation pledges and follow up to complete the gift securely.\n• Communicate with you about your stay, including confirmations and pre-arrival information.\n• Improve our website and services using aggregated, anonymised analytics data.\n• Comply with our legal obligations under Ugandan and applicable international law.\n\nWe will never sell your personal data to third parties. We will never use your data for unsolicited marketing without your explicit consent.",
            ],

            'legal_basis_body' => [
                'label' => 'Legal basis for processing',
                'type' => 'textarea',
                'section' => 'Legal Basis for Processing',
                'default' => "Under the GDPR, we process your personal data on the following legal bases:\n\n• Contractual necessity: processing required to respond to your booking inquiry or fulfil a service you have requested.\n• Legitimate interests: improving our website, preventing fraud, and ensuring the security of our systems.\n• Legal obligation: complying with Ugandan law and applicable international regulations.\n• Consent: where you have explicitly agreed to optional cookies or marketing communications. You may withdraw consent at any time.",
            ],

            'cookies_body' => [
                'label' => 'Cookies',
                'type' => 'textarea',
                'section' => 'Cookies',
                'default' => "Our website uses the following types of cookies:\n\n• Essential cookies: required for the website to function correctly (session management, CSRF protection). These cannot be disabled.\n• Analytics cookies (optional, consent required): help us understand how visitors use the site so we can improve it. These are only activated if you click \"Accept All\" in the cookie notice.\n\nYou can manage your cookie preferences at any time by clicking \"Decline\" in the cookie notice or clearing your browser's local storage. Declining analytics cookies does not affect your ability to use the website.",
            ],

            'third_parties_body' => [
                'label' => 'Third parties',
                'type' => 'textarea',
                'section' => 'Third Parties',
                'default' => "We may share your data with the following trusted third parties, solely to deliver our services:\n\n• Email service providers: to send booking confirmations and inquiry responses (data is not stored beyond transmission).\n• Hosting and infrastructure providers: servers on which the website and its data are stored, subject to appropriate data processing agreements.\n• PAHEWO: where a donation pledge is made, basic details (name and amount) are shared with PAHEWO to acknowledge your contribution.\n\nAll third-party providers are contractually bound to process your data only as instructed by us and in accordance with applicable privacy law. We do not transfer personal data outside Uganda or the European Economic Area without appropriate safeguards in place.",
            ],

            'retention_body' => [
                'label' => 'Data retention',
                'type' => 'textarea',
                'section' => 'Data Retention',
                'default' => "We retain your personal data only for as long as necessary to fulfil the purpose for which it was collected:\n\n• Booking inquiry data is retained for 24 months after your inquiry date to allow for follow-up and to improve our services.\n• Donation pledge records are retained for 7 years to comply with financial and audit obligations.\n• Contact form messages are retained for 12 months.\n• Server log data is automatically deleted after 90 days.\n\nAfter the applicable retention period, your data is securely deleted or anonymised.",
            ],

            'rights_body' => [
                'label' => 'Your rights',
                'type' => 'textarea',
                'section' => 'Your Rights',
                'default' => "Under the GDPR and the Uganda Data Protection and Privacy Act, you have the following rights:\n\n• Right of access: you may request a copy of the personal data we hold about you.\n• Right to rectification: you may ask us to correct inaccurate or incomplete data.\n• Right to erasure: you may request that we delete your personal data, subject to legal obligations.\n• Right to restriction: you may ask us to limit how we process your data in certain circumstances.\n• Right to data portability: you may request your data in a structured, machine-readable format.\n• Right to object: you may object to processing based on legitimate interests.\n• Right to withdraw consent: where processing is based on consent, you may withdraw it at any time without affecting the lawfulness of prior processing.\n\nTo exercise any of these rights, please contact us using the details below. We will respond within 30 days.",
            ],

            'contact_body' => [
                'label' => 'Contact & complaints',
                'type' => 'textarea',
                'section' => 'Contact & Complaints',
                'default' => "If you have any questions about this Privacy Policy or wish to exercise your data rights, please contact us:\n\nEndo Wellness Accommodation\nKampala, Uganda\nEmail: privacy@endowellness.ug\n\nIf you are based in the European Union and believe we have not handled your data correctly, you have the right to lodge a complaint with your local data protection authority. A list of EU supervisory authorities is available at: https://edpb.europa.eu/about-edpb/board/members_en",
            ],
        ],
    ],
];
