<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $student_id
 * @property int $subject_id
 * @property int $col_num
 * @property double $score
 * @property string $scored_at
 */
class Request extends Model
{
    //

    protected $fillable = [
        'street_id', 'school', 'year', 'class', 'name', 'address',
    ];

    public function street()
    {
        return $this->belongsTo('App\Street');
    }


}
