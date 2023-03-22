<?php
namespace App\Traits;
use Illuminate\Support\Facades\Crypt;


trait HasEcryptedIds
{
    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function resolveRouteBinding($encryptedId, $field = null)
    {
        return $this->where('id', Crypt::decryptString($encryptedId))->firstOrFail();
    }
}
