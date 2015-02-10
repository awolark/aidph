<?php  namespace Aidph\Helpers; 

trait AreaQueryHelperTrait {

    /* My Custom Queries */

    /* Get Area and Children */

    public static function getAreaAndChildren($area)
    {
        $result[] = $area;

        self::getAreaAndChildrenHelper($area->id, $result);

        return $result;
    }

    /**
     * @param $parent_id
     * @param $areas
     */
    public static function getAreaAndChildrenHelper($parent_id, &$areas)
    {
        $areasResult = static::where('parent_id', '=', $parent_id)->get();

        foreach ( $areasResult as $area ) {
            $areas[] = $area;

            self::getAreaAndChildrenHelper($area->id, $areas);
        }
    }


} 