<?php


namespace App\Services\Person;


use App\Models\API\PeopleFile;
use App\Models\Person;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data, $request)
    {
        $data['author'] = auth()->user()->name;
        $files = $request->file('file');
        $exists = Person::where('title', $data['title'])->where('text', $data['text'])->exists();
        unset($data['file']);

        if(empty($exists)) {
            $result = Person::create($data);
            foreach ($files as $file) {
                $filePath = $file->store('local');
                $fileName = $file->getClientOriginalName();
                PeopleFile::firstOrCreate([
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'id_people' => $result['id']
                ]);
            }
            return $result;
        }else{
            return 'Запись уже существует!!!';
        }
    }

    public function update($data, $request, $person)
    {
        $files = $request->file('file');
        $filesDatabase = $person->peopleFiles()->get()->toArray();

        unset($data['file']);
        PeopleFile::where('id_people', $person->id)->delete();

        foreach ($filesDatabase as $fileData) {
            if (Storage::exists($fileData['file_path'])) {
                Storage::delete($fileData['file_path']);

            } else {
                return"Файл не найден.";
            }
        }

        foreach ($files as $file) {

            $filePath = $file->store('local');
            $fileName = $file->getClientOriginalName();

            $existingFile = PeopleFile::where('file_name', $fileName)->where('id_people', $person->id)->first();
            if (!$existingFile) {
                PeopleFile::create([
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'id_people' => $person->id
                ]);
            }
        }

        $result = $person->update($data);
        return $result;
    }
}
