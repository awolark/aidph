<?php

namespace Aidph\Helpers;


use Area;
use User;

trait UserQueryHelperTrait {

    /**
     * @param $loggedUserId
     * @param $limit
     * @return array
     */
    public function getUsersOfLoggedUser($loggedUserId, $limit)
    {
        $areaIds = [];
        $users = [];

        $areaIds = Area::getAreaIdsForUser($loggedUserId);

        $users = User::with('area')
            ->where('id', '!=', $loggedUserId)
            ->whereIn('area_id', $areaIds)
            ->orderBy('recstat', 'asc')
            ->paginate($limit);
        return $users;
    }

    public static function getUsersArea($userId)
    {
        $result = User::with('area')->find($userId);

        return $result->area;
    }

    /* Get all areas for the current logged user
    *  param is users id
    */
    public function getLoggedUserAreas($userId)
    {
        $areas = Area::getAreasForLoggedUser($userId);

        return $this->respondWithDataRequested($areas);
    }

} 