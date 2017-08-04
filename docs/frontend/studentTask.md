### API列表

* [学生作业属性](#property)
* [学生作业](#search)

-------------------------
<a name="property"></a>

#### 作业属性

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| task_id | 作业id | - |
| user_id | 学生id | - |
| student_answer | 学生回答 | - |
| teacher_assess | 教师评价 | - |
| score | 评分 | - |
| type | 0：作业未提交；50：提交；100：老师批改 | - |

-------------------------
<a name="search"></a>
#### 查看学生作业
<pre>
POST /student-task/search
</pre>
##### 请求参数

| 属性名称 | 必填 | 说明 | 备注 |
|:---:|:---:|:---:|:---:|
| user_id |是 | 学生id | - |
| task_id | 否 | 作业id | - |
| expand | 否 | task信息 | - | 

-------------------------
