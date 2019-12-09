# saas-api
 
##例子

``` php
$saas  = new BaiscfinderV3Api();
$saas->init($app_key, $app_version, $username, $password , $platform , $loginfuc, $apiHost);
```

###获取用户任务列表

```php
$res = $saas->getTasks($param, $page, $limit);
```
$page   默认 1    
$limit  默认 10

$param  参数说明

| 字段      | 是否必须| 说明   |
| ------- | ------ | ---- |
| keyword | N | (模糊搜索 字段 id name project_id batch_id)   |
| timeField    | N  | 查询时间的字段 ('start_time 任务开始时间','end_time 任务结束时间','created_at 创建时间','updated_at 更新时间')   |
| stime    | N  | 开始时间   |
| etime    | N  | 结束时间   |
| category_id    | N  | 项目分类   |
| category_file_type    | N  | 分类文件类型   |
| team_id    | N  | 团队ID   |
| crowdsourcing_id    | N  | 众包ID |
| status    | N  | 0:正常 1:已完成 2:暂停 5:已删除  默认全部 |
 

返回  
```php
Array
(
    [data] => Array
        (
            [category_id] => 0
            [categories] => Array
                (
                    [11] => 图片标注
                )
            [list] => Array
                (
                    [1] => Array
                        (
                            [id] => 6296
                            [site_id] => 17
                            [project_id] => 11819
                            [batch_id] => 2787
                            [step_group_id] => 65
                            [step_id] => 5251
                            [type] => 0
                            [platform_type] => 0
                            [platform_id] => 1288
                            [status] => 0
                            [sort] => 0
                            [name] => 图片标注(433) - 3images.zip - 
                            [amount] => 0
                            [user_count] => 0
                            [description] => 
                            [start_time] => 1555900141
                            [end_time] => 1558492141
                            [receive_count] => 5
                            [receive_expire] => 3600
                            [max_times] => 0
                            [unit_price] => 0.00
                            [unit_price_type] => 0
                            [created_at] => 1555984968
                            [updated_at] => 1555992572
                            [project] => Array
                                (
                                    [id] => 11819
                                    [category_id] => 11
                                    [template_id] => 0
                                    [name] => 图片标注(433)
                                    [user_id] => 14015
                                    [category] => Array
                                        (
                                            [id] => 11
                                            [type] => 0
                                            [status] => 0
                                            [file_type] => 0
                                            [view] => image_label
                                            [draw_type] => 
                                            [file_extensions] => jpg,jpeg,png,bmp
                                            [upload_file_extensions] => xls,xlsx,csv,zip
                                            [icon] => /images/category/icon-small/image-labelling.png
                                            [thumbnail] => /images/category/icon-big/image-labelling.png
                                            [video_as_frame] => 1
                                            [desc] => Array
                                                (
                                                    [id] => 61
                                                    [category_id] => 11
                                                    [language] => zh-CN
                                                    [name] => 图片标注
                                                    [keywords] => 图片，矩形框
                                                    [description] => 在图片中将规定的品类用矩形框标出
                                                    [instruction_url] => /images/category/preview/rzbk.png
                                                    [template_id] => 329
                                                )

                                        )

                                )

                            [batch] => Array
                                (
                                    [id] => 2787
                                    [project_id] => 11819
                                    [name] => 3images.zip
                                    [path] => 14015/11819/3images.zip/
                                    [amount] => 3
                                    [status] => 1
                                    [sort] => 1
                                    [created_at] => 1555900164
                                    [updated_at] => 1555900202
                                )

                            [step] => Array
                                (
                                    [id] => 5251
                                    [name] => 
                                    [project_id] => 11819
                                    [step_group_id] => 65
                                    [type] => 1
                                    [status] => 1
                                    [sort] => 0
                                    [category_id] => 0
                                    [template_id] => 0
                                    [description] => 
                                    [condition] => 
                                    [is_load_result] => 0
                                    [ai_model_id] => 0
                                    [created_at] => 1555984968
                                    [updated_at] => 1555992571
                                )

                            [stat] => Array
                                (
                                    [id] => 2467
                                    [project_id] => 11819
                                    [batch_id] => 2787
                                    [step_id] => 5251
                                    [task_id] => 6332
                                    [amount] => 11
                                    [work_time] => 0
                                    [work_count] => 5
                                    [submit_count] => 10
                                    [label_count] => 0
                                    [point_count] => 0
                                    [line_count] => 0
                                    [rect_count] => 0
                                    [sharepoint_count] => 0
                                    [polygon_count] => 0
                                    [other_count] => 0
                                    [label_time] => 0
                                    [timeout_count] => 0
                                    [allow_count] => 2
                                    [refuse_count] => 3
                                    [refuse_revised_count] => 0
                                    [refuse_receive_count] => 0
                                    [reset_count] => 0
                                    [allowed_count] => 0
                                    [refused_count] => 0
                                    [reseted_count] => 0
                                    [other_operated_count] => 0
                                    [refused_revise_count] => 0
                                    [difficult_count] => 0
                                    [difficult_revise_count] => 0
                                    [created_at] => 0
                                    [updated_at] => 0
                                )

                            [team] => Array
                                (
                                    [id] => 1288
                                    [name] => 荟萃官方.20190416141111
                                )

                            [crowdsourcing] => 
                            [aimodel] => 
                            [audit_rate] => 266%
                            [pass_rate] => 25%
                            [refused_revise] => 0
                            [difficult_revise] => 0
                            [refuse_revised] => 0
                        )
                )
            [count] => 1
            [step_types] => Array
                (
                    [0] => 执行
                    [1] => 审核
                )

            [statuses] => Array
                (
                    [0] => 正常
                    [1] => 已完成
                    [2] => 暂停
                    [5] => 已删除
                )

            [category_file_types] => Array
                (
                    [0] => 图片类
                    [1] => 语音类
                    [2] => 文本类
                    [3] => 视频类
                    [4] => 3D类
                )
        )
    [error] => 0
    [message] => 
)

```
返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| categories | array  | 所有的分类 |
| count | int  | 总记录数 |
| list.item.name | string |任务名称 |
| list.item.platform_id | int |团队ID |
| list.item.status | int |任务状态 |
| list.item.start_time | int |任务开始时间 |
| list.item.end_time | int |任务结束时间 |
| list.item.project | array| 项目信息 |
| list.item.batch | array | 批次信息 |
| list.item.team | array |团队信息 |
| list.item.stat | array |统计信息 |
| list.item.stat.work_count | array | 已执行张数(对应页面作业量第一个数) |
| list.item.stat.amount | array | 可执行张数(对应页面作业量第二个数)  |
| list.item.batch.amount | array | 批次作业总量(对应页面作业量第三个数)  |
| list.item.stat.submit_count | int |提交数 |
| list.item.stat.allow_count | int |审核通过数 |
| list.item.stat.refuse_count | int |审核驳回数 |
| statuses | array |任务状态类型 |
| step_types | array |任务步骤类型 |

