<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibility extends Model
{
  protected $table = 'disponibilities';

  public $timestamps = false;
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = [ 'dia',
                        'periodo_1',
                        'periodo_2',
                        'periodo_3',
                        'periodo_4',
                        'periodo_5',
                        'periodo_6',
                        'periodo_7',
                        'periodo_8',
                        'teacher_id'
                    ];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $hidden = [];

public function teachers()
{
    return $this->belongsTo('App\Teacher','teacher_id');
}
}
