### API列表

* [教师课程属性](#property)
* [获取课程列表](#index)
* [添加课程](#create)

-------------------------
<a name="property"></a>

#### 课程属性

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| user_id | 教师id | - |
| class_id | 班级id | - |
| course_id | 课程id | - |

-------------------------
<a name="index"></a>
#### 获取课程列表
<pre>
GET /teacher-course/index?expand=user,class,course
</pre>

-------------------------
<a name="create"></a>
#### 添加课程
<pre>
POST /teacher-course/create
</pre>
##### 请求参数

| 属性名称 | 必填 | 说明 | 备注 |
|:---:|:---:|:---:|:---:|
| user_id | 是 | 教师id | - |
| class_id | 是 | 班级id | - |
| course_id |是 | 课程id | - |

-------------------------
