<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternalNotification
 *
 * @package App
 * @property string $text
 * @property string $link
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalNotification whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalNotification whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InternalNotification extends Model
{
    protected $fillable = ['text', 'link'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        InternalNotification::observe(new \App\Observers\UserActionsObserver);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'internal_notification_user');
    }
    
}