###获取任务作业信息
```php
$res = $saas->getWorks($param, $page, $limit);
```
$page   默认 1    
$limit  默认 10

$param  参数说明

| 字段      | 是否必须| 说明   |
| ------- | ------ | ---- |
| task_id   | Y | 任务ID |
| user_id   | Y | 用户ID |
| keyword | N | (模糊搜索 字段 id:作业ID   name:作业名称 )   |
| timeField    | N  | 查询时间的字段 ('start_time 任务开始时间','end_time 任务结束时间','created_at 创建时间','updated_at 更新时间')   |
| stime    | N  | 开始时间   |
| etime    | N  | 结束时间   |
| op    | N  | 作业状态(0:待领取 1:已领取&执行中 2:已提交 3:已完成 4:已失效 6:驳回作业 7:疑难作业 8:返工作业, 被驳回再提交的 其他&空:非失效的)   |
| type    | N  | 作业分类   |
| multi_status | N  | 多种作业类型(多个逗号隔开,当op是有效值时失效 注意状态和op有些区别 0:待领取 1:已领取 2:执行中 3:已提交 4:已完成 5:已失效 6:驳回作业 7:疑难作业 8:返工作业, 被驳回再提交的)|


返回
```php
Array
(
    [data] => Array
        (
            [count] => 7
            [list] => Array
                (
                    [0] => Array
                        (
                            [id] => 260
                            [project_id] => 11819
                            [batch_id] => 2787
                            [step_id] => 5251
                            [task_id] => 0
                            [data_id] => 182
                            [status] => 0
                            [type] => 7
                            [user_id] => 14369
                            [start_time] => 0
                            [end_time] => 0
                            [delay_times] => 0
                            [delay_time] => 0
                            [is_effective] => 0
                            [is_refused] => 0
                            [label_count] => 0
                            [point_count] => 0
                            [line_count] => 0
                            [rect_count] => 0
                            [polygon_count] => 0
                            [sharepoint_count] => 0
                            [other_count] => 0
                            [label_time] => 0
                            [correct_rate] => 0
                            [is_correct] => 0
                            [created_at] => 1556018461
                            [updated_at] => 1556018461
                            [workResult] => 
                            [data] => Array
                                (
                                    [id] => 182
                                    [name] => 3images/7.jpg
                                    [sort] => 1
                                )

                            [dataResult] => Array
                                (
                                    [id] => 182
                                    [site_id] => 0
                                    [project_id] => 11819
                                    [batch_id] => 2787
                                    [data_id] => 182
                                    [data] => {"image_url":"14015\/11819\/3images.zip\/3images\/7.jpg"}
                                    [result] => 
                                    [ai_result] => 
                                    [ai_time] => 0
                                )

                            [user] => Array
                                (
                                    [id] => 14369
                                    [email] => 
                                    [nickname] => uptou
                                )

                        )
                )

            [statuses] => Array
                (
                    [0] => 待领取
                    [1] => 领取
                    [2] => 执行中
                    [3] => 已提交
                    [4] => 已完成
                    [5] => 已失效
                    [6] => 驳回作业
                    [8] => 被驳回修正
                    [7] => 疑难作业
                )

            [types] => Array
                (
                    [11] => 驳回
                    [12] => 重置
                    [18] => 忽略
                    [7] => 超时
                    [14] => 被驳回
                    [15] => 被重置
                    [19] => 被忽略
                    [41] => 父工序修改
                    [50] => 被管理员驳回
                    [51] => 被管理员重置
                    [53] => 父工序重置
                    [21] => 驳回作业重置
                    [23] => 返工作业重置
                    [9] => 挂起
                    [6] => 放弃
                    [60] => 疑难作业重做
                    [61] => 疑难作业重置
                )

            [users] => Array
                (
                    [0] => Array
                        (
                            [id] => 14369
                            [email] => 
                            [nickname] => uptou
                        )

                )

            [time] => 1556191164
        )

    [error] => 0
    [message] => 
)

```

