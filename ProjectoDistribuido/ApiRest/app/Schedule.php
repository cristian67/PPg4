<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $table = 'schedules';

  public $timestamps = false;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['dia',
                          'periodo_1',
                          'periodo_2',
                          'periodo_3',
                          'periodo_4',
                          'periodo_5',
                          'periodo_6',
                          'periodo_7',
                          'periodo_8',
                          'id',
                          'course_2_id',
                          'class_id'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['created_at','updated_at'];

}
