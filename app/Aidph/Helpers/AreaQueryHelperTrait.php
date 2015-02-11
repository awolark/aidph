<?php  namespace Aidph\Helpers; 

use Illuminate\Support\Facades\Log;
use User;

trait AreaQueryHelperTrait {

    /* My Custom Queries */


    /**
     * @param $loggedUserId
     * @param $limit
     * @return array
     */


    public static function getAreaIdsForUser($userId, $areaIdToExcempt = '', $isAdmin = false)
    {
        $areaIds = [];

        $childrenAreas = $isAdmin ? static::getAreasForUser($userId, '', false) : static::getAreasForUser($userId);

        if(empty($areaIdToExcempt)){
            foreach ( $childrenAreas as $a ) {
                $areaIds[] = $a->id;
            }
        }else {
            foreach ( $childrenAreas as $a ) {
                if($a->id !== $areaIdToExcempt){
                    $areaIds[] = $a->id;
                }
            }
        }

        return $areaIds;
    }

    public static function getAreasForUser($userId, $notAllLevel = true)
    {
        $userWithArea = User::with('area')->find($userId);

        return static::getAreaAndChildren($userWithArea->area, $notAllLevel);
    }

    /**
     * Get Area and Children
     * @param $area
     * @param bool $getAllLevel
     * @return array
     */
    public static function getAreaAndChildren($area, $notAllLevel = true)
    {
        $result[] = $area;

        /* Get all area from all level
         * For super admin
        */
        if($notAllLevel) {
            self::getFirstLevelChildren($area->id, $result);
        }
        /*
         * Get 1st level area only
         */
        else {
            self::getAreaAndChildrenHelper($area->id, $result);
        }

        return $result;
    }

    /**
     * @param $parentId
     * @param $areas
     */
    public static function getFirstLevelChildren($parentId, &$areas)
    {
        $areasResult = static::parent($parentId)
                        ->orderBy('id')
                        ->get()
                        ->all();

        $areas = array_merge($areasResult, $areas);
    }

    /**
     * @param $parentId
     * @param $areas
     * @internal param $parent_id
     */
    public static function getAreaAndChildrenHelper($parentId, &$areas)
    {
        $areasResult = static::parent($parentId)->get();

        foreach ( $areasResult as $area ) {
            $areas[] = $area;

            self::getAreaAndChildrenHelper($area->id, $areas);
        }
    }

    public function scopeParent($query, $parentId)
    {
        return $query->where('parent_id', '=', $parentId);
    }


} 