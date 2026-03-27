# How to Change the App Icon (Mobile Version)

This guide explains how to update the application icon for your NativePHP mobile applications (Android & iOS).

## Standard Procedure

NativePHP uses a single source image to generate all the necessary platform-specific icons.

1.  **Source File Location**: Place your new icon file exactly at:
    `public/icon.png`

2.  **Icon Specifications**:
    *   **Format**: PNG (8-bit or 24-bit).
    *   **Maximum Size**: 1024 x 1024 pixels (recommended).
    *   **iOS Requirement**: The icon must NOT have any transparency/alpha channel. If your image has transparency, the iOS build might be rejected by the App Store.
    *   **Android Adaptive Icons**: The central part of the icon should stay within a 66% "Safe Zone" to avoid being clipped by different Android mask shapes (circle, square, squircle).

## Applying Changes

Whenever you run a mobile build command, NativePHP's build process automatically detects the `public/icon.png` and regenerates the appropriate icons for the target platform.

### For Android:
Run the build or run command:
```bash
php artisan native:run android
```
The icons will be generated and placed in:
- `nativephp/android/app/src/main/res/mipmap-*/ic_launcher.png`
- `nativephp/android/app/src/main/res/mipmap-*/ic_launcher_round.png`
- `nativephp/android/app/src/main/res/mipmap-*/ic_launcher_foreground.png`

### For iOS:
Run the build or run command:
```bash
php artisan native:run ios
```
The icons will be generated and placed in:
- `nativephp/ios/NativePHP/Assets.xcassets/AppIcon.appiconset/icon.png`

---

## Manual Regeneration (Internal Use)

If you have already updated `public/icon.png` but don't want to perform a full build yet, you can trigger the icon generation process manually using a PHP script:

1.  **Create a script** (e.g., `generate_mobile_icons.php`):
```php
<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

class IconInstaller {
    use \Native\Mobile\Traits\InstallsAppIcon;
    public function logToFile($msg) { echo $msg . "\n"; }
}

$installer = new IconInstaller();
echo "Processing icons from public/icon.png...\n";

// For Android
$installer->installAndroidIcon();

// For iOS
$installer->installIosIcon();

echo "Finished generating icons.\n";
```

2.  **Run the script**:
```bash
php generate_mobile_icons.php
```
