<?php namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;
use App;
use Config;
use Illuminate\Support\Facades\View;
use Backpack\LangFileManager\app\Models\Language;

class Locale {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	//xdebug_break();
        $locale = $request->cookie('locale', Config::get('app.locale'));
        App::setLocale($locale);
        Carbon::setLocale($locale);
        $localeStr = '';
        $left = 'left';
        $right = 'right';
        if($locale == 'he')
        {
        	$localeStr = '-rtl';
        	$left = 'right';
        	$right = 'left';
        }
        View::share('localeStr',$localeStr);
        View::share('right',$right);
        View::share('left',$left);
        View::share('langs',Language::all());

        return $next($request);
    }
}