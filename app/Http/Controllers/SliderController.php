<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $sliders = Slider::query();
        $search = $request->validated('search');
        if ($search) {
            $sliders = Slider::where('desciption', 'like', "%{$search}%");
        } else {
            $sliders = Slider::query();
        }

        return view('admin.slider_liste', [
            'sliders' => $sliders->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slider = new Slider();

        return view('admin.slider_form', [
            'slider' => $slider,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $slider = Slider::create($request->validated());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storePublicly('docImage', 'public');
            $slider->update([
                'image' => $imagePath,
            ]);
        }

        return to_route('admin.slider.index')->with('success', 'le slider a ete ajouter avec success');
    }

    /**
     * Display the specified resource.
     * //  */
    // public function show(string $id)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider_form', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $slider->update($request->validated());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storePublicly('docImage', 'public');
            $slider->update([
                'image' => $imagePath,
            ]);
        }

        return to_route('admin.slider.index')->with('success', 'le slider a ete modifie avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return to_route('admin.slider.index')->with('success', 'le slider a ete supprime avec success');
    }
}
