# Hong-Zhiyi-qinyun-ThinkPHP

基于 ThinkPHP 5 / FastAdmin 的琴韵后台管理系统。项目在 FastAdmin 后台框架基础上扩展了乐器教师、乐器商品、预约、订单、评价和教师认证等业务模块，适合用于乐器教学/乐器商城/预约服务类小程序或 Web 后台的管理端。

## 技术栈

- 后端框架：ThinkPHP 5、FastAdmin
- PHP 版本：PHP >= 7.2
- 数据库：MySQL，默认配置数据库名为 `qinyunbs`
- 前端后台：Bootstrap、jQuery、Bootstrap Table、RequireJS、Layui、Font Awesome
- 依赖管理：Composer、Bower
- 许可证：Apache-2.0

## 功能模块

### 后台管理

- 管理员登录、权限、角色、菜单、操作日志
- 站点配置、附件管理、个人资料管理
- 用户、用户分组、用户规则管理
- CRUD 代码生成、菜单生成、插件管理、API 文档生成等 FastAdmin 命令能力

### 业务管理

- 教师管理：姓名、身份证、乐器种类、首页图、轮播图、介绍、教龄、地区、价格、学校、学历、电话、状态
- 乐器管理：店铺名、乐器种类、首页图、轮播图、详情图、库存、产地、价格、销量、标题、状态
- 预约管理：教师信息、学生姓名、用户 ID、地区、价格、学校、学历、是否上课、是否缴费、上课时间、支付时间、预约时间
- 订单管理：乐器商品、用户 ID、店铺名、购买数量、价格、标题、收货状态、评价状态、收货人、电话、地址、下单时间
- 评价管理：乐器 ID、用户 ID、标题、图片、用户昵称、头像、1-5 星评分、评价时间、评价内容、订单 ID
- 认证管理：姓名、头像、身份证、电话、学校、乐器种类、学历、身份证照片、认证状态、用户 ID、失败理由

### API 与前台

- `api` 模块提供基础接口、会员登录、注册、验证码登录、重置密码、个人资料修改、邮箱/手机号修改等 FastAdmin 标准会员接口
- `index` 模块提供前台首页和会员中心相关页面

## 目录结构

```text
.
|-- application/              # 应用代码
|   |-- admin/                # 后台模块
|   |   |-- controller/       # 后台控制器
|   |   |-- model/            # 后台模型
|   |   |-- view/             # 后台页面模板
|   |   |-- lang/zh-cn/       # 后台中文语言包
|   |   `-- command/          # 安装、CRUD、菜单、插件、API 文档等命令
|   |-- api/                  # API 模块
|   |-- common/               # 公共控制器、模型、类库
|   |-- index/                # 前台模块
|   |-- config.php            # 应用配置
|   |-- database.php          # 数据库配置
|   `-- route.php             # 路由配置
|-- public/                   # Web 访问目录
|   |-- index.php             # 前台入口
|   |-- ykumajJvYx.php        # 后台入口，绑定 admin 模块
|   |-- assets/               # FastAdmin 后台静态资源
|   |-- static/               # Layui 等静态资源
|   |-- uploads/              # 上传目录
|   `-- template/             # 模板目录
|-- addons/                   # 插件目录
|-- extend/                   # 扩展类库目录
|-- runtime/                  # 运行时缓存和日志目录
|-- composer.json             # PHP 依赖配置
|-- bower.json                # 前端依赖配置
|-- think                     # ThinkPHP 命令行入口
`-- LICENSE
```

## 环境要求

- PHP >= 7.2
- MySQL >= 5.7，推荐开启 `utf8mb4`
- Composer
- Web 服务器：Apache、Nginx 或 PHP 内置服务器
- PHP 扩展：`json`、`curl`、`pdo`、`bcmath`

## 安装与运行

### 1. 安装依赖

```bash
composer install
```

如需重新安装前端依赖：

```bash
bower install
```

### 2. 配置数据库

数据库配置位于：

```text
application/database.php
```

默认配置读取环境变量，未配置环境变量时使用以下默认值：

```text
database: qinyunbs
hostname: 127.0.0.1
username: root
prefix: wx_
charset: utf8mb4
```

建议在实际部署时通过环境变量或本地配置覆盖数据库账号、密码和表前缀，不要直接提交生产密码。

### 3. 初始化数据库

仓库内置 FastAdmin 默认安装 SQL：

```text
application/admin/command/Install/fastadmin.sql
```

可以使用 ThinkPHP 命令行安装 FastAdmin 基础表：

```bash
php think install --hostname=127.0.0.1 --database=qinyunbs --username=root --password=你的密码 --prefix=wx_
```

注意：当前仓库中的 `fastadmin.sql` 主要包含 FastAdmin 默认表，没有看到教师、乐器、预约、订单、评价、认证等业务表的建表 SQL。完整运行业务模块前，需要补齐以下业务表结构：

```text
teacher
yueqi
yuyue
dingdan
pingjia
renzheng
```

如果数据库表前缀为 `wx_`，实际表名通常为：

```text
wx_teacher
wx_yueqi
wx_yuyue
wx_dingdan
wx_pingjia
wx_renzheng
```

### 4. 配置 Web 根目录

Web 服务器根目录应指向：

```text
public/
```

入口文件：

- 前台入口：`public/index.php`
- 后台入口：`public/ykumajJvYx.php`

后台入口文件用于隐藏 `admin` 模块，生产环境不建议改成容易猜到的 `admin.php`。

### 5. 本地开发运行

可使用 ThinkPHP/PHP 内置服务器：

```bash
php think run
```

或：

```bash
php -S 127.0.0.1:8000 -t public public/router.php
```

访问地址示例：

```text
前台：http://127.0.0.1:8000/
后台：http://127.0.0.1:8000/ykumajJvYx.php
API：http://127.0.0.1:8000/api/index/index
```

## 常用命令

```bash
# 安装系统
php think install

# 生成 CRUD
php think crud

# 生成后台菜单
php think menu

# 生成 API 文档
php think api

# 插件相关命令
php think addon

# 静态资源压缩
php think min
```

可用命令注册在：

```text
application/command.php
```

## 主要业务文件

```text
application/admin/controller/Teacher.php
application/admin/controller/Yueqi.php
application/admin/controller/Yuyue.php
application/admin/controller/Dingdan.php
application/admin/controller/Pingjia.php
application/admin/controller/Renzheng.php

application/admin/model/Teacher.php
application/admin/model/Yueqi.php
application/admin/model/Yuyue.php
application/admin/model/Dingdan.php
application/admin/model/Pingjia.php
application/admin/model/Renzheng.php

public/assets/js/backend/teacher.js
public/assets/js/backend/yueqi.js
public/assets/js/backend/yuyue.js
public/assets/js/backend/dingdan.js
public/assets/js/backend/pingjia.js
public/assets/js/backend/renzheng.js
```

## 部署注意事项

- `runtime/`、`public/uploads/`、`public/template/` 需要有 Web 运行用户可写权限
- 生产环境应关闭调试模式，将 `app_debug` 设置为 `false`
- 后台入口文件名建议保持随机，不要改成 `admin.php`
- 如果入口提示跳转 `install.php`，请确认安装流程和安装入口文件是否完整；当前仓库文件树中未看到 `public/install.php`
- 业务模块依赖对应业务数据表，部署前请补齐业务表 SQL
- 当前仓库包含部分上传示例图片，如用于公开项目展示，建议确认是否需要清理隐私或测试素材

## License

本项目使用 Apache License 2.0。
