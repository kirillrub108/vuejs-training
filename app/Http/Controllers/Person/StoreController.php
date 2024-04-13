<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validationData();
        $person = Person::create($data);
        return $person;
    }
}
