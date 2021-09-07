<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = DocumentType::paginate($request->query('per_page'));
        $message = 'all DocumentTypeController';
        $status = 'success';
        return response()->json(compact(['data', 'message', 'status']), 200);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'title' => 'required|string|min:4'
            ]
        );

        $data = DocumentType::create($attributes);
        $message = 'DocumentType is created';
        $status = 'success';
        return response()->json(compact(['data', 'message', 'status']), 201);
    }

    public function update(Request $request, DocumentType $documentType)
    {
        $attributes = $request->validate(
            [
                'title' => 'required|string|min:2'
            ]
        );
        // $documentType =DocumentType::where('id', $request->id);
        $documentType->update($attributes);
        $data = $documentType->refresh();
        $message = 'DocumentType is update';
        $status = 'success';
        return response()->json(compact(['data', 'message', 'status']), 201);
    }

    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();
        $data = $documentType->refresh();
        $message = 'DocumentType is delete';
        $status = 'success';
        return response()->json(compact(['data', 'message', 'status']),201);
    }
}


