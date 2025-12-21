<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message - {{env('APP_NAME')}} Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #1e1b4b 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .email-wrapper {
            max-width: 650px;
            margin: 0 auto;
        }

        .email-container {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
        }

        .header {
            background: linear-gradient(135deg, #f59e0b 0%, #ef4444 50%, #dc2626 100%);
            padding: 35px 30px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .alert-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.25);
            padding: 8px 16px;
            border-radius: 50px;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .alert-badge svg {
            width: 18px;
            height: 18px;
            color: #ffffff;
        }

        .alert-badge span {
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-title {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
            position: relative;
            z-index: 1;
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-top: 8px;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 35px 30px;
        }

        .notification-banner {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-left: 4px solid #f59e0b;
            padding: 16px 20px;
            border-radius: 0 12px 12px 0;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .notification-banner svg {
            width: 24px;
            height: 24px;
            color: #b45309;
            flex-shrink: 0;
        }

        .notification-banner p {
            color: #92400e;
            font-size: 14px;
            font-weight: 500;
        }

        .sender-card {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        .sender-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .sender-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #f59e0b, #ef4444);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
        }

        .sender-info h3 {
            color: #0f172a;
            font-size: 18px;
            font-weight: 600;
        }

        .sender-info p {
            color: #64748b;
            font-size: 14px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .detail-item {
            background: #ffffff;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .detail-item.full-width {
            grid-column: span 2;
        }

        .detail-label {
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .detail-value {
            font-size: 14px;
            color: #0f172a;
            font-weight: 500;
            word-break: break-word;
        }

        .message-section {
            margin-top: 25px;
        }

        .message-label {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .message-label svg {
            width: 16px;
            height: 16px;
        }

        .message-content {
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
        }

        .message-text {
            color: #334155;
            font-size: 15px;
            line-height: 1.8;
            white-space: pre-wrap;
        }

        .action-section {
            margin-top: 30px;
            text-align: center;
        }

        .action-button {
            display: inline-block;
            background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 14px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
        }

        .action-button:hover {
            transform: translateY(-2px);
        }

        .metadata {
            margin-top: 25px;
            padding: 20px;
            background: #fafafa;
            border-radius: 12px;
        }

        .metadata-title {
            font-size: 12px;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .metadata-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #e2e8f0;
            font-size: 13px;
        }

        .metadata-row:last-child {
            border-bottom: none;
        }

        .metadata-key {
            color: #64748b;
        }

        .metadata-val {
            color: #334155;
            font-weight: 500;
        }

        .footer {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
            padding: 25px 30px;
            text-align: center;
        }

        .footer-logo {
            width: 40px;
            margin-bottom: 12px;
            filter: brightness(0) invert(1);
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
        }

        .footer-link {
            color: #fbbf24;
            text-decoration: none;
            font-weight: 500;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .header {
                padding: 25px 20px;
            }

            .content {
                padding: 25px 20px;
            }

            .header-title {
                font-size: 20px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-item.full-width {
                grid-column: span 1;
            }

            .sender-header {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="header">
                <div class="alert-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span>New Message</span>
                </div>
                <h1 class="header-title">{{$data['subject']}}</h1>
                <p class="header-subtitle">You have received a new contact form submission</p>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="notification-banner">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p>A visitor has sent you a message through the contact form. Please respond promptly.</p>
                </div>

                <div class="sender-card">
                    <div class="sender-header">
                        <div class="sender-avatar">
                            {{ strtoupper(substr($data['name'], 0, 1)) }}
                        </div>
                        <div class="sender-info">
                            <h3>{{$data['name']}}</h3>
                            <p>{{$data['email']}}</p>
                        </div>
                    </div>

                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Full Name</div>
                            <div class="detail-value">{{$data['name']}}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Email Address</div>
                            <div class="detail-value">{{$data['email']}}</div>
                        </div>
                        <div class="detail-item full-width">
                            <div class="detail-label">Subject</div>
                            <div class="detail-value">{{$data['subject']}}</div>
                        </div>
                    </div>
                </div>

                <div class="message-section">
                    <div class="message-label">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        Message Content
                    </div>
                    <div class="message-content">
                        <p class="message-text">{{$data['message']}}</p>
                    </div>
                </div>

                <div class="metadata">
                    <div class="metadata-title">Submission Details</div>
                    <div class="metadata-row">
                        <span class="metadata-key">Submitted At</span>
                        <span class="metadata-val">{{ now()->format('F j, Y g:i A') }}</span>
                    </div>
                    <div class="metadata-row">
                        <span class="metadata-key">Source</span>
                        <span class="metadata-val">Website Contact Form</span>
                    </div>
                </div>

                <div class="action-section">
                    <a href="{{route('messages')}}" class="action-button">View in Admin Panel</a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <img src="https://vtapp.com.ng/home/img/logo_vtapp.png" alt="{{env('APP_NAME')}}" class="footer-logo">
                <p class="footer-text">
                    &copy; {{env('APP_YEAR')}} <a href="https://vtapp.com.ng"
                        class="footer-link">{{env('APP_NAME')}}</a> - Admin Notification
                </p>
            </div>
        </div>
    </div>
</body>

</html>