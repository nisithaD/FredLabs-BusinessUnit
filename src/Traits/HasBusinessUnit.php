<?php

namespace FredLabs\BusinessUnits\Traits;

use FredLabs\BusinessUnits\Models\BusinessUnit;
use FredLabs\BusinessUnits\Scopes\BusinessUnitFilterScope;

trait HasBusinessUnit
{
    /**
     * @return void
     */
    protected static function bootHasBusinessUnit(): void
    {
        static::addGlobalScope(new BusinessUnitFilterScope());

        static::creating(function ($model) {
            $model->assignBusinessUnit();
        });

        static::saving(function ($model) {
            $model->assignBusinessUnit();
        });

        static::updating(function ($model) {
            $model->assignBusinessUnit();
        });

    }

    /**
     * @return void
     */
    public function assignBusinessUnit(): void
    {
        if (empty($this->business_unit_id)) {
            $this->business_unit_id = app('current_business_unit_id');
        }
    }

    /**
     * Override the getFillable method to include 'business_unit_id'.
     *
     * @return array
     */
    public function getFillable()
    {
        $fillable = parent::getFillable();

        if (!in_array(BusinessUnit::BUSINESS_UNIT_ID, $fillable)) {
            $fillable[] = BusinessUnit::BUSINESS_UNIT_ID;
        }

        return $fillable;
    }

}
