<?php  namespace Aidph\Registration;

use Aidph\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use User;

class RegisterUserCommandHandler implements CommandHandler{

    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @param UserRepository $repository
     */
    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::register(
            $command->area_id, $command->username, $command->email, $command->role
        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }
}