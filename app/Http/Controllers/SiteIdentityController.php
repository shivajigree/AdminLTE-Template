<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteIdentityRequest;
use App\Models\SiteIdentity;
use Flasher\Prime\FlasherInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SiteIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $siteIdentity = SiteIdentity::first();
        if (empty($siteIdentity))
            return view('admin.siteIdentity.partials.create');
        return view('admin.siteIdentity.siteIdentity', compact('siteIdentity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SiteIdentityRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(SiteIdentityRequest $request, FlasherInterface $flasher)
    {
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $input['logo'] = 'logo.png';

            $location = ('logo');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $input['logo']);
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $input['favicon'] = 'favicon.png';

            $location = ('logo');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(48, 48, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $input['favicon']);
        }
        SiteIdentity::create([
            'logo' => $input['logo'],
            'favicon' => $input['favicon'],
            'version' => $request->version,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ]);
        $flasher->addSuccess('Successfully created', 'Successful');
        return redirect('getSiteIdentity');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SiteIdentityRequest $request
     * @param SiteIdentity $getSiteIdentity
     * @return Application|Redirector|RedirectResponse
     */
    public function update(SiteIdentityRequest $request, SiteIdentity $getSiteIdentity, FlasherInterface $flasher)
    {
        $input['logo'] = $getSiteIdentity->logo;
        $input['favicon'] = $getSiteIdentity->favicon;
        if ($request->hasFile('logo')) {
            $logo = ("logo/{$getSiteIdentity->logo}"); // get previous image from folder
            if (File::exists($logo)) { // unlink or remove previous image from folder
                unlink($logo);
            }
            $image = $request->file('logo');
            $input['logo'] = 'logo.png';

            $location = ('logo');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $input['logo']);
        }
        if ($request->hasFile('favicon')) {
            $favicon = ("logo/{$getSiteIdentity->favicon}"); // get previous image from folder
            if (File::exists($favicon)) { // unlink or remove previous image from folder
                unlink($favicon);
            }
            $image = $request->get('favicon');
            $input['favicon'] = 'favicon.png';

            $location = ('logo');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(48, 48, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $input['favicon']);
        }
        $getSiteIdentity->update([
            'logo' => $input['logo'],
            'favicon' => $input['favicon'],
            'version' => $request->version,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ]);
        $flasher->addSuccess('Successfully updated', 'Successful');
        return redirect('getSiteIdentity');
    }
}
