<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $table = 'teachers';
  public $timestamps = false;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre','apellido', 'rut'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  public function course()
  {
      return $this->belongsToMany('App\Course','sections','teacher_1_id','course_1_id')
          ->withPivot('seccion');
  }

  public function disponibility()
  {
      return $this->hasMany('App\Disponibility','teacher_id');
  }

}
