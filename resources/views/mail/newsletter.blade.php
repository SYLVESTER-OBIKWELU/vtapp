<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}} Newsletter</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
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
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 50%, #8b5cf6 100%);
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
            width: 80px;
            height: auto;
        }

        .brand-name {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            margin-top: 16px;
            letter-spacing: -0.5px;
        }

        .content {
            padding: 40px 30px;
        }

        .subject-line {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .image-container {
            margin: 30px 0;
            text-align: center;
        }

        .newsletter-image {
            max-width: 100%;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .message-body {
            color: #475569;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 30px 0;
        }

        .footer {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .footer-text {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .footer-link {
            color: #06b6d4;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        .unsubscribe {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .unsubscribe-text {
            color: #94a3b8;
            font-size: 12px;
        }

        .unsubscribe-link {
            color: #94a3b8;
            text-decoration: underline;
        }

        .social-links {
            margin: 20px 0;
        }

        .social-link {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #06b6d4, #3b82f6);
            border-radius: 10px;
            margin: 0 5px;
            line-height: 40px;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
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
                font-size: 22px;
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
                    <img src="https://vtapp.com.ng/home/img/logo_vtapp.png" alt="{{env('APP_NAME')}}" class="logo">
                </div>
                <div class="brand-name">{{env('APP_NAME')}}</div>
            </div>

            <!-- Content -->
            <div class="content">
                <h1 class="subject-line">{{$data['subject']}}</h1>

                @if(!empty($data['image']))
                <div class="image-container">
                    <img src="{{ $data['image'] }}" alt="Newsletter Image" class="newsletter-image">
                </div>
                @endif

                <div class="message-body">
                    @if(!empty($data['body']))
                    {!! nl2br(e($data['body'])) !!}
                    @endif
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p class="footer-text">
                    &copy; {{env('APP_YEAR')}} <a href="https://vtapp.com.ng" class="footer-link">Virtual App
                        Technologies</a>. All rights reserved.
                </p>

                <div class="unsubscribe">
                    <p class="unsubscribe-text">
                        Don't want to receive these emails? <a href="{{route('unsubscribe')}}"
                            class="unsubscribe-link">Unsubscribe here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>