<?php
/**
 * basicfinder v3 api
 *
 * @copyright www.basicfinder.com
 * @author lihuixu@basicfinder.com
 * @version v1 201901209
 */

namespace basicfinder\BasicfinderV3Api;

class BasicfinderV3Api
{
    private $apiHost = 'http://v3.api.basicfinder.com';//测试环境为 http://devsaas.api.basicfinder.com
    private $appKey = null;
    private $appVersion = null;
    private $username = null;
    private $password = null;
    private $accessToken = null;
    private $platform = null;
    private $loginfuc = null;
    private $userId = null;

    /**
     * 初始化
     */
    public function init($appKey, $appVersion, $username, $password, $platform = '', $loginfuc = 'login', $apiHost = null)
    {
        $this->appKey = $appKey;
        $this->appVersion = $appVersion;
        $this->username = $username;
        $this->password = $password;
        $this->platform = $platform;
        $this->loginfuc = $loginfuc;
        if ($apiHost)
        {
            $this->apiHost = $apiHost;
        }
    }


    public function getAccessToken($refresh = false)
    {
        if(!$refresh && $this->accessToken)
        {
            return $this->format($this->accessToken);
        }
        $url = $this->apiHost . '/site/' . $this->loginfuc;
        $data = [
            'app_key' => $this->appKey,
            'app_version' => $this->appVersion,
            'username' => $this->username,
            'password' => $this->password,
            'platform' => $this->platform,
            'device_name' => 'Win32',
            'device_number' => '666'
        ];

        $response = $this->request($url, $data, 'post');

        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        if(empty($result['data']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        if(empty($result['data']['id']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        if(empty($result['data']['access_token']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        $this->accessToken = $result['data']['access_token'];
        $this->userId = $result['data']['id'];

        return $this->format($this->accessToken);
    }


    private function format($data = array(), $errno = '', $error = '')
    {
        return array('data' => $data, 'error' => $errno, 'message' => $error);
    }

    protected function request_with_accesstoken($url, $data = null, $method = 'get')
    {
        $loginResult = $this->getAccessToken();
        if($loginResult['error'])
        {
            return $this->format('', $loginResult['error'], $loginResult['message']);
        }

        if(is_array($data))
        {
            $data['access_token'] = $this->accessToken;
        } else
        {
            $url = $url . (strpos($url, '?') ? '&' : '?') . 'access_token=' . $this->accessToken;
        }
        $result = $this->request($url, $data, $method);
        return $result;
    }

    private function request($url, $params = array(), $requestMethod = 'GET', $headers = array())
    {
        $_logs = ['$url' => $url, '$params' => $params, '$requestMethod' => $requestMethod, '$headers' => $headers];

        $ci = curl_init();
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ci, CURLOPT_USERAGENT, '1001 Magazine v1');
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ci, CURLOPT_TIMEOUT, 5);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_ENCODING, "");
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_HEADER, FALSE);

        $requestMethod = strtoupper($requestMethod);
        switch ($requestMethod)
        {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                if($params)
                {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                } else
                {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, ''); // Don't know why: if not set,  413 Request Entity Too Large
                }
                break;
            case 'DELETE':
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if($params)
                {
                    $url = "{$url}?{$params}";
                }
                break;
            case 'GET':
                if($params)
                {
                    $sep = false === strpos($url, '?') ? '?' : '&';
                    $url .= $sep . http_build_query($params);
                }
                break;
            case 'PUT':
                if($params)
                {
                    curl_setopt($ci, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
                break;
        }
        //$headers[] = "APIWWW: " . $_SERVER['REMOTE_ADDR'];
        curl_setopt($ci, CURLOPT_URL, $url);
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE);

        $response = curl_exec($ci);
        $httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        $httpTime = curl_getinfo($ci, CURLINFO_TOTAL_TIME);
        curl_close($ci);

        if($response && json_decode($response))
        {
            $response = json_decode($response, true);
        }

        $return = array(
            'time' => $httpTime,
            'error' => $httpCode == 200 ? 0 : $httpCode,
            'data' => $response,
            'message' => ''
        );
        //$httpInfo = curl_getinfo($ci);
        $_logs['$httpCode'] = $httpCode;
        return $return;
    }
    
    
    public function createProject()
    {
        
    }
    
    public function createDataManage()
    {
        
    }
    
    public function uploadFile($filepath)
    {
        $url = $this->apiHost . '/site/upload-private-file';
        
        $params = [];
        $params['file'] = $filepath;
        
        $response = $this->request_with_accesstoken($url, $params, 'post');
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        return $this->format($result['data']);
    }

    
    /**
     * 获取用户任务列表
     * $page 页数
     * $limit 每页条数
     * $arr 筛选条件：
     *      project_id 项目id
     *      keyword 关键字(模糊搜索 字段 id name project_id batch_id)
     *      timeField 查询时间的字段 ('start_time 任务开始时间','end_time 任务结束时间','created_at 创建时间','updated_at 更新时间')
     *      stime 开始时间
     *      etime 结束时间
     *      category_id 项目分类
     *      category_file_type 分类文件类型
     *      team_id 团队ID
     *      crowdsourcing_id 众包ID
     *
     */
    public function getTasks($data = array(), $page = 1, $limit = 10)
    {
        $data['page'] = (int)$page;
        $data['limit'] = (int)$limit;
        $url = $this->apiHost . '/task/tasks';
        $response = $this->request_with_accesstoken($url, $data, 'post');
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        return $this->format($result['data']);
    }

    /**
     * 获取任务作业信息
     * $page 页数
     * $limit 每页条数
     * $arr 筛选条件：
     *      task_id 任务id
     *      keyword 关键字(模糊搜索 字段 id name )
     *      user_id 用户id
     *      op 作业状态(0待领取 1已领取  2执行中 3已提交 4已完成 5已失效 6驳回作业 7疑难作业 8返工  其他则返回非5的作业)
     *
     */
    public function getWorkList($data = array(), $page = 1, $limit = 10)
    {
        $data['page'] = (int)$page;
        $data['limit'] = (int)$limit;
        $url = $this->apiHost . '/work/list';

        $response = $this->request_with_accesstoken($url, $data, 'post');
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }

        return $this->format($result['data']);
    }


    /**
     * 获取团队绩效数据
     * $page 页数
     * $limit 每页条数
     *
     */
    public function getStatTeam($data = array(), $page = 1, $limit = 10)
    {
        $data['page'] = (int)$page;
        $data['limit'] = (int)$limit;
        $url = $this->apiHost . '/stat/team';

        $response = $this->request_with_accesstoken($url, $data, 'post');
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }

        return $this->format($result['data']);
    }



