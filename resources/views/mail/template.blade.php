<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['subject']}} - {{env('APP_NAME')}}</title>
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
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #ec4899 100%);
            padding: 40px 30px;
            text-align: center;
        }

        .logo-container {
            display: inline-block;
            padding: 12px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            backdrop-filter: blur(10px);
        }

        .logo {
            width: 70px;
            height: auto;
        }

        .brand-name {
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            margin-top: 14px;
            letter-spacing: -0.5px;
        }

        .content {
            padding: 40px 30px;
        }

        .subject-line {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 25px;
            line-height: 1.3;
        }

        .greeting {
            font-size: 18px;
            color: #334155;
            margin-bottom: 20px;
        }

        .message-body {
            color: #475569;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 30px 0;
        }

        .signature-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px dashed #e2e8f0;
        }

        .signature-text {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
        }

        .signature-name {
            color: #0f172a;
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
        }

        .signature-title {
            color: #64748b;
            font-size: 14px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .footer {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .footer-logo {
            width: 45px;
            margin-bottom: 15px;
        }

        .footer-text {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .footer-link {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-contact {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .footer-contact-item {
            color: #64748b;
            font-size: 13px;
            margin: 5px 0;
        }

        .footer-contact-link {
            color: #3b82f6;
            text-decoration: none;
        }

        .social-links {
            margin: 15px 0;
        }

        .social-link {
            display: inline-block;
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 8px;
            margin: 0 3px;
            line-height: 34px;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .header {
                padding: 30px 20px;
            }

            .content {
                padding: 30px 20px;
            }

            .subject-line {
                font-size: 20px;
            }

            .footer {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="header">
                <div class="logo-container">
                    <img src="{{ asset('home/img/logo_vtapp.png') }}" alt="{{env('APP_NAME')}}" class="logo">
                </div>
                <div class="brand-name">{{env('APP_NAME')}}</div>
            </div>

            <!-- Content -->
            <div class="content">
                <h1 class="subject-line">{{$data['subject']}}</h1>

                <p class="greeting">Hello {{$data['name']}},</p>

                <div class="message-body">
                    {!! nl2br(e($data['body'])) !!}
                </div>

                @if(!empty($data['cta_link']) && !empty($data['cta_text']))
                <a href="{{$data['cta_link']}}" class="cta-button">{{$data['cta_text']}}</a>
                @endif

                <div class="signature-section">
                    <p class="signature-text">Best regards,</p>
                    <p class="signature-name">The {{env('APP_NAME')}} Team</p>
                    <p class="signature-title">Virtual Tech Applications</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <img src="https://vtapp.com.ng/home/img/logo_vtapp.png" alt="{{env('APP_NAME')}}" class="footer-logo">
                <p class="footer-text">
                    &copy; {{env('APP_YEAR')}} <a href="https://vtapp.com.ng" class="footer-link">Virtual Tech Applications</a>
                </p>

                <div class="footer-contact">
                    <p class="footer-contact-item">
                        <a href="mailto:hello@vtapp.com.ng" class="footer-contact-link">hello@vtapp.com.ng</a>
                    </p>
                    <p class="footer-contact-item">
                        <a href="https://vtapp.com.ng" class="footer-contact-link">www.vtapp.com.ng</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>