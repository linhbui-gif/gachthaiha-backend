<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends ResourceController
{
    /**
     * Model use to perform to database
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * View path
     *
     * @var string
     */
    protected $viewPath = 'contact';


    /**
     * Name
     *
     * @var string
     */
    protected $name = 'Liên hệ';


    /**
     * Route name
     *
     * @var string
     */
    protected $route = 'contact';


    /**
     * Store a record
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255']
        ]);

        return parent::store($request);
    }


    /**
     * Update a record
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['bail', 'required', 'max:255'],
            'phone' => ['bail', 'nullable', 'max:255'],
            // 'description' => ['required', 'max:255']
        ]);
        $this->updateData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'title' => $request->title,
            'content' => $request->post('content'),
            'status' => $request->status
        ];
        return parent::update($request, $id);
    }
}
