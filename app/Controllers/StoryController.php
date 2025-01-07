<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Story;

class StoryController extends BaseController
{
    public function index()
    {
        return view('new_story');
    }

    public function save()
    {
        $model = new Story();

        $validation = $this->validate([
            'title' => 'required',
            'content' => 'required|min_length[10]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'author_id' => session()->get('user_id'), // Assuming user ID is stored in session
            'status' => 'draft',
        ]);

        return redirect()->to('/story/list')->with('message', 'Story saved successfully!');
    }

    public function list()
    {
        $model = new Story();
        $data['stories'] = $model->where('author_id', session()->get('user_id'))->findAll();

        return view('story_list', $data);
    }
}