返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| statuses | array  | 状态种类 |
| types | array  | 类型种类 |
| list.item.project_id | int |项目ID |
| list.item.task_id | int |任务ID |
| list.item.data_id | int |作业ID |
| list.item.status | int |作业状态 |
| list.item.type | int |作业状态类型 |
| list.item.start_time | int |工人开工时间|
| list.item.end_time | int |工人结束时间|
| list.item.data | array |作业信息 |
| list.item.dataResult | array |作业结果信息 |
| list.item.user | array | 用户信息 |


### 获取团队绩效数据

```php
$res = $saas->getStatTeam($param, $page, $limit);
```
$page   默认 1    
$limit  默认 10

$param  空   默认返回当前团队每天数据


```php
    Array
    (
        [data] => Array
            (
                [count] => 2
                [list] => Array
                    (
                        [0] => Array
                            (
                                [date] => 2019-04-05
                                [work_time] => 20
                                [work_count] => 2
                                [submit_count] => 3
                                [label_count] => 1
                                [point_count] => 3
                                [line_count] => 4
                                [rect_count] => 5
                                [polygon_count] => 1
                                [other_count] => 2
                                [allowed_count] => 0
                                [refused_count] => 4
                                [reseted_count] => 2
                            )
    
                        [1] => Array
                            (
                                [date] => 2019-04-04
                                [work_time] => 381
                                [work_count] => 2
                                [submit_count] => 3
                                [label_count] => 2
                                [point_count] => 3
                                [line_count] => 4
                                [rect_count] => 5
                                [polygon_count] => 1
                                [other_count] => 3
                                [allowed_count] => 1
                                [refused_count] => 8
                                [reseted_count] => 1
                            )
    
                    )
    
            )
    
        [error] => 0
        [message] => 
    )
```
返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| list.item.date | string | 日期 |
| list.item.work_time | int | 时长(单位：s，累计工时) |
| list.item.work_count | int | 作业数(张数) |
| list.item.submit_count | int | 提交张数(总提交张数) |
| list.item.label_count | int | 框数(标注数),可能为负 |
| list.item.point_count | int | 点数;可能为负;除共享点|
| list.item.line_count | int | 修改框数,可能为负 |
| list.item.rect_count | int | 修改点数;可能为负;除共享点 |
| list.item.polygon_count | int |  |
| list.item.other_count | int |  |
| list.item.allowed_count | int | 审核通过数 |
| list.item.refused_count | int | 审核驳回数 |
| list.item.reseted_count | int | 审核重置数 |


