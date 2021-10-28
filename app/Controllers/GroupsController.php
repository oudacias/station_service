<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Authorization\GroupModel;

class GroupsController extends BaseController
{
    public function index()
    {
        $groups = new GroupModel();
        $groups = $groups->getGroups();
        return view('group_list', ['groupList'=>$groups]);
    }

    public function addGroups(){
        $groups = new GroupModel();
        $data = $this->request->getPost();
        if ($groups->where('name', $data['name'])->getGroups())
        {
            echo "group doesn't exits";
            return redirect()->back()->withInput()->with('error', lang('Auth.groupExists'));
        }
        return redirect()->route('group_list')->with('message', lang('Auth.groupAdded', [$data["name"]]));
    }
}