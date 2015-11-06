<?php
/**
 * Observe-观察者
 */

/**
 * 观察者
 */
interface Observer
{
    /**
     * 观察者动作
     */
    public function handle();
}

/**
 * 被观察
 */
interface Subject
{
    /**
     * 增加观察者
     * @param  array    $observer 观察者们
     * @return Subject            被观察者
     */
    public function attach($observer);

    /**
     * 移除观察者
     * @param  integer $index 观察者索引
     * @return null
     */
    public function detach($index);

    /**
     * 执行观察者行为
     * @return null
     */
    public function notify();
}

/**
 * 登陆
 */
class Login implements Subject
{
    /**
     * 观察者们
     * @var array
     */
    private $observers;

    /**
     * 增加观察者们
     * @param  array    $observer 观察者们
     * @return null
     */
    protected function addObserversArray($observer)
    {
        foreach ($observer as $key => $tempObserver) {
            if (!$tempObserver instanceof Observer) {
                throw new Exception("invalid observer type!");
            }
            $this->observers[] = $tempObserver;
        }
        return $this;
    }

    /**
     * 增加观察者
     * @param  array    $observer 观察者们
     * @return Subject            被观察者
     */
    public function attach($observer)
    {
        if (is_array($observer)) {
            $this->addObserversArray($observer);
            return $this;
        }
        $this->observers[] = $observer;
        return $this;
    }

    /**
     * 移除观察者
     * @param  integer $index 观察者索引
     * @return null
     */
    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    /**
     * 执行观察者行为
     * @return null
     */
    public function notify()
    {
        foreach ($this->observers as $key => $observer) {
            $observer->handle();
        }
    }

    /**
     * 进行登录
     * @return null
     */
    public function doLogin()
    {
        $this->notify();
    }
}

/**
 * 登陆后发邮件
 */
class LoginAndEmail implements Observer
{
    /**
     * 观察者动作
     */
    public function handle()
    {
        var_dump("login and emailing...");
    }
}

/**
 * 登陆后推送信息
 */
class LoginAndNotify implements Observer
{
    /**
     * 观察者动作
     */
    public function handle()
    {
        var_dump("login and notifying...");
    }
}

$login = new Login;
$email = new LoginAndEmail;
$notify = new LoginAndNotify;
$login->attach([
    $email,
    $notify,
]);
$login->doLogin();
