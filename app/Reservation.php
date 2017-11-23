<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservation
 *
 * @package App
 * @property string $name
 * @property string $customer
 * @property string $room
 * @property string $start
 * @property string $end
 * @property tinyInteger $paid
 * @property string $status
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $customer_id
 * @property int|null $room_id
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Reservation withoutTrashed()
 * @mixin \Eloquent
 */
class Reservation extends Model
{
    use SoftDeletes;
 protected $dateFormat = 'Y-m-d H:i:s';
    
    protected $fillable = ['name', 'start', 'end', 'paid', 'status', 'customer_id', 'room_id'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

      
        Reservation::observe(new \App\Observers\UserActionsObserver);

        Reservation::observe(new \App\Observers\ReservationCrudActionObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoomIdAttribute($input)
    {
        $this->attributes['room_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['start'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEndAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['end'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['end'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id')->withTrashed();
    }
    
}
