wp-theme-hairpin
================

Hairpin is my first wordpress theme which write for the website of my school of university

you can visit gjdj.jnu.edu.cn


HairpinV09主题各个文件解析：

1. index.php 首页，包括头部导航，各分类文章，以及footer。有get_header(),include('/sider.php'),主循环以及获取分类目录的函数wt_get_category_count

2. header.php 头部文件，包括DOCTYPE，导航，和顶部标志图片

3. search.php 输入内容搜索相关的文章并展示出来，页面包括文章题目，文章开头，日期，以及文章所属分类，加上一个阅读全文的按钮

4. slider.php 图片轮播文件：主循环

5. single.php 文章页面：文章正文，文章图片，评论模块，“上一篇”和“下一篇”，以及底部的footer

6. sidebar.php 侧边栏文件，目前没有使用

7. footer.php 底部文件，包含版权声明，地址，和管理员联系方式

8. page.php 未使用

9. archive.php 文章归档页，包含了头部，翻页功能，当前位置，文章列表，文章日期，文章分类，文章缩略和阅读全文的按钮，还有最后的footer

10. functions.php 函数功能文件，包含自定义的各个函数代码：注册侧边栏register_sidebar， 自定义菜单register_nav_menus， 获取缩略图catch_first_image， 标题文字截断cut_str， 获取并更新文章浏览次数getPostViews & setPostViews等

11. style.css 所有的css样式声明

12. gjdj.sql 数据建表文件

13. README.md 注释说明文件

