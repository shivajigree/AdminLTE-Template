<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Flasher\Prime\FlasherInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $about = About::first();
        if (empty($about))
            return view('admin.about-us.partials.create');
        return view('admin.about-us.about-us', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AboutRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(AboutRequest $request, FlasherInterface $flasher)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $about_image = 'About ' . '-' . time() . '.' . $image->getClientOriginalName();

            $location = ('images/about');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $about_image);
        }
        About::create([
            'description' => $request->description,
            'image' => $about_image,
        ]);
        $flasher->addSuccess('Successfully created', 'Successful');
        return redirect('getAbout');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AboutRequest $request
     * @param About $getAbout
     * @return Application|RedirectResponse|Redirector
     */
    public function update(AboutRequest $request, About $getAbout, FlasherInterface $flasher)
    {
        $about_image = $getAbout->image;
        if ($request->hasFile('image')) {
            $usersImage = ("images/about/{$getAbout->image}"); // get previous image from folder
            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                unlink($usersImage);
            }

            $image = $request->file('image');
            $about_image = 'About ' . '-' . time() . '.' . $image->getClientOriginalName();

            $location = ('images/about');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->save($location . '/' . $about_image);
        }
        $getAbout->update([
            'description' => $request->description,
            'image' => $about_image,
        ]);

        $flasher->addSuccess("Updated Successfully", 'Successful');
        return redirect('getAbout');
    }


}
