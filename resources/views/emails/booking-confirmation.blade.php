<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Received</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background-color: #fffaf1; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #3f192b; -webkit-font-smoothing: antialiased; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 32px rgba(41,16,29,0.10); }

        .topbar { background-color: #be1e63; padding: 10px 32px; text-align: center; }
        .topbar p { color: #ffffff; font-size: 10px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; }

        .header { background-color: #29101d; padding: 40px; text-align: center; border-bottom: 3px solid #be1e63; }
        .header-badge { display: inline-block; background-color: rgba(190,30,99,0.2); color: #d43a7b; font-size: 10px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; padding: 5px 14px; border-radius: 20px; margin-bottom: 16px; }
        .header h1 { color: #ffffff; font-size: 24px; font-weight: 700; line-height: 1.3; }
        .header p { color: rgba(255,255,255,0.55); font-size: 13px; margin-top: 8px; }

        .ref-pill { display: inline-block; margin-top: 18px; background-color: rgba(244,200,0,0.15); color: #f4c800; font-size: 13px; font-weight: 700; letter-spacing: 0.1em; padding: 8px 20px; border-radius: 8px; border: 1px solid rgba(244,200,0,0.25); }
        .ref-pill span { font-size: 10px; display: block; color: rgba(255,255,255,0.4); letter-spacing: 0.18em; text-transform: uppercase; margin-bottom: 4px; }

        .body { padding: 40px; }
        .greeting { font-size: 17px; font-weight: 700; color: #29101d; margin-bottom: 12px; }
        .text { font-size: 14px; line-height: 1.8; color: #6f314b; margin-bottom: 16px; }

        .summary-box { background: #fffaf1; border-radius: 12px; border: 1px solid #f3e8ed; padding: 24px; margin: 28px 0; }
        .summary-title { font-size: 10px; font-weight: 700; letter-spacing: 0.22em; text-transform: uppercase; color: #be1e63; margin-bottom: 16px; }
        .summary-row { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; padding: 10px 0; border-bottom: 1px solid #f3e8ed; font-size: 13px; }
        .summary-row:last-child { border-bottom: none; padding-bottom: 0; }
        .summary-label { color: #a96f88; font-weight: 600; white-space: nowrap; }
        .summary-value { color: #3f192b; font-weight: 600; text-align: right; }

        .price-box { background: linear-gradient(135deg, #29101d 0%, #57243a 100%); border-radius: 12px; padding: 20px 24px; margin: 24px 0; }
        .price-row { display: flex; justify-content: space-between; font-size: 13px; padding: 5px 0; color: rgba(255,255,255,0.65); }
        .price-total { display: flex; justify-content: space-between; border-top: 1px solid rgba(255,255,255,0.12); margin-top: 10px; padding-top: 12px; font-size: 16px; font-weight: 700; color: #ffffff; }
        .impact-row { display: flex; justify-content: space-between; margin-top: 8px; font-size: 12px; color: #f4c800; }

        .highlight { background: #fffaf1; border-left: 3px solid #be1e63; border-radius: 0 10px 10px 0; padding: 16px 20px; margin: 24px 0; font-size: 13px; color: #6f314b; line-height: 1.75; }
        .highlight strong { color: #29101d; }

        .cta { text-align: center; margin: 32px 0 24px; }
        .cta a { display: inline-block; background-color: #be1e63; color: #ffffff; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; }

        .divider { border: none; border-top: 1px solid #f3e8ed; margin: 28px 0; }

        .footer { background-color: #29101d; padding: 32px 40px; text-align: center; }
        .footer-brand { color: rgba(255,255,255,0.9); font-size: 13px; font-weight: 700; margin-bottom: 8px; }
        .footer p { color: rgba(255,255,255,0.4); font-size: 11px; line-height: 1.9; }
        .footer a { color: #f4c800; text-decoration: none; }
        .footer-links { margin-top: 16px; }
        .footer-links a { color: rgba(255,255,255,0.5); font-size: 10px; text-decoration: none; text-transform: uppercase; letter-spacing: 0.14em; margin: 0 8px; }
        .copyright { margin-top: 20px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.08); color: rgba(255,255,255,0.25); font-size: 10px; }
    </style>
</head>
<body>
    <div class="wrapper">

        <div class="topbar">
            <p>Endo Wellness Accommodation &nbsp;&middot;&nbsp; Kampala, Uganda</p>
        </div>

        <div class="header">
            <div class="header-badge">Booking Request</div>
            <h1>We've Received Your Booking</h1>
            <p>Thank you for choosing Endo Wellness Accommodation</p>
            <div class="ref-pill">
                <span>Your Reference</span>
                {{ $booking->reference }}
            </div>
        </div>

        <div class="body">
            <p class="greeting">Dear {{ $booking->guest_name }},</p>

            <p class="text">
                Thank you for your booking request. We have received all your details and
                our team will review availability and confirm your stay as soon as possible.
            </p>

            <p class="text">
                You will hear from us within <strong>24-48 hours</strong>. No payment is taken at this stage.
            </p>

            <div class="summary-box">
                <p class="summary-title">Your Booking Summary</p>

                <div class="summary-row">
                    <span class="summary-label">Room</span>
                    <span class="summary-value">{{ $booking->room?->name }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Guest Name</span>
                    <span class="summary-value">{{ $booking->guest_name }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Email</span>
                    <span class="summary-value">{{ $booking->guest_email }}</span>
                </div>
                @if ($booking->guest_phone)
                <div class="summary-row">
                    <span class="summary-label">Phone</span>
                    <span class="summary-value">{{ $booking->guest_phone }}</span>
                </div>
                @endif
                <div class="summary-row">
                    <span class="summary-label">Check-in</span>
                    <span class="summary-value">{{ $booking->check_in->format('D, d M Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Check-out</span>
                    <span class="summary-value">{{ $booking->check_out->format('D, d M Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Duration</span>
                    <span class="summary-value">{{ $booking->nights }} {{ Str::plural('night', $booking->nights) }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Guests</span>
                    <span class="summary-value">{{ $booking->guests }} {{ Str::plural('guest', $booking->guests) }}</span>
                </div>
                @if ($booking->special_requests)
                <div class="summary-row">
                    <span class="summary-label">Special Requests</span>
                    <span class="summary-value" style="max-width: 58%;">{{ $booking->special_requests }}</span>
                </div>
                @endif
            </div>

            <div class="price-box">
                <div class="price-row">
                    <span>{{ \App\Support\Currency::format($booking->room?->price_per_night) }} x {{ $booking->nights }} {{ Str::plural('night', $booking->nights) }}</span>
                    <span>{{ \App\Support\Currency::format($booking->total_price) }}</span>
                </div>
                <div class="price-total">
                    <span>Estimated Total</span>
                    <span>{{ \App\Support\Currency::format($booking->total_price) }}</span>
                </div>
                <div class="impact-row">
                    <span>Funds 24/7 endometriosis care (15%)</span>
                    <span>{{ \App\Support\Currency::format($booking->impact_contribution) }}</span>
                </div>
            </div>

            <div class="highlight">
                Your stay contributes <strong>{{ \App\Support\Currency::format($booking->impact_contribution) }}</strong>
                directly to PAHEWO's 24/7 endometriosis wellness sanctuary - funding real nights of
                medicine, sanctuary, and dignity for women and girls in Uganda.
                <strong>Thank you for staying with purpose.</strong>
            </div>

            <div class="cta">
                <a href="{{ url('/rooms') }}">Explore Our Rooms</a>
            </div>

            <hr class="divider">

            <p class="text" style="font-size: 12px; color: #a96f88; text-align: center;">
                Didn't make this request?
                <a href="mailto:{{ \App\Models\Setting::instance()->email }}" style="color: #be1e63;">Contact us</a>
                and we'll sort it out.
            </p>
        </div>

        <div class="footer">
            <p class="footer-brand">Endo Wellness Accommodation</p>
            <p>
                {{ \App\Models\Setting::instance()->address }}<br>
                <a href="mailto:{{ \App\Models\Setting::instance()->email }}">{{ \App\Models\Setting::instance()->email }}</a>
                &nbsp;&middot;&nbsp; {{ \App\Models\Setting::instance()->phone }}
            </p>
            <p style="margin-top: 10px;">
                In partnership with <a href="https://www.pahewo.org">PAHEWO</a> - funding 24/7 endometriosis care.
            </p>
            <div class="footer-links">
                <a href="{{ url('/') }}">Website</a>
                <a href="{{ url('/rooms') }}">Rooms</a>
                <a href="{{ url('/about-pahewo') }}">About PAHEWO</a>
                <a href="{{ url('/contact') }}">Contact</a>
            </div>
            <p class="copyright">&copy; {{ date('Y') }} Endo Wellness Accommodation. All rights reserved.</p>
        </div>

    </div>
</body>
</html>
