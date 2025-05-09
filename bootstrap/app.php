<?php

use App\Http\Middleware\LocalizationMiddleware;
use App\Policies\ActivityImagePolicy;
use App\Policies\BannerPolicy;
use App\Policies\DistrictPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductPolicy;
use App\Policies\FaqPolicy;
use App\Policies\NotifyPolicy;
use App\Policies\PostCategoryPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProductionFacilityPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\VideoPolicy;
use App\Policies\WebsiteLinkPolicy;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Gate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            LocalizationMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    
// Đăng ký các policies và gates sau khi tạo ứng dụng
Gate::resource('post_categories', PostCategoryPolicy::class);
Gate::resource('posts', PostPolicy::class);

Gate::resource('notifies', NotifyPolicy::class);

Gate::resource('banners', BannerPolicy::class);

Gate::resource('website_links', WebsiteLinkPolicy::class);

Gate::resource('districts', DistrictPolicy::class);

Gate::resource('products', ProductPolicy::class);

Gate::resource('faqs', FaqPolicy::class);

Gate::resource('videos', VideoPolicy::class);

Gate::resource('activity_images', ActivityImagePolicy::class);

Gate::resource('users', UserPolicy::class);
Gate::resource('roles', RolePolicy::class);
Gate::resource('permissions', PermissionPolicy::class);

Gate::resource('production_facilities', ProductionFacilityPolicy::class);

