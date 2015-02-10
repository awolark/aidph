<?php  namespace Aidph\Providers; 

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * Register Aidph event listeners.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen('Aidph.*', 'Aidph\Handlers\EmailNotifier');
    }
}