<?php

namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Post\Requests\CreatePostRequest;
use App\Modules\Backend\Website\Post\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Log as FacadesLog;

class BannerController extends BaseController
{
    private $postRepository, $log;
    public function __construct(FacadesLog $log, PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->log = $log;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $this->postRepository->getModel());
        return $this->view('web-site.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $createPostRequest)
    {

        $this->authorize('create', $this->postRepository->getModel());
        $data = $createPostRequest->all();
        $data['image'] = $data['banner'];
        try {
            $banner = $this->postRepository->create($data);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Banner created successfully');
            return redirect()->route('dashboard.banners.index');
        } catch (\Exception $e) {
            $this->log->error('Banner create : ' . $e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', $this->postRepository->getModel());
        $banner = $this->postRepository->findById($id);
        return $this->view('web-site.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $updatePostRequest, $id)
    {
        $this->authorize('update', $this->postRepository->getModel());
        $data = $updatePostRequest->all();
        $data['image'] = $data['banner'];
        try {
            $banner = $this->postRepository->update($data, $id);
            if ($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Banner updated successfully');
            return redirect()->route('dashboard.banners.index');
        } catch (\Exception $e) {
            $this->log->error('Banner update : ' . $e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
