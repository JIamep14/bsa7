<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Book
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property integer $year
 * @property string $genre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereAuthor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereGenre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    protected $fillable = ['title', 'author', 'genre', 'year'];
    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
