<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN (inline for email compatibility) -->
    <style>
        /* Bootstrap-like minimal styles for email compatibility */
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 32px 24px;
        }

        .header {
            background: #0d6efd;
            color: #fff;
            padding: 24px 0;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2rem;
            letter-spacing: 1px;
        }

        .content {
            margin: 32px 0;
            color: #212529;
            font-size: 1rem;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            background: #0d6efd;
            color: #fff !important;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            margin-top: 16px;
        }

        .footer {
            text-align: center;
            color: #6c757d;
            font-size: 0.95rem;
            margin-top: 32px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 16px 8px;
            }

            .header,
            .footer {
                padding: 16px 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://vtapp.com.ng/home/img/logo_vtapp.png" alt="Company Logo"
                style="width: 100px; height: auto;">

        </div>
        <h3 style="text-align: center;">{{$data['subject']}}</h3>
        <div class="content">
            @if(!empty($data['image']))
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ $data['image'] }}" alt="Newsletter Image"
                    style="max-width: 100%; height: auto; border-radius: 6px;">
            </div>
            @endif

            <p>
                @if(!empty($data['body']))
                {!! nl2br(e($data['body'])) !!}
                @endif
            </p>
        </div>
        <div class="footer">
            &copy; {{env('APP_YEAR')}}, <a href="vtapp.com.ng">Virtual App Technologies.</a> All rights reserved.<br>
            <small>If wish to stop receiving updates, please click <a href="{{route('unsubscribe')}}">here</a> to
                unsubscribe.</small>
        </div>
    </div>
</body>

</html>