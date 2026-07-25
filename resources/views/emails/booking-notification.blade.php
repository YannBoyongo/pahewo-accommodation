<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Request</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background-color: #fffaf1; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #3f192b; -webkit-font-smoothing: antialiased; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 32px rgba(41,16,29,0.10); }

        .topbar { background-color: #be1e63; padding: 10px 32px; display: flex; align-items: center; justify-content: space-between; }
        .topbar-left { color: #ffffff; font-size: 10px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; }
        .topbar-badge { background-color: rgba(255,255,255,0.2); color: #ffffff; font-size: 9px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; }

        .alert { background-color: #f4c800; padding: 13px 40px; }
        .alert p { color: #29101d; font-size: 11px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; }

        .header { background: linear-gradient(135deg, #29101d 0%, #57243a 100%); padding: 36px 40px; }
        .header h1 { color: #ffffff; font-size: 22px; font-weight: 700; line-height: 1.3; }
        .header p { color: rgba(255,255,255,0.5); font-size: 13px; margin-top: 6px; }
        .header-meta { margin-top: 16px; display: flex; gap: 12px; flex-wrap: wrap; }
        .meta-chip { background-color: rgba(255,255,255,0.1); border-radius: 8px; padding: 6px 14px; font-size: 11px; color: rgba(255,255,255,0.7); }
        .meta-chip strong { color: #f4c800; display: block; font-size: 9px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 2px; }

        .body { padding: 40px; }
        .text { font-size: 14px; line-height: 1.8; color: #6f314b; margin-bottom: 20px; }

        .detail-grid { border-radius: 12px; border: 1px solid #f3e8ed; overflow: hidden; margin: 24px 0; }
        .section-label { background-color: #29101d; padding: 10px 16px; font-size: 9px; font-weight: 700; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(255,255,255,0.6); }
        .detail-row { display: flex; border-bottom: 1px solid #f3e8ed; }
        .detail-row:last-child { border-bottom: none; }
        .detail-key { width: 36%; background: #fffaf1; padding: 12px 16px; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #a96f88; }
        .detail-val { width: 64%; padding: 12px 16px; font-size: 13px; font-weight: 600; color: #3f192b; }
        .detail-val a { color: #be1e63; text-decoration: none; }

        .note-box { border-left: 3px solid #be1e63; background: #fffaf1; padding: 16px 20px; border-radius: 0 10px 10px 0; margin: 20px 0; font-size: 13px; color: #6f314b; line-height: 1.75; }
        .note-label { font-size: 9px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: #be1e63; margin-bottom: 8px; }

        .price-box { background: linear-gradient(135deg, #29101d 0%, #57243a 100%); border-radius: 12px; padding: 20px 24px; margin: 24px 0; }
        .price-row { display: flex; justify-content: space-between; font-size: 13px; padding: 5px 0; color: rgba(255,255,255,0.65); }
        .price-total { display: flex; justify-content: space-between; border-top: 1px solid rgba(255,255,255,0.12); margin-top: 10px; padding-top: 12px; font-size: 16px; font-weight: 700; color: #ffffff; }
        .impact-row { display: flex; justify-content: space-between; margin-top: 8px; font-size: 12px; color: #f4c800; }

        .cta { text-align: center; margin: 32px 0; }
        .cta a { display: inline-block; background-color: #29101d; color: #ffffff; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; }

        .footer { background-color: #29101d; padding: 24px 40px; text-align: center; border-top: 3px solid #be1e63; }
        .footer p { color: rgba(255,255,255,0.35); font-size: 11px; line-height: 1.8; }
        .copyright { margin-top: 12px; color: rgba(255,255,255,0.2); font-size: 10px; }
    </style>
</head>
<body>
    <div class="wrapper">

        <div class="topbar">
            <span class="topbar-left">Admin Notification</span>
            <span class="topbar-badge">Endo Wellness Accommodation</span>
        </div>

        <div class="alert">
            <p>&#9679;&nbsp; New Booking Request Received</p>
        </div>

        <div class="header">
            <h1>{{ $booking->guest_name }} wants to book</h1>
            <p>Submitted {{ now()->format('D, d M Y \a\t H:i') }} &nbsp;&middot;&nbsp; Ref: {{ $booking->reference }}</p>
            <div class="header-meta">
                <div class="meta-chip">
                    <strong>Room</strong>
                    {{ $booking->room?->name }}
                </div>
                <div class="meta-chip">
                    <strong>Check-in</strong>
                    {{ $booking->check_in->format('d M Y') }}
                </div>
                <div class="meta-chip">
                    <strong>Check-out</strong>
                    {{ $booking->check_out->format('d M Y') }}
                </div>
                <div class="meta-chip">
                    <strong>Guests</strong>
                    {{ $booking->guests }}
                </div>
            </div>
        </div>

        <div class="body">
            <p class="text">
                A new booking request has been submitted via the room page. Please review the details
                and confirm availability with the guest within <strong>24-48 hours</strong>.
            </p>

            <div class="detail-grid">
                <div class="section-label">Guest Details</div>
                <div class="detail-row">
                    <div class="detail-key">Full Name</div>
                    <div class="detail-val">{{ $booking->guest_name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-key">Email</div>
                    <div class="detail-val">
                        <a href="mailto:{{ $booking->guest_email }}">{{ $booking->guest_email }}</a>
                    </div>
                </div>
                @if ($booking->guest_phone)
                <div class="detail-row">
                    <div class="detail-key">Phone</div>
                    <div class="detail-val">{{ $booking->guest_phone }}</div>
                </div>
                @endif
            </div>

            <div class="detail-grid">
                <div class="section-label">Stay Details</div>
                <div class="detail-row">
                    <div class="detail-key">Room</div>
                    <div class="detail-val">{{ $booking->room?->name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-key">Check-in</div>
                    <div class="detail-val">{{ $booking->check_in->format('D, d M Y') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-key">Check-out</div>
                    <div class="detail-val">{{ $booking->check_out->format('D, d M Y') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-key">Duration</div>
                    <div class="detail-val">{{ $booking->nights }} {{ Str::plural('night', $booking->nights) }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-key">Guests</div>
                    <div class="detail-val">{{ $booking->guests }} {{ Str::plural('guest', $booking->guests) }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-key">Reference</div>
                    <div class="detail-val">{{ $booking->reference }}</div>
                </div>
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
                    <span>PAHEWO contribution (15%)</span>
                    <span>{{ \App\Support\Currency::format($booking->impact_contribution) }}</span>
                </div>
            </div>

            @if ($booking->special_requests)
            <div class="note-box">
                <p class="note-label">Special Requests</p>
                {{ $booking->special_requests }}
            </div>
            @endif

            <div class="cta">
                <a href="mailto:{{ $booking->guest_email }}?subject=Re:%20Your%20Booking%20Request%20{{ $booking->reference }}%20-%20Endo%20Wellness%20Accommodation">
                    Reply to {{ $booking->guest_name }}
                </a>
            </div>

            <p style="text-align: center; font-size: 11px; color: #a96f88;">
                This is an automated notification from the room booking widget.
                <a href="{{ url('/dashboard/bookings') }}" style="color: #be1e63;">View in dashboard</a>
            </p>
        </div>

        <div class="footer">
            <p>Endo Wellness Accommodation &nbsp;&middot;&nbsp; Admin System</p>
            <p class="copyright">&copy; {{ date('Y') }} All rights reserved.</p>
        </div>

    </div>
</body>
</html>
