<?php

namespace App\Services;

use App\Models\Visitor;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisitorService
{
    /**
     * Get the real IP address of the visitor
     * Handles proxies, load balancers, and Cloudflare
     */
    public static function getRealIp(Request $request): string
    {
        // Check for Cloudflare
        if ($request->header('CF-Connecting-IP')) {
            return $request->header('CF-Connecting-IP');
        }

        // Check for proxy headers
        $headers = [
            'HTTP_CF_CONNECTING_IP',
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR',
        ];

        foreach ($headers as $header) {
            if ($request->server($header)) {
                $ip = $request->server($header);
                // X-Forwarded-For can contain multiple IPs, get the first one
                if (str_contains($ip, ',')) {
                    $ip = trim(explode(',', $ip)[0]);
                }
                // Validate IP
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        // Fallback to request IP
        return $request->ip() ?? '0.0.0.0';
    }

    /**
     * Get detailed device information
     */
    public static function getDeviceInfo(Request $request): array
    {
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

        // Get device type
        $deviceType = 'Desktop';
        if ($agent->isTablet()) {
            $deviceType = 'Tablet';
        } elseif ($agent->isMobile()) {
            $deviceType = 'Mobile';
        }

        // Get device name (Samsung, iPhone, etc.)
        $device = $agent->device();
        if (!$device || $device === 'WebKit') {
            $device = $deviceType;
        }

        // Get platform/OS
        $platform = $agent->platform();
        $platformVersion = $agent->version($platform);
        $os = $platform ?: 'Unknown OS';
        if ($platformVersion) {
            $os .= ' ' . $platformVersion;
        }

        // Get browser
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);
        $browserInfo = $browser ?: 'Unknown Browser';
        if ($browserVersion) {
            $browserInfo .= ' ' . intval($browserVersion);
        }

        // Build device string
        $deviceString = "{$device}-{$os}-{$browserInfo}";

        return [
            'device' => $device,
            'device_type' => $deviceType,
            'platform' => $os,
            'browser' => $browserInfo,
            'device_string' => $deviceString,
            'is_mobile' => $agent->isMobile(),
            'is_tablet' => $agent->isTablet(),
            'is_desktop' => $agent->isDesktop(),
            'is_robot' => $agent->isRobot(),
            'robot_name' => $agent->robot() ?: null,
        ];
    }

    /**
     * Get location information from IP
     */
    public static function getLocation(string $ip): array
    {
        try {
            // Skip private/local IPs
            if (self::isPrivateIp($ip)) {
                return [
                    'location' => 'Local Network',
                    'city' => null,
                    'region' => null,
                    'country' => null,
                    'country_code' => null,
                    'latitude' => null,
                    'longitude' => null,
                    'timezone' => null,
                    'isp' => null,
                ];
            }

            $position = Location::get($ip);
            
            if ($position) {
                $parts = array_filter([
                    $position->city ?? null,
                    $position->regionName ?? null,
                    $position->countryName ?? null,
                ]);
                
                $locationString = !empty($parts) ? implode(', ', $parts) : 'Unknown';

                return [
                    'location' => $locationString,
                    'city' => $position->city ?? null,
                    'region' => $position->regionName ?? null,
                    'country' => $position->countryName ?? null,
                    'country_code' => $position->countryCode ?? null,
                    'latitude' => $position->latitude ?? null,
                    'longitude' => $position->longitude ?? null,
                    'timezone' => $position->timezone ?? null,
                    'isp' => $position->isp ?? null,
                ];
            }
        } catch (\Exception $e) {
            Log::warning("Location lookup failed for IP {$ip}: " . $e->getMessage());
        }

        return [
            'location' => 'Unknown',
            'city' => null,
            'region' => null,
            'country' => null,
            'country_code' => null,
            'latitude' => null,
            'longitude' => null,
            'timezone' => null,
            'isp' => null,
        ];
    }

    /**
     * Check if IP is private/local
     */
    public static function isPrivateIp(string $ip): bool
    {
        return !filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        );
    }

    /**
     * Track a visitor - main method to call from Livewire components
     */
    public static function track(Request $request): ?Visitor
    {
        $ip = self::getRealIp($request);
        $deviceInfo = self::getDeviceInfo($request);
        $locationInfo = self::getLocation($ip);

        // Check if visitor exists today
        $visitor = Visitor::where('ip_address', $ip)
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if ($visitor) {
            // Update existing visitor
            $visitor->update([
                'device' => $deviceInfo['device_string'],
                'location' => $locationInfo['location'],
            ]);
            $visitor->touch();
            return $visitor;
        }

        // Create new visitor
        return Visitor::create([
            'ip_address' => $ip,
            'device' => $deviceInfo['device_string'],
            'location' => $locationInfo['location'],
        ]);
    }
}
