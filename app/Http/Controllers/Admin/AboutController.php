<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website\Post;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $about =  $this->postRepository->getAll()->where('type', 'about')->first();
        if ($about) {

            return view('admin.pages.about.edit', compact('about'));
        }
        return view('admin.pages.about.form', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['type'] = 'about';
        try {
            $news = $this->postRepository->update($data, $id);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'About us updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['type'] = 'about';
        try {
            $news = $this->postRepository->create($data);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'About us created successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
