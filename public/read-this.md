# Building a High-Impact Website: "Stay with Purpose"

## A Purpose-Driven Hospitality & Advocacy Platform in Partnership with PAHEWO

This is not a booking site with a charity banner bolted on. It is a dual-mission platform: a premium hotel brand in Uganda whose entire commercial engine — every booking, every night, every referral — is structured to fund 24/7 medical wellness, sanctuary, and dignity for women and girls living with endometriosis, a chronic, currently incurable disease that does not pause for holidays, weekends, or "business hours."

The site must therefore do two things simultaneously and persuasively:


Convert travelers — conscious tourists, young advocates, digital nomads, diaspora visitors, and culturally curious travelers — into guests.
Convert guests into advocates for endometriosis awareness and for Ugandan women's culture, through partnership with PAHEWO (Pan African Holistic Endometriosis Wellness Organisation) — www.pahewo.org.


The messaging backbone throughout the entire build: endometriosis is a 24/7, incurable condition — pain, fatigue, and disruption do not clock out. That reality must be reflected not just in copy, but in product design (round-the-clock support lines, always-on wellness resources, live impact counters) so the website itself feels like a living embodiment of "24/7 care."

# Color Palette

Design the website using a modern luxury hotel aesthetic built around **Chocolate Brown, White, and Black**. The overall feeling should be warm, sophisticated, elegant, and timeless while maintaining a strong sense of trust and social impact.

## Primary Colors

| Color | Purpose | Hex |
|--------|---------|-----|
| Chocolate Brown | Primary brand color, buttons, headings, highlights | `#4E342E` |
| Dark Chocolate | Navigation, footer, overlays | `#2D1B16` |
| White | Backgrounds, spacing, clean sections | `#FFFFFF` |
| Black | Primary text and icons | `#111111` |

## Accent Colors

Use accents sparingly to maintain the luxury feel.

| Color | Purpose | Hex |
|--------|---------|-----|
| Warm Gold | Call-to-action highlights | `#C8A165` |
| Light Beige | Alternate section backgrounds | `#F7F3EF` |

## Design Style

The interface should resemble a **5-star boutique hotel website**, combining premium hospitality with authentic social impact storytelling.

### Visual Characteristics

- Large full-screen photography
- Elegant typography
- Spacious layouts with generous white space
- Soft shadows
- Rounded corners (10–16px)
- Glass or subtle translucent navigation
- Smooth scrolling animations
- High-quality imagery
- Minimalist design
- Refined luxury aesthetic

## Buttons

### Primary Button

- Chocolate Brown background
- White text
- Rounded corners
- Smooth hover animation
- Slight elevation on hover

### Secondary Button

- White background
- Chocolate Brown border
- Chocolate Brown text
- Inverts colors on hover

## Typography

Use modern luxury fonts such as:

- Poppins

Typography should emphasize readability while conveying elegance.

## Overall Mood

The website should feel:

- Premium
- Elegant
- Calm
- Warm
- Sophisticated
- Trustworthy
- Luxurious
- Inviting
- Modern

Visitors should immediately feel they are booking a high-end hotel while simultaneously becoming part of a meaningful social mission.

## Suggested Folder/Module Structure

app/
 ├── Http/Controllers/
 │    ├── BookingController.php
 │    ├── ImpactController.php
 │    ├── ExperienceController.php   // cultural experiences module
 │    ├── AdvocacyController.php     // PAHEWO stories, blog, resources
 │    └── DonationController.php
 ├── Models/
 │    ├── Room.php
 │    ├── Booking.php
 │    ├── ImpactMetric.php
 │    ├── Experience.php             // cultural tours, wellness circles
 │    ├── Story.php                  // survivor / advocate stories
 │    └── Partner.php                // PAHEWO + future partners
 ├── Livewire/
 │    ├── HeroSplitScreen.php
 │    ├── ImpactCounter.php          // live "nights funded / women supported"
 │    ├── BookingWidget.php
 │    └── SupportChatWidget.php      // "24/7" symbolic live-support entry point
resources/views/
 ├── components/hero.blade.php
 ├── components/credibility-bar.blade.php
 ├── pages/impact.blade.php
 ├── pages/experiences.blade.php
 └── pages/about-pahewo.blade.php

 ## Technologies

 this is a laravel project and have installed livewire3, spatie media library, spatie honeypot

 ## to read

 AGENTS.md file for guidelines