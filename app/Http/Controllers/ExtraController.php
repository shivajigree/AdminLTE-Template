<?php

namespace App\Http\Controllers;

use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Artisan;
use Larinfo;

class ExtraController extends Controller
{
    public function system_info()
    {
        $sysinfo = Larinfo::getInfo();
        return view('admin.extras.sysinfo', compact('sysinfo'));
    }

    public function optimize()
    {
        return view('admin.extras.optimize');
    }

    public function optimizeApplicationCache(FlasherInterface $flasher)
    {
        Artisan::call('cache:clear');
        $flasher->addSuccess('Application Cache is cleared.');
        return redirect('optimize');
    }

    public function optimizeRouteCache(FlasherInterface $flasher)
    {
        Artisan::call('route:clear');
        $flasher->addError('Route Cache is cleared.', 'Success');
        return redirect('optimize');
    }

    public function optimizeConfigCache(FlasherInterface $flasher)
    {
        Artisan::call('config:clear');
        $flasher->addWarning('Configuration Cache is cleared.', 'Success');
        return redirect('optimize');
    }

    public function optimizeViewCache(FlasherInterface $flasher)
    {
        Artisan::call('view:clear');
        $flasher->addInfo('Compiled View Cache is cleared.', 'Success');
        return redirect('optimize');
    }
}