### 获取某一天团队成员绩效数据

```php
$res = $saas->getTeamByDay($param, $page, $limit);
```
$page   默认 1    
$limit  默认 10

$param  参数说明

| 字段      | 是否必须| 说明   |
| ------- | ------ | ---- |
| keyword | N | (模糊搜索 字段 task_id)|
| date | Y | 日期 格式(YYYY-MM-DD)|

返回
```php
    Array
    (
        [data] => Array
            (
                [count] => 1
                [list] => Array
                    (
                        [0] => Array
                            (
                                [id] => 3270
                                [project_id] => 10900
                                [batch_id] => 2076
                                [step_id] => 3244
                                [task_id] => 4082
                                [user_id] => 14390
                                [date] => 2019-04-05
                                [work_time] => 20
                                [work_count] => 2
                                [submit_count] => 3
                                [join_count] => 2
                                [label_count] => 1
                                [point_count] => 3
                                [line_count] => 4
                                [rect_count] => 5
                                [polygon_count] => 1
                                [sharepoint_count] => 1
                                [other_count] => 2
                                [label_time] => 1
                                [timeout_count] => 2
                                [allow_count] => 1
                                [refuse_count] => 2
                                [refuse_revised_count] => 2
                                [refuse_receive_count] => 3
                                [reset_count] => 1
                                [allowed_count] => 0
                                [refused_count] => 4
                                [reseted_count] => 2
                                [other_operated_count] => 1
                                [refused_revise_count] => 12
                                [difficult_count] => 1
                                [difficult_revise_count] => 1
                                [created_at] => 1546570328
                                [updated_at] => 1546601688
                                [task] => Array
                                    (
                                        [id] => 4082
                                        [name] => 图片标注(167) - 3张图1.zip - 审核
                                    )
    
                                [user] => Array
                                    (
                                        [id] => 14390
                                        [nickname] => 振杰
                                        [email] => 
                                    )
    
                            )
    
                    )
    
            )
    
        [error] => 0
        [message] => 
    )
```
返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| count | array  | 条数 |
| list.item.project_id | int |项目ID |
| list.item.task_id | int |任务ID |
| list.item.data_id | int |作业ID |
| list.item.user_id | int | 用户ID |
| list.item.task | array | 作业信息 |
| list.item.user | array | 用户信息 |
| list.item.submit_count | int | 提交张数 |
| list.item.label_count | int | 框数,可能为负 |
| list.item.point_count | int | 点数;可能为负;除共享点|
| list.item.line_count | int | 修改框数,可能为负 |
| list.item.rect_count | int | 修改点数;可能为负;除共享点 |
| list.item.polygon_count | int |  |
| list.item.other_count | int |  |
| list.item.allowed_count | int | 审核通过数 |
| list.item.refused_count | int | 审核驳回数 |
| list.item.reseted_count | int | 审核重置数 |


