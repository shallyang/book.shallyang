<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/20
 */

namespace Bower\Weixin;

use Bower\Weixin\Reqmsg\Mpnews;
use Bower\Weixin\Reqmsg\Menu;
use Bower\Weixin\Reqmsg\News;

class Request
{
    //get autoreply rules
    const URL_AUTOREPLY = 'https://api.weixin.qq.com/cgi-bin/get_current_autoreply_info?access_token=ACCESS_TOKEN';

    public static function autoReply()
    {
        return self::fetch(Request::URL_AUTOREPLY);
    }

    //menu
    const URL_MENU_GET = 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=ACCESS_TOKEN';
    const URL_MENU_PUT = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN';
    const URL_MENU_DEL = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=ACCESS_TOKEN';

    public static function menuGet()
    {
        return self::fetch(Request::URL_MENU_GET);
    }

    public static function menuPut(Menu $menu1, Menu $menu2 = null, Menu $menu3 = null)
    {
        $menu = new \stdClass();
        $menu->button = [$menu1->menu];
        $menu2 and $menu->button[] = $menu2->menu;
        $menu3 and $menu->button[] = $menu3->menu;
        $menuJson = json_encode($menu, JSON_UNESCAPED_UNICODE);
        return self::fetch(Request::URL_MENU_PUT, $menuJson);
    }

    public static function menuDel()
    {
        return self::fetch(Request::URL_MENU_DEL);
    }

    //custom
    const URL_CUS_LIST = 'https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=ACCESS_TOKEN';
    const URL_CUS_ONLINE = 'https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist?access_token=ACCESS_TOKEN';
    const URL_CUS_ADD = 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token=ACCESS_TOKEN';
    const URL_CUS_INVITE = 'https://api.weixin.qq.com/customservice/kfaccount/inviteworker?access_token=ACCESS_TOKEN';
    const URL_CUS_UPDATE = 'https://api.weixin.qq.com/customservice/kfaccount/update?access_token=ACCESS_TOKEN';
    const URL_CUS_DEL = 'https://api.weixin.qq.com/customservice/kfaccount/del?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT';
    const URL_CUS_HIMG = 'https://api.weixin.qq.com/customservice/kfaccount/uploadheadimg?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT';
    const URL_CUS_SEND = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN';

    public static function customGetList()
    {
        return self::fetch(Request::URL_CUS_LIST);
    }

    public static function customGetOnline()
    {
        return self::fetch(Request::URL_CUS_ONLINE);
    }

    public static function customAdd($kfAccount, $nickname)
    {
        static $strCustom = '{"kf_account" : "%s@%s", "nickname" : "%s"}';
        return self::fetch(Request::URL_CUS_ADD,
            sprintf($strCustom, $kfAccount, config('Weixin')['wxname'], $nickname));
    }

    public static function customInvite($kfAccount, $wxname)
    {
        static $strCustom = '{"kf_account" : "%s@%s", "invite_wx" : "%s"}';
        return self::fetch(Request::URL_CUS_INVITE,
            sprintf($strCustom, $kfAccount, config('Weixin')['wxname'], $wxname));
    }

    public static function customUpdate($kfAccount, $nickname)
    {
        static $strCustom = '{"kf_account" : "%s@%s", "nickname" : "%s"}';
        return self::fetch(Request::URL_CUS_UPDATE,
            sprintf($strCustom, $kfAccount, config('Weixin')['wxname'], $nickname));
    }

    public static function customDel($kfAccount)
    {
        $url = str_replace('KFACCOUNT', sprintf("%s@%s", $kfAccount, config('Weixin')['wxname']), Request::URL_CUS_DEL);
        return self::fetch($url);
    }

