<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Story;


class StoryController extends BaseController
{
    public function index()
    {
        // Render the form for creating a new story
        return view('new_story');
    }

    public function save()
{
    $model = new Story();

    // Validate the form input
    $validation = $this->validate([
        'title' => 'required|max_length[255]',
        'content' => 'required|min_length[10]',
    ]);

    if (!$validation) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Retrieve the story_id from the form
    $storyId = $this->request->getPost('story_id');

    $data = [
        'title' => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'image_url' => $this->request->getPost('image_url'),
        'author_id' => session()->get('user_id'),
        'status' => 'published',
    ];

    if (!empty($storyId)) {
        // Update existing story
        $model->update($storyId, $data);
        return redirect()->to('/articles')->with('message', 'Your article has been updated successfully!');
    } else {
        // Create a new story
        $model->insert($data);
        return redirect()->to('/articles')->with('message', 'Your article has been published successfully!');
    }
}

    public function list()
{
    $model = new Story();

    // Fetch only articles belonging to the logged-in user
    $userId = session()->get('user_id');
    $data['articles'] = $model->where('author_id', $userId)->findAll();

    return view('article_list', $data);
}
public function edit($id)
{
    $model = new Story();
    $story = $model->find($id);

    if (!$story || $story['author_id'] != session()->get('user_id')) {
        return redirect()->to('/articles')->with('error', 'You are not authorized to edit this article.');
    }

    return view('new_story', ['story' => $story]);
}

public function update($id)
{
    $model = new Story();

    // Validate the input
    $validation = $this->validate([
        'title' => 'required|max_length[255]',
        'content' => 'required|min_length[10]',
        'image_url' => 'required|max_length[255]', // If image URL is part of the edit
    ]);

    if (!$validation) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Update the story in the database
    $model->update($id, [
        'title' => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'image_url' => $this->request->getPost('image_url'),
    ]);

    return redirect()->to('/articles')->with('message', 'Story updated successfully.');
}

public function delete($id)
{
    $model = new Story();

    // Find the story
    $story = $model->find($id);

    // Check if the story exists and belongs to the logged-in user
    if (!$story || $story['author_id'] != session()->get('user_id')) {
        return redirect()->to('/articles')->with('error', 'You are not authorized to delete this article.');
    }

    // Delete the story
    $model->delete($id);

    return redirect()->to('/articles')->with('message', 'The article has been deleted successfully.');
}

}
