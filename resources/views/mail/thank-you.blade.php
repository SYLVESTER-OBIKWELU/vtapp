<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - {{env('APP_NAME')}}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
        }

        .email-container {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .header {
            background: linear-gradient(135deg, #10b981 0%, #06b6d4 100%);
            padding: 50px 30px;
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .success-icon svg {
            width: 40px;
            height: 40px;
            color: #ffffff;
        }

        .header-title {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            margin-top: 10px;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 22px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 20px;
        }

        .message-body {
            color: #475569;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .highlight-box {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfeff 100%);
            border-left: 4px solid #10b981;
            padding: 20px;
            border-radius: 0 12px 12px 0;
            margin: 25px 0;
        }

        .highlight-box p {
            color: #0f766e;
            font-size: 15px;
            line-height: 1.6;
        }

        .info-card {
            background: #f8fafc;
            border-radius: 16px;
            padding: 25px;
            margin: 25px 0;
        }

        .info-title {
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #64748b;
            font-size: 14px;
        }

        .info-value {
            color: #0f172a;
            font-size: 14px;
            font-weight: 500;
        }

        .cta-section {
            text-align: center;
            padding: 30px 0;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #10b981 0%, #06b6d4 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 14px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
        }

        .footer {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .footer-logo {
            width: 50px;
            margin-bottom: 15px;
        }

        .footer-text {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer-link {
            color: #10b981;
            text-decoration: none;
            font-weight: 500;
        }

        .social-links {
            margin: 20px 0;
        }

        .social-link {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #10b981, #06b6d4);
            border-radius: 8px;
            margin: 0 4px;
            line-height: 36px;
            color: #ffffff;
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .header {
                padding: 40px 20px;
            }

            .content {
                padding: 30px 20px;
            }

            .header-title {
                font-size: 24px;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="header">
                <div class="success-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h1 class="header-title">Thank You!</h1>
                <p class="header-subtitle">We've received your message</p>
            </div>

            <!-- Content -->
            <div class="content">
                <h2 class="greeting">Hello {{$data['name']}},</h2>

                <p class="message-body">
                    Thank you for reaching out to us at {{env('APP_NAME')}}. We truly appreciate you taking the time to
                    contact us, and we want you to know that your message is important to us.
                </p>

                <div class="highlight-box">
                    <p>
                        <strong>What happens next?</strong><br>
                        Our team will review your message and get back to you within 24-48 hours. Please keep an eye on
                        your inbox for our response.
                    </p>
                </div>

                <div class="info-card">
                    <div class="info-title">Your Message Details</div>
                    <div class="info-row">
                        <span class="info-label">Name</span>
                        <span class="info-value">{{$data['name']}}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{$data['email']}}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Subject</span>
                        <span class="info-value">{{$data['subject']}}</span>
                    </div>
                </div>

                <p class="message-body">
                    In the meantime, feel free to explore our website or check out our latest updates. If you have any
                    urgent inquiries, don't hesitate to reach out again.
                </p>

                <div class="cta-section">
                    <a href="https://vtapp.com.ng" class="cta-button">Visit Our Website</a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <img src="https://vtapp.com.ng/home/img/logo_vtapp.png" alt="{{env('APP_NAME')}}" class="footer-logo">
                <p class="footer-text">
                    &copy; {{env('APP_YEAR')}} <a href="https://vtapp.com.ng" class="footer-link">Virtual App
                        Technologies</a>
                </p>
                <p class="footer-text" style="font-size: 12px; color: #94a3b8;">
                    This is an automated confirmation email. Please do not reply directly to this message.
                </p>
            </div>
        </div>
    </div>
</body>

</html>