<?php namespace App\Http\Controllers\Api;

use App\Http\Resources\SignatureResource;
use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class SignatureController extends Controller
{
    /**
     * Return a paginated list of signatures.
     *
     * @return AnonymousResourceCollection|Collection
     */
    public function index()
    {
//        dd(Signature::latest()->paginate(1)->items()[0]->toArray());
//        $signatures = Signature::latest()->ignoreFlagged()->paginate(20);

        return SignatureResource::collection(Signature::latest()->paginate(1));
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
