<?php  namespace Aidph\Mailers; 

use User;

class UserMailer extends Mailer {

    /**
     * @param User $user
     */
    public function sendConfirmationMessage(User $user)
    {
        $subject = 'Welcome to #aidPH';
        $view = 'emails.registration.confirm';

        return $this->sendTo($user, $subject, $view);
    }

}