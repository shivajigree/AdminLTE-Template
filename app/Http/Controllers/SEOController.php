<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEORequest;
use App\Models\SEO;
use Flasher\Prime\FlasherInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $seo = SEO::first();
        if (empty($seo))
            return view('admin.seo.partials.create');
        return view('admin.seo.seo', compact('seo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param SEORequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(SEORequest $request, FlasherInterface $flasher)
    {
        SEO::create([
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'social_title' => $request->social_title,
            'social_description' => $request->social_description
        ]);
        $flasher->addSuccess('Successfully created', 'Successful');
        return redirect('getSEO');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SEORequest $request
     * @param SEO $getSEO
     * @return Application|Redirector|RedirectResponse
     */
    public function update(SEORequest $request, SEO $getSEO, FlasherInterface $flasher)
    {
        $getSEO->update([
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'social_title' => $request->social_title,
            'social_description' => $request->social_description
        ]);
        $flasher->addSuccess('Successfully updated', 'Successful');
        return redirect('getSEO');
    }

}
