### API列表

* [班级属性](#property)
* [添加班级](#create)

-------------------------
<a name="property"></a>
#### 班级属性

| 属性名称 | 说明 | 备注 |
|:---:|:---:|:---:|
| name | 班级名称 | - |
| specialty_id | 专业id | - |
| class_teacher | 班主任的userId | - |

-------------------------

<a name="create"></a>
#### 添加班级
<pre>
POST /classes
</pre>
##### 请求参数

| 属性名称 | 必填 | 说明 | 备注 |
|:---:|:---:|:---:|:---:|
| name | 是 | 班级名称 | - |
| specialty_id | 是 | 专业id | - |
| class_teacher | 是 | 班主任的userId | - |

-------------------------
