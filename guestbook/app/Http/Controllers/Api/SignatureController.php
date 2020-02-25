<?php

namespace App\Http\Controllers\Api;

use App\Signature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SignatureResources;

class SignatureController extends Controller
{
    /**
     **_ Return a paignated list of signatures.
     **_ @return SignatureResource
    */
    public function index()
    {
        $signatures = Signatures::latest()
            ->ignoreFlagged()
            ->paginate(20);

        return SignatureResource::collection($signatures);
    } 
    
    /*
     _ Fetch and return the signature.
     _
     _ @param Signature $signature
     _ @return SignatureResource
     _*/
     public function show(Signature $signature)
     {
         return new SignatureResource($signature);
     }

    /*
    _   Validate and save a new signature to the database.
    _
    _ @param Request $request
    _ @return SignatureResource
    _*/
    public function store(Request $request)
    {
        $signature = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'body' => 'required|min:3'
        ]);

        $signature = Signature::create($signature);

        return new SignatureResource($signature);
    }      
}
