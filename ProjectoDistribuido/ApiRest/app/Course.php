<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre'];

  public $timestamps = false;

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['created_at','updated_at'];


  public function teacher()
  {
      return $this->belongsToMany('App\Teacher','sections','teacher_1_id','course_1_id')
          ->withPivot('nombre');
  }

  public function classrooms()
  {
      return $this->belongsToMany('App\Classroom','schedules','course_2_id','class_id')
          ->withPivot('dia',
                      'periodo_1',
                      'periodo_2',
                      'periodo_3',
                      'periodo_4',
                      'periodo_5',
                      'periodo_6',
                      'periodo_7',
                      'periodo_8'
          );
  }

}
