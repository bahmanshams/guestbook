<?php namespace App\Http\Controllers\Api;

use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ReportSignature
 * @package App\Http\Controllers\Api
 */
class ReportSignature extends Controller
{
    /**
     * @param Signature $signature
     * @return Signature
     */
    public function update(Signature $signature)
    {
        $signature->flagg();

        return $signature;
    }
}
