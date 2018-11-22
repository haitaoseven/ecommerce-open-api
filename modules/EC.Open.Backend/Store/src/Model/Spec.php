<?php

namespace iBrand\EC\Open\Backend\Store\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Spec extends Model implements Transformable
{
    use TransformableTrait;
  
    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('ibrand.app.database.prefix', 'ibrand_').'goods_spec');
    }

    public function getTypeNameAttribute()
    {
        return $this->attributes['type'] == 1?'文字':'图片';
    }

    public function specValue()
    {
        return $this->hasMany(SpecsValue::class,'spec_id');
    }
}