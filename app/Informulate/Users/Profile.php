<?php namespace Informulate\Users;

use Laracasts\Commander\Events\EventGenerator;
use Eloquent;

class Profile extends Eloquent
{ 
	use EventGenerator;

	/**
	 * Fields that are mass assigned
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'location', 'about', 'facebook', 'twitter', 'youtube', 'published'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';

	/**
	 * The owner of this profile
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function skill()
	{
		return $this->belongsTo('Informulate\Skills\Skill');
	}

	/**
	 * Update a user's profile
	 *
	 * @param User $user
	 * @param $attributes
	 *
	 * @return static
	 */
	public static function updateProfile(User $user, array $attributes)
	{
		$profile = $user->profile;

		if (is_null($profile)) {
			$profile = new static();
		}

		$profile->first_name = $attributes['first_name'];
		$profile->last_name = $attributes['last_name'];
		$profile->location = array_key_exists('location', $attributes) ? $attributes['location'] : '';
		$profile->skill_id = array_key_exists('describe', $attributes) ? $attributes['describe'] : '';
		$profile->about = array_key_exists('about', $attributes) ? $attributes['about'] : '';
		$profile->facebook = array_key_exists('facebook', $attributes) ? $attributes['facebook'] : '';
		$profile->twitter = array_key_exists('twitter', $attributes) ? $attributes['twitter'] : '';
		$profile->youtube = array_key_exists('youtube', $attributes) ? $attributes['youtube'] : '';
		$profile->published = array_key_exists('published', $attributes) ? true : false;
		$profile->user_id = $user->id;

		return $profile;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('Informulate\Tags\Tag');
	}
}
