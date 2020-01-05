<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Socialite\Two\User as SocialiteUser;

class User extends \TCG\Voyager\Models\User {
  use Notifiable;

  protected $fillable = ['name', 'email', 'password'];
  protected $hidden = ['password', 'remember_token', 'gid'];

  private function compare($old, $new) {
    return ($old == $new) ? $old : $new;
  }

  public function updateFromGoogle(SocialiteUser $returned) {
    $this->name   = $this->compare($this->name, $returned->getName());
    $this->gid    = $this->compare($this->gid, $returned->getId());
    $this->avatar = $this->compare($this->avatar, $returned->getAvatar());
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
