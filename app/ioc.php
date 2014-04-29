<?php

use Dream\Utility\Http\Port;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Application Filter
|--------------------------------------------------------------------------
|
| Below you will find the "before" events for the application
| which may be used to do any work before or after a request into your
| application
|
*/

App::before(function()
{
	Event::fire('server.status.check');
	Event::fire('vote.links.fetch');
	Event::fire('view.share');
});