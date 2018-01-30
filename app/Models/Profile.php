<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
    	'id'
    ];

	/**
	 * Fillable fields for a Profile
	 *
	 * @var array
	 */
	protected $fillable = [
        'location',
		'bio',
		'twitter_username',
		'facebook_username',
        'sapc_number',
        'sapc_active',
        'sapc_registration',
        'pssa_number',
        'pssa_active',
        'pssa_registration',
        'internship_completed',
        'internship_current',
        'internship_location',
        'qualified',
        'working',
        'practice_site_id',
	];
    protected $casts = [
        'theme_id' => 'integer',
    ];


	/**
	 * A profile belongs to a user
	 *
	 * @return mixed
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    /**
     * Profile Theme Relationships
     *
     * @var array
     */
    public function theme()
    {
        return $this->hasOne('App\Models\Theme');
    }


    public function practiceSite()
    {
        return $this->belongsTo('App\Models\practiceSite');
    }


}