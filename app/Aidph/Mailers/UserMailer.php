<?php  namespace Aidph\Mailers; 

use User;

class UserMailer extends Mailer {

    /**
     * @param User $user
     */
    public function sendConfirmationMessage(User $user)
    {
        $subject = 'Welcome to aidPH';
        $view = 'emails.registration.confirm';

        $confirmation_code = $user->password;
        $data = [
            'confirmation_code' => $confirmation_code
        ];

        return $this->sendTo($user, $subject, $view, $data);
    }

}