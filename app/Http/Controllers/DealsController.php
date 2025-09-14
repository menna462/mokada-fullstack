<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; // Required for file deletion

class DealsController extends Controller
{
    /**
     * Display a listing of the deals.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $deals = Deal::all();
        return view('backend.deals', compact('deals'));
    }

    public function create()
    {
        return view("backend.deals.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/deals'), $imageName);
            $imagePath = 'images/deals/' . $imageName;
        }

        Deal::create([
            "title" => $request->title,
            "link" => $request->link,
            "is_published" => $request->has('is_published'),
            "image_path" => $imagePath,
        ]);

        return redirect()->route("backend.deals")->with("message", "Created successfully");
    }

    /**
     * Show the form for editing the specified deal.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $deal = Deal::findOrFail($id);
        return view('backend.deals.edit', ["result" => $deal]);
    }

    /**
     * Update the specified deal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $old_id = $request->old_id;
        $deal = Deal::findOrFail(id: $old_id);

        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $isPublished = $request->has('is_published');
        $imagePath = $deal->image_path;

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/deals'), $imageName);
            $imagePath = 'images/deals/' . $imageName;
        }

        $deal->update([
            "title" => $request->title,
            "link" => $request->link,
            "is_published" => $isPublished,
            "image_path" => $imagePath,
        ]);

        return redirect()->route("deals")->with("message", "updated successfully");
    }

    /**
     * Remove the specified deal from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $deal = Deal::findOrFail($id);

        if ($deal->image_path && file_exists(public_path($deal->image_path))) {
            unlink(public_path($deal->image_path));
        }

        $deal->delete();
        return redirect()->route("deals")->with("message", "Deleted successfully");
    }

    /**
     * Toggle the publish status of the specified deal.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function togglePublish(Request $request, Deal $deal)
    {
        $deal->is_published = !$deal->is_published;
        $deal->save();

        $message = $deal->is_published ? 'Deal published successfully' : 'Deal unpublished successfully';
        return redirect()->route('deals')->with('success', $message);
    }
}
