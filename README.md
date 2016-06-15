# laravel-设计模式

@(laravel)[设计模式|laravel框架准备知识]

# 运行时模式
------
## 1. 装饰器
> 调用方法`不change`，动态`change`方法执行内容
- [decorator.php][decorator.php]
- [decoratorBetter.php][decoratorBetter.php]

[decorator.php]:https://github.com/hackingangle/design-patterns/blob/master/decorator.php
[decoratorBetter.php]:https://github.com/hackingangle/design-patterns/blob/master/decoratorBetter.php

------
## 2. 观察者
> 对特定方法增加`观察者们`，当`特定方法`执行的时候，来自动调用`观察者们的`特定方法
- [obsever.php][obsever.php]

[obsever.php]:https://github.com/hackingangle/design-patterns/blob/master/observer.php

------
## 3. 适配器
> 存在类似功能的两个类，方法名称不同，可以通过`适配器类`作为桥梁，动态对所需方法进行替换，当然只需`替换对象`。
- [adapters.php][adapters.php]

[adapters.php]:https://github.com/hackingangle/design-patterns/blob/master/adapters.php

------
## 4. 模版
> 需要对特定的执行`进行固化`，适合匹配`流程比较固化`且`适配多种不同类别`，如：`API登录网站`、`抓取网页内容爬虫`...
- [template.php][template.php]

[template.php]:https://github.com/hackingangle/design-patterns/blob/master/template.php

# 创建模式

------
## 1. 简单工厂
- [simpleFactory][simpleFactory]

[simpleFactory]:https://github.com/hackingangle/design-patterns/blob/master/simpleFactory