    public static function cunstomHeadimg($kfAccount, $imgFile)
    {
        $url = str_replace('KFACCOUNT', sprintf("%s@%s", $kfAccount, config('Weixin')['wxname']),
            Request::URL_CUS_HIMG);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $ftype = finfo_file($finfo, __ROOT__ . $imgFile);
        finfo_close($finfo);
        $data = [
            'media' => "@" . __ROOT__ . $imgFile,
            'form-data' => [
                'filename' => $imgFile,
                'content-type' => $ftype,
                'filelength' => filesize(__ROOT__ . $imgFile)
            ]
        ];
        return self::fetch($url, $data);
    }


    public static function customSendText($toOpenid, $content, $kfAccount = '')
    {
        static $msg = '{"touser":"%s","msgtype":"text","text": {"content":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $content, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    public static function customSendImage($toOpenid, $mediaId, $kfAccount = '')
    {
        static $msg = '{"touser":"%s","msgtype":"image","image":{"media_id":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $mediaId, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    public static function customSendVoice($toOpenid, $mediaId, $kfAccount = '')
    {
        static $msg = '{"touser":"%s","msgtype":"voice","voice":{"media_id":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $mediaId, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    public static function customSendVideo($toOpenid, $mediaId, $thumbMediaId, $title, $description, $kfAccount = '')
    {
        static $msg = '{"touser":"%s","msgtype":"video","video":{"media_id":"%s","thumb_media_id":"%s","title":"%s","description":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $mediaId, $thumbMediaId, $title, $description, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    public static function customSendMusic(
        $toOpenid,
        $title,
        $description,
        $url,
        $hqUrl,
        $thumbMediaId,
        $kfAccount = ''
    ) {
        static $msg = '{"touser":"%s","msgtype":"music","music":{"title":"%s","description":"%s","musicurl":"%s","hqmusicurl":"%s","thumb_media_id":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $title, $description, $url, $hqUrl, $thumbMediaId, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);

    }

    public static function customSendNews($toOpenid, array $newsArray, $kfAccount)
    {
        static $msg = '{"touser":"%s","msgtype":"news","news":{"articles":[%s]}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $articles = [];
        foreach ($newsArray as $news) {
            if ($news instanceof News) {
                $articles[] = $news->news;
            } else {
                throw new \Exception('$news not instantof News');
            }
        }
        $articles = array_slice($articles, 0, 8);
        $artmsg = implode(',', $articles);
        $data = sprintf($msg, $toOpenid, $artmsg, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    public static function customSendMpnews($toOpenid, $mediaId, $kfAccount = '')
    {
        static $msg = '{"touser":"%s","msgtype":"mpnews","mpnews":{"media_id":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $mediaId, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    public static function customSendWxcard($toOpenid, $cardId, $kfAccount = '')
    {
        static $msg = '{"touser":"%s","msgtype":"wxcard","wxcard":{"card_id":"%s"}%s}';
        static $kfinfo = ',"customservice":{"kf_account": "%s@%s"}';
        $kf = $kfAccount ? sprintf($kfinfo, $kfAccount, config('Weixin')['wxname']) : '';
        $data = sprintf($msg, $toOpenid, $cardId, $kf);
        return self::fetch(Request::URL_CUS_SEND, $data);
    }

    //media management
    const URL_MEDIA_UPLOAD = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE';
    const URL_MATERIAL_UPLOAD = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=ACCESS_TOKEN&type=TYPE';
    const URL_MEDIA_UPLOAD_URL = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=ACCESS_TOKEN';
    const URL_MATERIAL_ADD_NEWS = 'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=ACCESS_TOKEN';
    const URL_MATERIAL_UPDATE_NEWS = 'https://api.weixin.qq.com/cgi-bin/material/update_news?access_token=ACCESS_TOKEN';
    const URL_MEDIA_DOWNLOAD = 'https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID';
    const URL_MATERIAL_DOWNLOAD = 'https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=ACCESS_TOKEN';
    const URL_MATERIAL_DEL = 'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=ACCESS_TOKEN';
    const URL_MEDIA_COUNT = 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=ACCESS_TOKEN';
    const URL_MEDIA_LIST = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN';


    const MEDIA_IMAGE = 'image';
    const MEDIA_VOICE = 'voice';
    const MEDIA_VIDEO = 'video';
    const MEDIA_THUMB = 'thumb';

    public static function mediaUpload($file, $type = Request::MEDIA_IMAGE, $isTmp = true)
    {
        $url = str_replace('TYPE', $type, $isTmp ? Request::URL_MEDIA_UPLOAD : Request::URL_MATERIAL_UPLOAD);
        $data['media'] = self::fetchCreateFile($file);
        return self::fetch($url, $data);
    }

    public static function mediaUploadNewsImage($file)
    {
        $data['media'] = self::fetchCreateFile($file);
        return self::fetch(Request::URL_MEDIA_UPLOAD_URL, $data);
    }

    public static function mediaUploadNews(array $MpnewsArray)
    {
        $msg = '{"articles":[%s]}';
        $newsItems = [];
        foreach ($MpnewsArray as $Mpnews) {
            if ($Mpnews instanceof Mpnews) {
                $newsItems[] = $Mpnews->news;
            } else {
                throw new \Exception('$Mpnews not instantof Mpnews');
            }
        }
        $newsItems = array_slice($newsItems, 0, 8);
        $newsMsg = implode(',', $newsItems);
        $data = sprintf($msg, $newsMsg);
        return self::fetch(Request::URL_MATERIAL_ADD_NEWS, $data);
    }

    public static function mediaUpdateNews($mediaId, Mpnews $Mpnews, $index = 0)
    {
        $data = "{\"media_id\":\"$mediaId\",\"index\":\"$index\",\"articles\":$Mpnews->news}";
        return self::fetch(Request::URL_MATERIAL_UPDATE_NEWS, $data);
    }

    public static function mediaDownload($mediaId, $isTmp = true, $saveFile = '')
    {
        if ($isTmp) {
            $url = str_replace('MEDIA_ID', $mediaId, Request::URL_MEDIA_DOWNLOAD);
            $data = '';
        } else {
            $url = Request::URL_MATERIAL_DOWNLOAD;
            $data = "{\"media_id\":\"$mediaId\"}";
        }
        $ret = self::fetch($url, $data, false);
        if (strpos($ret, '{') === 0) {
            return json_decode($ret);
        } elseif ($saveFile) {
            return file_put_contents($saveFile, $ret);
        } else {
            return $ret;
        }
    }

    public static function mediaDelete($mediaId)
    {
        $data = "{\"media_id\":\"$mediaId\"}";
        return self::fetch(Request::URL_MATERIAL_DEL, $data);
    }

    public static function mediaGetCount()
    {
        return self::fetch(Request::URL_MEDIA_COUNT);
    }

    public static function mediaGetList($type = Request::MEDIA_IMAGE, $start = 0, $limit = 10)
    {
        $data = "{\"type\":\"$type\",\"offset\":$start,\"count\":$limit}";
        return self::fetch(Request::URL_MEDIA_LIST, $data);
    }

    //send mass msg
    const URL_SEND_ALL = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=ACCESS_TOKEN';
    const URL_SEND_ALL_BY_OPENID = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=ACCESS_TOKEN';
    const URL_MPVIDEO_UPLOAD = 'https://file.api.weixin.qq.com/cgi-bin/media/uploadvideo?access_token=ACCESS_TOKEN';
    const URL_SEND_DELETE = 'https://api.weixin.qq.com/cgi-bin/message/mass/delete?access_token=ACCESS_TOKEN';
    const URL_SEND_PREVIEW = 'https://api.weixin.qq.com/cgi-bin/message/mass/preview?access_token=ACCESS_TOKEN';
    const URL_SEND_STATUS = 'https://api.weixin.qq.com/cgi-bin/message/mass/get?access_token=ACCESS_TOKEN';

    const SENDALL_TEXT = ['text', 'content'];
    const SENDALL_MPNEWS = ['mpnews', 'media_id'];
    const SENDALL_VOICE = ['voice', 'media_id'];
    const SENDALL_IMAGE = ['image', 'media_id'];
    const SENDALL_MPVIDEO = ['mpvideo', 'media_id'];
    const SENDALL_WXCARD = ['wxcard', 'card_id'];

    public static function mediaMpvideoUpload($mediaId, $title, $description)
    {
        $data = "{\"media_id\":\"$mediaId\",\"title\":\"$title\",\"description\":\"$description\"}";
        return self::fetch(Request::URL_MPVIDEO_UPLOAD, $data);
    }

    public static function mediaSendAll($type = Request::SENDALL_MPNEWS, $mediaId, $ignoreReprint = 0)
    {
        list($type, $tag) = $type;
        $data = "{\"filter\":{\"is_to_all\":true,\"tag_id\":0},\"$type\":{\"$tag\":\"$mediaId\"},\"msgtype\":\"$type\",\"send_ignore_reprint\":$ignoreReprint}";
        return self::fetch(Request::URL_SEND_ALL, $data);
    }

    public static function mediaSendAllByTagId($type = Request::SENDALL_MPNEWS, $mediaId, $tagId, $ignoreReprint = 0)
    {
        list($type, $tag) = $type;
        $data = "{\"filter\":{\"is_to_all\":false,\"tag_id\":\"$tagId\"},\"$type\":{\"$tag\":\"$mediaId\"},\"msgtype\":\"$type\",\"send_ignore_reprint\":$ignoreReprint}";
        return self::fetch(Request::URL_SEND_ALL, $data);
    }

    public static function mediaSendAllByOpenId(
        $type = Request::SENDALL_MPNEWS,
        $mediaId,
        array $openids,
        $ignoreReprint = 0
    ) {
        list($type, $tag) = $type;
        $openid = json_encode($openids);
        $data = "{\"touser\":$openid,\"$type\":{\"$tag\":\"$mediaId\"},\"msgtype\":\"$type\",\"send_ignore_reprint\":$ignoreReprint}";
        return self::fetch(Request::URL_SEND_ALL_BY_OPENID, $data);
    }

    public static function mediaSendDelete($msgId)
    {
        $data = "{\"msg_id\":$msgId}";
        return self::fetch(Request::URL_SEND_DELETE, $data);
    }

    public static function mediaSendPreview($type = Request::SENDALL_MPNEWS, $mediaId, $toUser = '', $wxName = '')
    {
        list($type, $tag) = $type;
        $data = "{\"touser\":\"$toUser\",\"towxname\":\"$wxName\",\"$type\":{\"$tag\":\"$mediaId\"},\"msgtype\":\"$type\"}";
        return self::fetch(Request::URL_SEND_PREVIEW, $data);
    }

    public static function mediaSendStatus($msgId)
    {
        $data = "{\"msg_id\":$msgId}";
        return self::fetch(Request::URL_SEND_STATUS, $data);
    }

    //user group
    const URL_TAGS_ADD = 'https://api.weixin.qq.com/cgi-bin/tags/create?access_token=ACCESS_TOKEN';
    const URL_TAGS_GET = 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token=ACCESS_TOKEN';
    const URL_TAGS_UPDATE = 'https://api.weixin.qq.com/cgi-bin/tags/update?access_token=ACCESS_TOKEN';
    const URL_TAGS_DELETE = 'https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=ACCESS_TOKEN';
    const URL_USER_GET = 'https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=ACCESS_TOKEN';
    const URL_USER_TAG = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=ACCESS_TOKEN';
    const URL_USER_UNTAG = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging?access_token=ACCESS_TOKEN';
    const URL_USER_GET_TAG = 'https://api.weixin.qq.com/cgi-bin/tags/getidlist?access_token=ACCESS_TOKEN';
    const URL_USER_REMARK = 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=ACCESS_TOKEN';
    const URL_USER_GET_INFO = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';
    const URL_USER_GET_INFO_ARRAY = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=ACCESS_TOKEN';
    const URL_USER_LIST = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&next_openid=NEXT_OPENID';
    const URL_USER_BLACKLIST = 'https://api.weixin.qq.com/cgi-bin/tags/members/getblacklist?access_token=ACCESS_TOKEN';
    const URL_USER_BLACKLIST_SET = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchblacklist?access_token=ACCESS_TOKEN';
    const URL_USER_BLACKLIST_UNSET = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchunblacklist?access_token=ACCESS_TOKEN';

    public static function userTagAdd($tagName)
    {
        $data = "{\"tag\":{\"name\":\"$tagName\"}}";
        return self::fetch(Request::URL_TAGS_ADD, $data);
    }

    public static function userTagList()
    {
        return self::fetch(Request::URL_TAGS_GET);
    }

    public static function userTagUpdate($tagId, $tagName)
    {
        $data = "{\"tag\":{\"id\":$tagId,\"name\":\"$tagName\"}}";
        return self::fetch(Request::URL_TAGS_UPDATE, $data);
    }

    public static function userTagDelete($tagId)
    {
        $data = "{\"tag\":{\"id\":\"$tagId\"}}";
        return self::fetch(Request::URL_TAGS_DELETE, $data);
    }

    public static function userTagUserList($tagId, $nextOpenid = '')
    {
        $data = "{\"tagid\":$tagId,\"next_openid\":\"$nextOpenid\"}";
        return self::fetch(Request::URL_USER_GET, $data);
    }

    public static function userSetTag(array $openids, $tagId)
    {
        $openid = json_encode($openids);
        $data = "{\"openid_list\":$openid,\"tagid\":$tagId}";
        return self::fetch(Request::URL_USER_TAG, $data);
    }

    public static function userSetUntag(array $openids, $tagId)
    {
        $openid = json_encode($openids);
        $data = "{\"openid_list\":$openid,\"tagid\":$tagId}";
        return self::fetch(Request::URL_USER_UNTAG, $data);
    }

    public static function userGetTag($openId)
    {
        $data = "{\"openid\":$openId}";
        return self::fetch(Request::URL_USER_GET_TAG, $data);
    }

    public static function userSetRemark($openid, $remark)
    {
        $data = "{\"openid\":\"$openid\",\"remark\":\"$remark\"}";
        return self::fetch(Request::URL_USER_REMARK, $data);
    }

    public static function userGetInfo($openid)
    {
        $url = str_replace('OPENID', $openid, Request::URL_USER_GET_INFO);
        return self::fetch($url);
    }

    public static function userGetInfoArray(array $openids)
    {
        $openids = array_map(function ($var) {
            return str_replace('OPENID', $var, '{"openid":"OPENID","lang":"zh-CN"}');
        }, $openids);
        $openid = implode(',', $openids);
        $data = "{\"user_list\":[$openid]}";
        return self::fetch(Request::URL_USER_GET_INFO_ARRAY, $data);
    }

    public static function userGetList($nextOpenid = '')
    {
        $url = str_replace('NEXT_OPENID', $nextOpenid, Request::URL_USER_LIST);
        return self::fetch($url);
    }

    public static function userGetBlackList($nextOpenid = '')
    {
        $data = "{\"begin_openid\":\"$nextOpenid\"}";
        return self::fetch(Request::URL_USER_BLACKLIST, $data);
    }

    public static function userSetBlackList(array $openids)
    {
        $openid = json_encode($openids);
        $data = "{\"opened_list\":$openid}";
        return self::fetch(Request::URL_USER_BLACKLIST_SET, $data);
    }

    public static function userUnsetBlackList(array $openids)
    {
        $openid = json_encode($openids);
        $data = "{\"opened_list\":$openid}";
        return self::fetch(Request::URL_USER_BLACKLIST_UNSET, $data);
    }

    //qrcode
    const URL_QRCODE_CREATE = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=ACCESS_TOKEN';
    const URL_QRCODE_GET = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=TICKET';

    public static function qrcodeCreate($qrVal, $expire = 3600 * 24 * 7)
    {
        if ($expire == 0 and !is_int($qrVal)) {
            return false;
        }
        if ($expire) {
            $data = "{\"expire_seconds\": $expire,\"action_name\": \"QR_SCENE\", \"action_info\": {\"scene\": {\"scene_id\": \"$qrVal\"}}}";
        } elseif (is_int($qrVal)) {
            $data = "{\"action_name\": \"QR_LIMIT_SCENE\", \"action_info\": {\"scene\": {\"scene_id\": \"$qrVal\"}}}";
        } else {
            $data = "{\"action_name\": \"QR_LIMIT_STR_SCENE\", \"action_info\": {\"scene\": {\"scene_str\": \"$qrVal\"}}}";
        }
        return self::fetch(Request::URL_QRCODE_CREATE, $data);
    }

    public static function qrcodeGet($ticket, $saveFile = '')
    {
        $url = str_replace('TICKET', $ticket, Request::URL_QRCODE_GET);
        $ret = self::fetch($url, [], false);
        if (strpos($ret, '{') === 0) {
            return json_decode($ret);
        } elseif ($saveFile) {
            return file_put_contents($saveFile, $ret);
        } else {
            return $ret;
        }
    }

    //short url
    const URL_SHORTURL = 'https://api.weixin.qq.com/cgi-bin/shorturl?access_token=ACCESS_TOKEN';

    public static function shorturl($url)
    {
        $data = "{\"action\":\"long2short\",\"long_url\":\"$url\"}";
        return self::fetch(Request::URL_SHORTURL, $data);
    }

    const WX_ERROR_STANDARD = 'wx_error:(%s) =>  %s';
    const WX_STR_ACCESSTOKEN = 'wx_accesstoken';

    //get accesstoken
    const URL_BASE_TOKEN = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET';

    protected static function getAccesstoken()
    {
        if (!isset($_SESSION[self::WX_STR_ACCESSTOKEN]['expires_in'])
            or
            $_SESSION[self::WX_STR_ACCESSTOKEN]['expires_in'] < $_SERVER['REQUEST_TIME']
        ) {
            $url = str_replace(['APPID', 'APPSECRET'], [config('Weixin')['appid'], config('Weixin')['appsecret']],
                Request::URL_BASE_TOKEN);
            $ret = self::fetch($url);
            if (isset($ret->access_token)) {
                $_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'] = $ret->access_token;
                $_SESSION[self::WX_STR_ACCESSTOKEN]['expires_in'] = $_SERVER['REQUEST_TIME'] + $ret->expires_in;
            } else {
                throw new \Exception(sprintf(Request::WX_ERROR_STANDARD, $ret->errcode, $ret->errmsg));
            }
        }
        return $_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'];
    }

    //base curl fetch
    protected static function fetch($url, $postData = '', $retDecode = true)
    {
        if (strpos($url, 'ACCESS_TOKEN')) {
            $accessToken = self::getAccesstoken();
            $url = str_replace('ACCESS_TOKEN', $accessToken, $url);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($postData) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        $ret = curl_exec($ch);
        curl_close($ch);
        return $retDecode ? json_decode($ret) : $ret;
    }

    protected static function fetchCreateFile($filename)
    {
        if (is_file($filename)) {
            $file = realpath($filename);
            $fbase = basename($file);
        } else {
            throw new \Exception('file not exist');
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $ftype = finfo_file($finfo, $file);
        finfo_close($finfo);
        if (function_exists('curl_file_create')) {
            return curl_file_create($file, $ftype, $fbase);
        } else {
            return "@$file;filename=$fbase;type=$ftype";
        }
    }
}