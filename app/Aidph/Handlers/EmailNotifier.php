<?php  namespace Aidph\Handlers; 

use Aidph\Mailers\UserMailer;
use Aidph\Registration\Events;
use Aidph\Registration\Events\UserHasCreated;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

    /**
     * @var UserMailer
     */
    private $mailer;

    /**
     * @param UserMailer $mailer
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param UserHasCreated $event
     */
    public function whenUserHasCreated(UserHasCreated $event)
    {
        $this->mailer->sendConfirmationMessage($event->user);
    }

} 