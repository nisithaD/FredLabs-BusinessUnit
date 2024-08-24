<?php

namespace FredLabs\BusinessUnits\Models;

use Illuminate\Database\Eloquent\Model;
use PSpell\Config;

class BusinessUnit extends Model
{
    public const BUSINESS_UNIT_ID = 'business_unit_id';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = config('businessunit.fillables', ['name']);
    }
}
