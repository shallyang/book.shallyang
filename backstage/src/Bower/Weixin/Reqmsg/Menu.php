<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/20
 * Time: 16:03
 */
namespace Bower\Weixin\Reqmsg;

class Menu
{
    const TYPE_CLICK = 'click';
    const TYPE_VIEW = 'view';
    const TYPE_SCAN_PUSH = 'scancode_push';
    const TYPE_SCAN_WAIT = 'scancode_waitmsg';
    const TYPE_PHOTO = 'pic_sysphoto';
    const TYPE_PHOTO_OR_ALBUM = 'pic_photo_or_album';
    const TYPE_PHOTO_WEIXIN = 'pic_weixin';
    const TYPE_LOCATION = 'location_select';

    public $menu;

    public function __construct($name, $key, $type = Menu::TYPE_CLICK, array $subMenuArray = [])
    {
        $subMenu = [];
        foreach ($subMenuArray as $menuItem) {
            if ($menuItem instanceof Menu) {
                $subMenu[] = $menuItem->menu;
            } else {
                throw new \Exception('param $subMenuArray should be array of Menu object');
            }
        }
        $this->menu = new \stdClass();
        if ($subMenu) {
            $this->menu->name = $name;
            $this->menu->sub_button = $subMenu;
        } else {
            $this->menu->name = $name;
            $type == self::TYPE_VIEW ? $this->menu->url = $key : $this->menu->key = $key;
            $this->menu->type = $type;
            $this->menu->sub_button = [];
        }
    }
}