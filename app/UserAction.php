<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAction
 *
 * @package App
 * @property string $user
 * @property string $action
 * @property string $action_model
 * @property integer $action_id
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereActionModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAction whereUserId($value)
 * @mixin \Eloquent
 */
class UserAction extends Model
{
    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setActionIdAttribute($input)
    {
        $this->attributes['action_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
