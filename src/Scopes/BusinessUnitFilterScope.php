<?php

namespace FredLabs\BusinessUnits\Scopes;

use FredLabs\BusinessUnits\Models\BusinessUnit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BusinessUnitFilterScope implements Scope
{
    protected $businessUnitId;

    public function __construct($businessUnitId = null)
    {
        $this->businessUnitId = $businessUnitId;
    }

    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::user();

        if (method_exists($model, 'isAvailableForAdmins') && $model->isAvailableForAdmins()) {
            return;
        }

        if ($this->businessUnitId !== null) {
            $builder->where('business_unit_id', $this->businessUnitId);
        }
    }

    public static function set_business_unit_id($businessUnitId): void
    {
        App::instance('current_business_unit_id', $businessUnitId);
    }

    public static function get_business_unit()
    {
        return BusinessUnit::where('id', App::get('current_business_unit_id'))->first();
    }
}
