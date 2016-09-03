<?php namespace Cms\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
  /**
   * The application's global HTTP middleware stack.
   *
   * @var array
   */
  protected $middleware = [
    'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
    'Layako\Http\Middleware\IsInstalledMiddleware',
    'Layako\Modules\Core\Http\Middleware\ForceSecureMiddleware',
    'Layako\Modules\Core\Http\Middleware\CORSMiddleware',
    'Layako\Http\Middleware\EncryptCookies',
    'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
    'Illuminate\Session\Middleware\StartSession',
    'Layako\Http\Middleware\InMaintenanceMiddleware',
    'Illuminate\View\Middleware\ShareErrorsFromSession',
    'Layako\Http\Middleware\VerifyCsrfToken',
    'Layako\Modules\Core\Http\Middleware\ParseJsToBottomMiddleware',
    'Layako\Modules\Core\Http\Middleware\MinifyHtmlMiddleware',
  ];

  /**
   * The application's route middleware.
   *
   * @var array
   */
  protected $routeMiddleware = [
    'auth' => 'Layako\Http\Middleware\Authenticate',
    'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
    'guest' => 'Layako\Http\Middleware\RedirectIfAuthenticated',
  ];

}
