### API列表

* [教师课程属性](#property)
* [教师课程](#course)
* [教师班级](#class)

-------------------------
<a name="property"></a>

#### 课程属性

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| user_id | 教师id | - |
| class_id | 班级id | - |
| course_id | 课程id | - |

-------------------------
<a name="course"></a>
#### 教师课程
<pre>
GET /teacher/course
</pre>
##### 返回参数

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| credit | 学分 | - |
| course_name  | 课程名称 | - |
| course_id | 课程id | - |
| class | 班级 | - |
| class_id | 班级id | - |
| class_name | 班级名称 | - |

-------------------------
<a name="class"></a>
#### 教师班级
<pre>
GET /teacher/class
</pre>
##### 返回参数

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| class_name | 班级名称 | - |
| specialty_name | 专业名称 | - |
| course_id | 课程id | - |
| course | 专业 | - |
| course_id | 课程id | - |
| course_name | 课程名称 | - |

-------------------------