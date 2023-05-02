<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website\News;
use App\Modules\Backend\Website\News\NewsRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //

    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index(Request $request)
    {
        $news = News::where('title', 'LIKE', '%' . $request->search . "%")
            ->orwhere('content', 'LIKE', '%' . $request->search . "%")
            ->paginate(10);

        return view('admin.pages.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.pages.news.form');
    }

    public function edit($id)
    {
        $news = $this->newsRepository->findById($id);

        return View('admin.pages.news.edit', compact('news'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        try {
            $news = $this->newsRepository->create($data);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'News created successfully');
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        try {
            $news = $this->newsRepository->update($data, $id);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'News updated successfully');
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function destory($id)
    {

        // $data['image'] = $data['news_pic'];
        try {
            $news = $this->newsRepository->delete($id);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'News removed successfully');
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
