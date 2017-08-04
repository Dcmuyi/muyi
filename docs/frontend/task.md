### API列表

* [作业属性](#property)
* [添加作业](#create)

-------------------------
<a name="property"></a>

#### 作业属性

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| user_id | 教师id | - |
| class_id | 班级id | - |
| course_id | 课程id | - |
| title | 标题 | - |
| explain | 描述 | - |
| all_count | 总共 | - |
| not_submit_count | 未提交 | - |
| submit_count | 已提交 | - |
| approve_count | 已审批 | - |

-------------------------
<a name="create"></a>
#### 添加作业
<pre>
POST /task
</pre>
##### 请求参数

| 属性名称 | 必填 | 说明 | 备注 |
|:---:|:---:|:---:|:---:|
| user_id |是 | 教师id | - |
| class_id | 是 | 班级id | - |
| course_id | 是 | 课程id | - |
| title | 是 | 标题 | - |
| explain | 是 | 描述 | - |

-------------------------
