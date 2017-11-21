<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MessengerTopic;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\MessengerMessage
 *
 * @property int $id
 * @property int $topic_id
 * @property int $sender_id
 * @property string $content
 * @property \Carbon\Carbon $sent_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\User $sender
 * @property-read \App\MessengerTopic $topic
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\MessengerMessage onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MessengerMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MessengerMessage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\MessengerMessage withoutTrashed()
 * @mixin \Eloquent
 */
class MessengerMessage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'topic_id',
        'sender_id',
        'content'
    ];
    protected $dates = [
        'sent_at'
    ];
    public $with = ['sender'];


    public function topic()
    {
        return $this->belongsTo(MessengerTopic::class);
    }

    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function unread($topic)
    {
        $user = Auth::user();
        if ($this->sender->id == $user->id) {
            return false;
        }
        $read_at = $topic->userType() . "_read_at";
        $read_at = $topic->{$read_at};
        if (! $read_at) {
            return true;
        }
        if ($this->sent_at > $read_at) {
            return true;
        }

        return false;

    }
}
