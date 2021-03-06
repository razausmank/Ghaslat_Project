<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'customer_id', 'phone', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    protected $with = [ 'customer' ] ;

    // User can have many roles
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // helper function to assign a role
    public function syncRoles($roles)
    {
        $this->roles()->sync($roles);
    }

    // get all the permissions a user has
    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    // get all the pages a user has access to
    public function pages()
    {
        return $this->roles->map->pagePermissions->flatten()->pluck('name')->unique();
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    // get last generated code
    public function userCode() {
        return $this->hasOne(UserCode::class) ;
    }

    public function getCode(){
        return $this->userCode->code ;
    }

    public function isCodeExpired(){
        return Carbon::now() > $this->userCode->expires_at ;
    }

    // 2fa code generator
    public function generateCode()
    {
        $code = rand(10000, 99999);

        UserCode::updateOrCreate(
            [ 'user_id' => $this->id ],
            [ 'code' => $code , 'expires_at' => Carbon::now()->addYears(10)]
        );

        return $code ;
    }

    public function validateCode( $code ) {
        return $code == $this->getCode();
    }

}
