<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website\News;
use App\Models\Website\Post;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $post =
            Post::where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('content', 'LIKE', '%' . $request->search . "%");
            })
            ->where('type', 'post')
            ->paginate(10);

        return view('admin.pages.post.index', compact('post'));
    }

    public function create()
    {
        return view('admin.pages.post.form');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findById($id);

        return View('admin.pages.post.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['type'] = 'post';
        try {

            $news = $this->postRepository->create($data);

            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Post created successfully');
            return redirect()->route('post.index');
        } catch (\Exception $e) {

            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['type'] = 'post';
        try {
            $news = $this->postRepository->update($data, $id);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Post updated successfully');
            return redirect()->route('post.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function destory($id)
    {

        // $data['image'] = $data['news_pic'];
        try {
            $post = $this->postRepository->delete($id);
            if ($post == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Post removed successfully');
            return redirect()->route('post.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
