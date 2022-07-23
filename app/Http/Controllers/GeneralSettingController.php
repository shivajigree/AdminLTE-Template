<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use App\Models\GeneralSetting;
use Flasher\Prime\FlasherInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $generalSetting = GeneralSetting::first();
        if (empty($generalSetting))
            return view('admin.generalSetting.partials.create');
        return view('admin.generalSetting.generalSetting', compact('generalSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GeneralSettingRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(GeneralSettingRequest $request, FlasherInterface $flasher)
    {
        GeneralSetting::create([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'email' => ($request->email),
            'number' => ($request->number),
            'address' => $request->address,
            'description' => $request->description,
            'footer_copyright' => $request->footer_copyright,
            'footer_about_us' => $request->footer_about_us,
            'contact_map' => $request->contact_map,
        ]);
        $flasher->addSuccess('Successfully created', 'Successful');
        return redirect('getGeneralSetting');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GeneralSettingRequest $request
     * @param GeneralSetting $getGeneralSetting
     * @return Application|Redirector|RedirectResponse
     */
    public function update(GeneralSettingRequest $request, GeneralSetting $getGeneralSetting, FlasherInterface $flasher)
    {
        $getGeneralSetting->update([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
            'description' => $request->description,
            'footer_copyright' => $request->footer_copyright,
            'footer_about_us' => $request->footer_about_us,
            'contact_map' => $request->contact_map,
        ]);
        $flasher->addSuccess('Successfully updated', 'Successful');
        return redirect('getGeneralSetting');
    }
}
