<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    //
    public function index(Request $request)
    {

        $data =DocumentType:: query()->get();
        //$data =$documenttype->paginate($request->input('per_page') ?? 1);
        $message = 'all DocumentTypeController';
        $status = 'success';
        return response()->json(compact(['data','message','status']),200);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'title'=>'required|string|min:4'
            ]
        );

        $data = DocumentType::create($attributes);
        $message = 'DocumentType is created';
        $status = 'success';
        return response()->json(compact('data','message','status'),201);
    }

    public  function update(Request $request ,DocumentType $documentType)
    {
        $attributes = $request->validate(
            [
               'title' => 'required|string|min:2'
            ]
        );
       // $documentType =DocumentType::where('id', $request->id);
        $data = $documentType->update($attributes);
        $message = 'DocumentType is update';
        $status = 'success';
      return response()->json(compact('data','message','status'),201);
    }}

   /* public  function update(Request $request ,$id)
    {
        $attributes = $request->validate(
            [
                'title' => 'required|string|min:2'
            ]
        );
        $documentType =DocumentType::where('id', $id);
        $data = $documentType->update($attributes);
        $message = 'DocumentType is update';
        $status = 'success';
        return response()->json(compact('data','message','status'),201);

    }}*/

