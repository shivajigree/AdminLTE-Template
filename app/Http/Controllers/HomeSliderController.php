<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Http\Requests\HomeSliderRequest;
use Flasher\Prime\FlasherInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param HomeSliderRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(HomeSliderRequest $request, FlasherInterface $flasher)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = 'sliders ' . '-' . time() . '-' . $image->getClientOriginalName();

            $location = ('images/sliders');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
//            $img->orientate();
            $img->resize(1200, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $input['image']);
        }
        HomeSlider::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $input['image'],
        ]);
        $flasher->addSuccess('Added successfully.', 'Successful');
        return redirect('getHomeSlider');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HomeSlider $getHomeSlider
     * @return Application|Factory|View
     */
    public function edit(HomeSlider $getHomeSlider)
    {
        return view('admin.homeSlider.edit', [
            'slider' => $getHomeSlider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HomeSliderRequest $request
     * @param HomeSlider $getHomeSlider
     * @return Application|Redirector|RedirectResponse
     */
    public function update(HomeSliderRequest $request, HomeSlider $getHomeSlider, FlasherInterface $flasher)
    {
        $input['image'] = $getHomeSlider->image;
        if ($request->hasFile('image')) {
            $usersImage = ("images/sliders/{$getHomeSlider->image}"); // get previous image from folder
            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                unlink($usersImage);
            }
            $image = $request->file('image');
            $input['image'] = 'sliders ' . '-' . time() . '-' . $image->getClientOriginalName();

            $location = ('images/sliders');
            if (!File::exists($location)) {
                File::makeDirectory($location, 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
//            $img->orientate();
            $img->resize(1200, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location . '/' . $input['image']);
        }
        if ($getHomeSlider->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $input['image']
        ])) {
            $flasher->addSuccess('Updated Successfully', 'Successful');
        } else {
            $flasher->addError('Problem while updating', 'Error');
        }
        return redirect('getHomeSlider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HomeSlider $getHomeSlider
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(HomeSlider $getHomeSlider, FlasherInterface $flasher)
    {
        $filename = 'images/sliders/' . $getHomeSlider->image;
        File::delete($filename);
        if ($getHomeSlider->delete()) {
            $flasher->addSuccess('Deleted Successfully', 'Successful');
        } else {
            $flasher->addError('Problem while deleting', 'Error');
        }
        return redirect('getHomeSlider');
    }
}
