<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Autors;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
 public function __invoke(StoreRequest $request)
 {
     $data = $request->validated();
     //dd( $data);
     $this->service->store($data);

     return redirect()->route('post.index');
 }
}