### 获取个人绩效
```php
$res = $saas->getStatUser($param, $page, $limit);
```
$page   默认 1    
$limit  默认 10

$param  参数说明

| 字段      | 是否必须| 说明   |
| ------- | ------ | ---- |
| keyword | N | (模糊搜索 字段 like(project_id,batch_id,step_id,task_id,user_id)|
| stepId | N | 分布ID |
| taskId | N | 任务ID |
| userId | N | 用户ID |

返回
```php
Array
(
    [data] => Array
        (
            [count] => 1
            [list] => Array
                (
                    [0] => Array
                        (
                            [id] => 3075
                            [project_id] => 11819
                            [batch_id] => 2787
                            [step_id] => 5251
                            [task_id] => 6296
                            [user_id] => 14369
                            [work_time] => 0
                            [work_count] => 0
                            [submit_count] => 0
                            [join_count] => 0
                            [label_count] => 0
                            [point_count] => 0
                            [line_count] => 0
                            [rect_count] => 0
                            [polygon_count] => 0
                            [sharepoint_count] => 0
                            [other_count] => 0
                            [label_time] => 0
                            [timeout_count] => 1
                            [allow_count] => 0
                            [refuse_count] => 0
                            [refuse_revised_count] => 0
                            [refuse_receive_count] => 0
                            [reset_count] => 0
                            [allowed_count] => 0
                            [refused_count] => 0
                            [reseted_count] => 0
                            [other_operated_count] => 0
                            [refused_revise_count] => 0
                            [difficult_count] => 0
                            [difficult_revise_count] => 0
                            [created_at] => 1556442902
                            [updated_at] => 1556442902
                            [task] => Array
                                (
                                    [id] => 6296
                                    [name] => 图片标注(433) - 3images.zip - 
                                    [status] => 0
                                )

                            [user] => Array
                                (
                                    [id] => 14369
                                    [nickname] => uptou
                                    [email] => 
                                    [roles] => Array
                                        (
                                            [0] => Array
                                                (
                                                    [item_name] => team_worker
                                                    [user_id] => 14369
                                                    [created_at] => 1555395071
                                                )

                                        )

                                )

                            [project] => Array
                                (
                                    [id] => 11819
                                    [name] => 图片标注(433)
                                    [amount] => 3
                                    [category_id] => 11
                                    [category] => Array
                                        (
                                            [id] => 11
                                            [type] => 0
                                            [status] => 0
                                            [file_type] => 0
                                            [view] => image_label
                                            [draw_type] => 
                                            [file_extensions] => jpg,jpeg,png,bmp
                                            [upload_file_extensions] => xls,xlsx,csv,zip
                                            [icon] => /images/category/icon-small/image-labelling.png
                                            [thumbnail] => /images/category/icon-big/image-labelling.png
                                            [video_as_frame] => 1
                                            [desc] => Array
                                                (
                                                    [id] => 61
                                                    [category_id] => 11
                                                    [language] => zh-CN
                                                    [name] => 图片标注
                                                    [keywords] => 图片，矩形框
                                                    [description] => 在图片中将规定的品类用矩形框标出
                                                    [instruction_url] => /images/category/preview/rzbk.png
                                                    [template_id] => 329
                                                )

                                        )

                                )

                            [team] => Array
                                (
                                    [id] => 1288
                                    [site_id] => 65
                                    [user_id] => 0
                                    [keywords] => huicuiguanfanghcgf.219416141111荟萃官方.20190416141111
                                    [name] => 荟萃官方.20190416141111
                                    [logo] => https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg
                                    [address] => 
                                    [phone] => 
                                    [mobile] => 
                                    [sort] => 0
                                    [type] => 1
                                    [status] => 1
                                    [open_payment] => 0
                                    [domain] => 
                                    [member_count] => 0
                                    [created_at] => 0
                                    [updated_at] => 0
                                )

                            [accuracy] => 0
                        )

                )

            [total] => Array
                (
                    [users] => 1
                    [work_time] => 0
                    [work_count] => 0
                    [submit_count] => 0
                    [label_count] => 0
                    [point_count] => 0
                    [line_count] => 0
                    [rect_count] => 0
                    [polygon_count] => 0
                    [other_count] => 0
                    [label_time] => 0
                    [timeout_count] => 1
                    [allowed_count] => 0
                    [refused_count] => 0
                    [reseted_count] => 0
                    [other_operated_count] => 0
                )

        )

    [error] => 0
    [message] => 
)
```

返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| total | array  | 总计统计 |
| list | array  | 列表 |
| list.item.task | array | 任务信息 |
| list.item.user | array | 用户信息 |
| list.item.project | array | 项目信息 |
| list.item.team | array | 团队信息 |
| list.item.project_id | int |项目ID |
| list.item.task_id | int |任务ID |
| list.item.data_id | int |作业ID |
| list.item.status | int |作业状态 |
| list.item.type | int |作业状态类型 |
| list.item.start_time | int |工人开工时间|
| list.item.end_time | int |工人结束时间|
| list.item.data | array |作业信息 |
| list.item.dataResult | array |作业结果信息 |
| list.item.user | array | 用户信息 |
| list.item.work_time | int | 时长(单位：s，累计工时) |
| list.item.work_count | int | 作业数(张数) |
| list.item.submit_count | int | 提交张数(总提交张数) |
| list.item.label_count | int | 框数,可能为负 |
| list.item.point_count | int | 点数;可能为负;除共享点|
| list.item.line_count | int | 修改框数,可能为负 |
| list.item.rect_count | int | 修改点数;可能为负;除共享点 |
| list.item.polygon_count | int |  |
| list.item.other_count | int |  |
| list.item.allowed_count | int | 审核通过数 |
| list.item.refused_count | int | 审核驳回数 |
| list.item.reseted_count | int | 审核重置数 |


### 获取租户下用户的消息 或者 用户获取自己的消息
```php
$res = $saas->getMessageList($param, $page, $limit);
```
$page   默认 1    
$limit  默认 10

$param  参数说明

| 字段      | 是否必须| 说明   |
| ------- | ------ | ---- |
| start_time | Y | 开始时间 时间戳(精确到秒)|
| end_time | Y | 结束时间 时间戳(精确到秒)|
| type | N | 消息类型 0:服务消息,1:账户消息,2:项目消息,3:作业消息,4:活动消息,5:需要推送客户的(这个是需要的)|
| no_page_limit | N | 是否分页: 0 分页(默认),1不分页 |  
| date | N | 查询年月(格式yymm) |  

```php
返回：Array
(
    [data] => Array
        (
            [date] => 1905
            [list] => Array
                (
                    [0] => Array
                        (
                            [id] => 2487
                            [message_id] => 3098
                            [site_id] => 237
                            [user_id] => 14606
                            [type] => 3
                            [is_read] => 0
                            [status] => 0
                            [created_at] => 1559306882
                            [updated_at] => 0
                            [message] => Array
                                (
                                    [id] => 3098
                                    [read_count] => 0
                                    [content] => Array
                                        (
                                            [action] => mytask_detail
                                            [content] => 您的作业已超时, %s点击查看%s
                                            [params] => Array
                                                (
                                                    [project_id] => 12199
                                                    [task_id] => 6883
                                                    [data_id] => 23164
                                                    [type] => 4
                                                )

                                        )

                                    [link_word] => 
                                    [link_type] => 0
                                    [link_attribute] => 
                                )

                            [user] => Array
                                (
                                    [id] => 14606
                                    [nickname] => saalll
                                    [email] => saa@llll.com
                                    [avatar] => 
                                )

                            [date] => 1905
                        )

                    [1] => Array
                        (
                            [id] => 394
                            [message_id] => 511
                            [site_id] => 237
                            [user_id] => 14605
                            [type] => 3
                            [is_read] => 0
                            [status] => 0
                            [created_at] => 1559715768
                            [updated_at] => 0
                            [message] => Array
                                (
                                    [id] => 511
                                    [read_count] => 0
                                    [content] => Array
                                        (
                                            [action] => task_execute
                                            [content] => 您被添加到作业执行人员列表, %s点击执行任务%s
                                            [params] => Array
                                                (
                                                    [project_id] => 12302
                                                    [task_id] => 7056
                                                )

                                        )

                                    [link_word] => 
                                    [link_type] => 0
                                    [link_attribute] => 
                                )

                            [user] => Array
                                (
                                    [id] => 14605
                                    [nickname] => 9asworker
                                    [email] => 9asworker@9a.com
                                    [avatar] => 
                                )

                            [date] => 1906
                        )
                )

            [count] => 2
            [dates] => Array
                (
                    [0] => 1904
                    [1] => 1905
                    [2] => 1906
                )

            [types] => Array
                (
                    [0] => 服务消息
                    [1] => 账户消息
                    [2] => 项目消息
                    [3] => 作业消息
                    [4] => 活动消息
                )

        )

    [error] => 0
    [message] => 
)
```


返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| list | array  | 列表 |
| list.item.user_id | int | 用户id |
| list.item.type | int | 消息类型 |
| list.item.is_read | int | 是否已读 |
| list.item.status | int | 是否删除 |
| list.item.message | array | 消息信息 |
| list.item.message.content.content | string | 消息内容 |
| list.item.message.content.params | array | 相关参数 |
| list.item.message.content.params.project_id | int | 项目id |
| list.item.message.content.params.task_id | int | 任务id |
| list.item.message.content.params.data_id | int | 作业id |
| list.item.date| int | 消息年月 |
| count | int | 个数 |
| dates | array | 可用查询月份 |
| types | array | 消息类型（type=5不显示在这里） |


### 合并用户信息（昵称及头像团队）
```
$res = $saas->mergeUser($param);
```
$param  参数说明


| 字段      | 是否必须| 说明   |
| ---- | ----| ---- |
| appkey | Y | appkey：倍赛团队传beisaituandui，荟萃众包传huicuizhongbao |
| site_id | Y | 租户ID |
| user_id | Y | 用户id |
| nickname | N | 用户昵称|
| avatar | N | 头像路径|
| team_id | N | 团队ID |
| roles | N | 角色信息：作业员传team_worker，团长传team_manager|
| op | N | 操作标识：退团传team_quit|

APP端调用merge-user接口逻辑说明
一．登录APP
1）同步过
1.不传

2）没同步
1.有团队push    Push 用户所有信息+team_id

2.没团队不push

二．修改用户信息
1.有团队 push Push 用户所有信息+team_id
2.没团队不push

三．入团
Push 用户所有信息+team_id

四．退团
1)同步过
Push 用户所有信息+team_id

2)没同步
不push

```
{
  ["data"]=>
  Array([user_id] => 1)
  ["error"]=>
  int(0)
  ["message"]=>
  string(0) ""
}
```
返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| data | str  | 返回的数据 |
| error | str  | 错误代码 |
| message | str  | 错误提示 |

### 合并团队信息
```
$res = $saas->mergeTeam($param);
```
$param  参数说明


| 字段      | 是否必须| 说明   |
| ---- | ----| ---- |
| appkey | Y | appkey：倍赛团队传beisaituandui，荟萃众包传huicuizhongbao |
| site_id | Y | 租户ID |
| team_id | Y | 团队ID |
| name | N | 团队名称|
| phone | N | 联系电话|
| logo | N | 团队LOGO|
| status | N | 团队状态：未审核传0，审核通过传1，禁用传2，删除传3|


```
{
  ["data"]=>
  Array([team_id] => 1)
  ["error"]=>
  int(0)
  ["message"]=>
  string(0) ""
}
```
返回关键字段说明

| 字段 | 类型| 说明   |
| ------- | ------ | ---- |
| data | str  | 返回的数据 |
| error | str  | 错误代码 |
| message | str  | 错误提示 |