# <p align="center">[Laravel Template](https://github.com/zhanbai/laravel-template)</p>

## 关于

Laravel 是一个全栈 Web 应用程序框架，具有富有表现力、优雅的语法。本项目旨在依托 Laravel 搭建最基础的、最通用的功能，方便快速开发一个新的项目。

- 接口遵循 RESTful 软件设计风格
- 默认 Accept 头设置返回响应格式
- 短信验证码功能
- 用户注册功能
- 用户登录功能
- JWT 令牌功能
- 命令生成 JWT 功能
- 获取用户信息功能
- 错误响应码功能

## 使用

```bash
# 克隆项目
$ git clone https://github.com/zhanbai/laravel-template.git project-name

# 进入项目目录
$ cd project-name

# 安装依赖
$ composer install

# 创建并修改 .env 文件内容，主要是数据库信息
$ cp .env.example .env

# 执行数据库迁移
$ php artisan migrate

# 启动服务
$ php artisan serve
```

浏览器访问 http://127.0.0.1:8000

## 协议

本项目开源，基于 [MIT 开源协议](https://opensource.org/licenses/MIT)。
