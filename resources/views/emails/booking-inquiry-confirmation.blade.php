<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Inquiry Received</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background-color: #fffaf1; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #3f192b; -webkit-font-smoothing: antialiased; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 32px rgba(41,16,29,0.10); }

        /* Topbar */
        .topbar { background-color: #be1e63; padding: 10px 32px; text-align: center; }
        .topbar p { color: #ffffff; font-size: 10px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; }

        /* Header */
        .header { background-color: #29101d; padding: 40px; text-align: center; border-bottom: 3px solid #be1e63; }
        .header-badge { display: inline-block; background-color: rgba(190,30,99,0.2); color: #d43a7b; font-size: 10px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; padding: 5px 14px; border-radius: 20px; margin-bottom: 16px; }
        .header h1 { color: #ffffff; font-size: 24px; font-weight: 700; line-height: 1.3; }
        .header p { color: rgba(255,255,255,0.55); font-size: 13px; margin-top: 8px; }

        /* Body */
        .body { padding: 40px; }
        .greeting { font-size: 17px; font-weight: 700; color: #29101d; margin-bottom: 12px; }
        .text { font-size: 14px; line-height: 1.8; color: #6f314b; margin-bottom: 16px; }

        /* Summary box */
        .summary-box { background: #fffaf1; border-radius: 12px; border: 1px solid #f3e8ed; padding: 24px; margin: 28px 0; }
        .summary-title { font-size: 10px; font-weight: 700; letter-spacing: 0.22em; text-transform: uppercase; color: #be1e63; margin-bottom: 16px; }
        .summary-row { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; padding: 10px 0; border-bottom: 1px solid #f3e8ed; font-size: 13px; }
        .summary-row:last-child { border-bottom: none; padding-bottom: 0; }
        .summary-label { color: #a96f88; font-weight: 600; white-space: nowrap; }
        .summary-value { color: #3f192b; font-weight: 600; text-align: right; }

        /* Highlight strip */
        .highlight { background: linear-gradient(135deg, #29101d 0%, #57243a 100%); border-radius: 12px; padding: 20px 24px; margin: 24px 0; }
        .highlight p { color: rgba(255,255,255,0.75); font-size: 13px; line-height: 1.7; }
        .highlight strong { color: #f4c800; }

        /* CTA */
        .cta { text-align: center; margin: 32px 0 24px; }
        .cta a { display: inline-block; background-color: #be1e63; color: #ffffff; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; }

        /* Divider */
        .divider { border: none; border-top: 1px solid #f3e8ed; margin: 28px 0; }

        /* Footer */
        .footer { background-color: #29101d; padding: 32px 40px; text-align: center; }
        .footer-brand { color: rgba(255,255,255,0.9); font-size: 13px; font-weight: 700; margin-bottom: 8px; }
        .footer p { color: rgba(255,255,255,0.4); font-size: 11px; line-height: 1.9; }
        .footer a { color: #f4c800; text-decoration: none; }
        .footer-links { margin-top: 16px; }
        .footer-links a { color: rgba(255,255,255,0.5); font-size: 10px; text-decoration: none; text-transform: uppercase; letter-spacing: 0.14em; margin: 0 8px; }
        .footer-links a:hover { color: #f4c800; }
        .copyright { margin-top: 20px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.08); color: rgba(255,255,255,0.25); font-size: 10px; }
    </style>
</head>
<body>
    <div class="wrapper">

        <div class="topbar">
            <p>Endo Wellness Accommodation &nbsp;&middot;&nbsp; Kampala, Uganda</p>
        </div>

        <div class="header">
            <div class="header-badge">Booking Inquiry</div>
            <h1>We've Received Your Inquiry</h1>
            <p>Thank you for choosing Endo Wellness Accommodation</p>
        </div>

        <div class="body">
            <p class="greeting">Dear {{ $inquiry['name'] }},</p>

            <p class="text">
                Thank you for reaching out to us. We have successfully received your booking inquiry
                and our team will review your request shortly.
            </p>

            <div class="highlight">
                <p>
                    We will respond within <strong>24-48 hours</strong> with availability confirmation
                    and everything you need to finalise your booking.
                    If you need urgent assistance, please contact us directly.
                </p>
            </div>

            <div class="summary-box">
                <p class="summary-title">Your Inquiry Summary</p>

                <div class="summary-row">
                    <span class="summary-label">Name</span>
                    <span class="summary-value">{{ $inquiry['name'] }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Email</span>
                    <span class="summary-value">{{ $inquiry['email'] }}</span>
                </div>
                @if (!empty($inquiry['phone']))
                <div class="summary-row">
                    <span class="summary-label">Phone</span>
                    <span class="summary-value">{{ $inquiry['phone'] }}</span>
                </div>
                @endif
                <div class="summary-row">
                    <span class="summary-label">Arrival</span>
                    <span class="summary-value">{{ \Carbon\Carbon::parse($inquiry['arrival'])->format('D, d M Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Departure</span>
                    <span class="summary-value">{{ \Carbon\Carbon::parse($inquiry['departure'])->format('D, d M Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Duration</span>
                    <span class="summary-value">
                        {{ \Carbon\Carbon::parse($inquiry['arrival'])->diffInDays(\Carbon\Carbon::parse($inquiry['departure'])) }} night(s)
                    </span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Guests</span>
                    <span class="summary-value">{{ $inquiry['guests'] }} {{ $inquiry['guests'] == 1 ? 'Guest' : 'Guests' }}</span>
                </div>
                @if (!empty($inquiry['additional_info']))
                <div class="summary-row">
                    <span class="summary-label">Notes</span>
                    <span class="summary-value" style="max-width: 58%;">{{ $inquiry['additional_info'] }}</span>
                </div>
                @endif
            </div>

            <p class="text">
                While you wait, feel free to explore our rooms and wellness experiences - and learn
                about the meaningful impact your stay makes possible.
            </p>

            <div class="cta">
                <a href="{{ url('/rooms') }}">Explore Our Rooms</a>
            </div>

            <hr class="divider">

            <p class="text" style="font-size: 12px; color: #a96f88; text-align: center;">
                Didn't submit this inquiry?
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
                <a href="{{ url('/about-pahewo') }}">About</a>
                <a href="{{ url('/contact') }}">Contact</a>
            </div>
            <p class="copyright">&copy; {{ date('Y') }} Endo Wellness Accommodation. All rights reserved.</p>
        </div>

    </div>
</body>
</html>
