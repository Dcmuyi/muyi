### API列表

* [学生列表](#student)
* [学生课程](#course)

-------------------------
<a name="student"></a>
#### 学生列表
<pre>
GET /student/student
</pre>
##### 请求参数

| 属性名称 | 必填 | 说明 | 备注 |
|:---:|:---:|:---:|:---:|
| class_id | 否 | 班级id | - |
| keyword | 否 | 关键词 | 手机、学号、邮箱、姓名都可以搜索 |

-------------------------
<a name="course"></a>
#### 学生课程
<pre>
GET /student/course
</pre>
##### 返回参数

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| teacher_name | 教师姓名 | - |
| credit | 学分 | - |
| course_name | 课别 | - |
| course_id | 课别id | - |
| type | 类型 | 0：作业未提交；50：提交；100：老师批改 |

-------------------------

