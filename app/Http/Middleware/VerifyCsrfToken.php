<?php namespace Cms\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{
  /**
   * The URIs that should be excluded from CSRF verification.
   *
   * @var array
   */
  protected $except = [
  ];

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   *
   * @throws \Illuminate\Session\TokenMismatchException
   */
  public function handle($request, Closure $next)
  {
    // add any paths in the config to the except array
    if ($config = config('cms.core.app.csrf-except', [])) {
      $config = json_decode($config);
    }
    $this->except = array_merge($this->except, $config);
    if ($this->isReading($request) || $this->shouldPassThrough($request) || $this->tokensMatch($request)) {
      return $this->addCookieToResponse($request, $next($request));
    }
    throw new TokenMismatchException;
  }
}
