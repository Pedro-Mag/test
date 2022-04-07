<?php

namespace App\Models\Admin;

use Transliterator;
use App\Models\Admin\AdminRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $connection = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'admin_role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setnameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $nameArray = explode(" ", $name);

        //definir as iniciais
        $iniciais = substr($nameArray[0], 0, 1) . substr($nameArray[count($nameArray) - 1], 0, 1);
        $iniciais = mb_strtoupper($iniciais);
        $this->attributes['iniciais'] = $iniciais;

        //definir slug se for novo
        if (!$this->id) {
            while (1) {

                $slug = $nameArray[0] . "-" . bin2hex(openssl_random_pseudo_bytes(1)) . "-" . $nameArray[count($nameArray) - 1];
                $transliterator = Transliterator::createFromRules(':: Any-Latin; :: Latin-ASCII; :: NFD; :: [:Nonspacing Mark:] Remove; :: Lower(); :: NFC;', Transliterator::FORWARD);
                $slug = $transliterator->transliterate($slug);

                $checkSlug = AdminUser::whereSlug($slug)->exists();

                if (!$checkSlug) {
                    break;
                }
            }

            $this->attributes['slug'] = $slug;
        }
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getImageAttribute()
    {
        $image = "/images/johndoe.png";
        if ($this->avatar) $image = "/utilizadores/{$this->slug}/";
        return $image;
    }

    public function getThumbnailAttribute()
    {
        $image = "/images/min-johndoe.png";
        if ($this->avatar) $image = "/images/admin/min-{$this->avatar}";
        return $image;
    }

    public function getIsAdminAttribute()
    {
        if ($this->admin_role_id == 1) return true;
    }

    public function admin_role()
    {
        return $this->belongsTo(AdminRole::class);
    }

    public function clientes()
    {
        return $this->hasMany(AdminCliente::class);
    }

    public function otherClientes()
    {
        if ($this->admin_role_id == 1) return AdminCliente::WhereNotIn('admin_user_id', [$this->id]);
    }

    public function events()
    {
        return $this->belongsToMany(AdminEvent::class, 'admin_cliente_admin_event_admin_user')
            ->withPivot('admin_cliente_id')
            ->withTimestamps();
    }
}