    /**
     * 获取个人绩效
     * $page 页数
     * $limit 每页条数
     *
     */
    public function getStatUser($data = array(), $page = 1, $limit = 10)
    {
        $data['page'] = (int)$page;
        $data['limit'] = (int)$limit;
        $url = $this->apiHost . '/stat/user';
        $data['user_id'] = empty($data['user_id']) ? $this->userId : $data['user_id'];

        $response = $this->request_with_accesstoken($url, $data, 'post');
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }

        return $this->format($result['data']);
    }

    /**
     * 获取租户下的用户消息
     *
     */
    public function getMessageList($data = array(), $page = 1, $limit = 10)
    {
        $data['page'] = (int)$page;
        $data['limit'] = (int)$limit;
        $url = $this->apiHost . '/message/list';
        if(empty($data['start_time']) || empty($data['end_time']))
        {
            return $this->format('', 'error', 'start_date or end_date not found');
        }
        if(($data['end_time'] - $data['start_time']) > (24 * 3600 * 30))
        {
            return $this->format('', 'error', 'Time interval is not greater than 30 days');
        }

        $oldStartTime = $data['start_time'];
        $oldEndTime = $data['end_time'];

        $start_date = date('ym', $data['start_time']);
        $end_date = date('ym', $data['end_time']);
        if($start_date != $end_date)
        {
            return $this->format('', 'error', 'Time interval is not greater than 30 days');
        }
        
        $data['date'] = $start_date;
        $response = $this->request_with_accesstoken($url, $data, 'post');
        if(!empty($response['data']['data']['list']))
        {
            foreach ($response['data']['data']['list'] as $k => $v)
            {
                if($v)
                {
                    $response['data']['data']['list'][$k]['date'] = $start_date;
                }
            }
        }
        
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], $response['message']);
        }
        $result = $response['data'];
        if(!empty($result['error']))
        {
            return $this->format('', $result['error'], $result['message']);
        }
        return $this->format($result['data']);
    }
    
    
    
    public function getUser($userId)
    {
        $url = rtrim($this->apiHost, '/').'/user/detail';
        $data = [];
        $data['user_id'] = $userId;
        $_logs['$data'] = $data;
        
        $response = $this->request_with_accesstoken($url, $data, 'post');
        $_logs['$response'] = $response;
        if(!empty($response['error']))
        {
            return $this->format('', $response['error'], 'request fail');
        }
        
        $responseData = $response['data'];
        if(!empty($responseData['error']))
        {
            return $this->format('', $responseData['error'], $responseData['message']);
        }
        
        return $responseData['data'];
    }
    
}