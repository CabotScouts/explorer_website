<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as TCGUser;
use Laravel\Socialite\Two\User as SocialiteUser;

class User extends TCGUser {
  use Notifiable;

  protected $fillable = ['name', 'email', 'password'];
  protected $hidden = ['password', 'remember_token', 'gid'];

  public function updateFromGoogle(SocialiteUser $returned) {
    $this->name = $returned->getName();
    $this->gid = $returned->getId();
    $this->avatar = $returned->getAvatar();
    $this->save();
  }

  public function getAvatarURLAttribute() {
    if(substr($this->avatar, 0, 4) === "http") {
      return $this->avatar;
    }
    else {
      return "/storage/" . $this->avatar;
    }
  }
}
