<?php namespace App\Http\Controllers\Api;

use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class SignatureController extends Controller
{
    /**
     * Return a paginated list of signatures.
     *
     * @return collection
     */
    public function index()
    {
        $signatures = Signature::latest()->ignoreFlagged()->pagginate(20);

        return SignatureResource::collection($signatures);
    }

    /**
     * Fetch and return the signature.
     *
     * @param Signature $signature
     * @return SignatureResource
     */
    public function show(Signature $signature)
    {
        return new SignatureResource($signature);
    }

    /**
     * Validate and save a new signature to the database.
     *
     * @param Request $request
     * @return SignatureResource
     * @throws ValidationException
     */
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
