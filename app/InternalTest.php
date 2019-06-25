<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class InternalTest extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'ia1','subject_id','roll_no','division_id','ia2','status1','status2',
    ];
}