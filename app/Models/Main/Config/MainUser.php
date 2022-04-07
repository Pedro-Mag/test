<?php

namespace App\Models\Main\Config;

use App\Models\Admin\Module;
use Transliterator;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Main\Config\MainUserGroup;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MainUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $connection = 'clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'iniciais',
        'slug',
        'avatar',
        'main_user_group_id',
        'rgpd',
        'gestor',
        'password',
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

    protected $observables = ['passwordReseted', 'PermissionChanged'];

    public function passwordReset()
    {
        $this->fireModelEvent('passwordReseted', false);
    }

    public function updatePermissions()
    {
        $this->fireModelEvent('PermissionChanged', false);
    }

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

                $checkSlug = MainUser::whereSlug($slug)->exists();

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
        if ($this->avatar) $image = "/displayimage/users/{$this->avatar}";
        return $image;
    }

    public function getThumbnailAttribute()
    {
        $image = "/images/min-johndoe.png";
        if ($this->avatar) $image = "/images/clientes/min-{$this->avatar}";
        return $image;
    }


    public function userGroup()
    {
        return $this->belongsTo(MainUserGroup::class, 'main_user_group_id');
    }

    public function departamentos()
    {
        return $this->belongsToMany(MainDepartamento::class, 'main_departamentos_main_user');
    }

    public function permissoes()
    {
        $database = $this->getConnection()->getDatabaseName();
        return $this->belongsToMany(Module::class, "$database.main_user_modules");
    }

    public function events()
    {
        return $this->belongsToMany(MainEvent::class);
    }

}
