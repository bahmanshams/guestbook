<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Signature
 * @package App
 */
class Signature extends Model
{
    /**
     * Field to be mass-assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'body', 'flagged_at'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Ignore flagged signatures.
     *
     * @param $query
     * @return mixed
     */
    public function scopeIgnoreFlagged($query)
    {
        return $query->where('flagged_at', null);
    }

    /**
     * Flag the given signature.
     *
     * @return bool
     */
    public function flag()
    {
        return $this->update(['flagged_at' => carbon::now()]);
    }

    public function getAvatarAttribute()
    {
        return sprintf("https://www.gravatar.com/avatar/%s?s=100", md5($this->email));
    }
}
