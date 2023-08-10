<?php


namespace App\Services\Post;


use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
//Первый способ теги раскижать
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id
//            ]);
//        }

//        Второй способ с помощью метода attach
        $post->tags()->attach($tags);
    }

    public function update($data,$post)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);

    }
}
