<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $menuItems;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menuItems = [
            [
                'label' => '学习',
                'subMenu' => [
                    ['image' => '/images/minicourse.png', 'title' => '微课程', 'subtitle' => '通过微课程开始你的区块链开发者职业生涯', 'link' => '/minis'],
                    ['image' => '/images/minicourse.png', 'title' => '普通课程', 'subtitle' => '深入研究特定主题以促进你的职业发展', 'link' => '#'],
                    ['image' => '/images/minicourse.png', 'title' => '学位课程', 'subtitle' => '按照一个结构化的路径来为成功做好准备', 'link' => '#'],
                ]
            ],
            [
                'label' => '社区',
                'subMenu' => [
                    ['image' => '/images/minicourse.png', 'title' => 'Telegram', 'subtitle' => '加入社区 Telegram 获取帮助并与其他学生聊天', 'link' => '#'],
                ]
            ],
            [
                'label' => '资源',
                'subMenu' => [
                    ['image' => '/images/minicourse.png', 'title' => '水龙头', 'subtitle' => '获得免费的测试网代币空投到您的钱包以快速构建', 'link' => '#']
                ]
            ]                        
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu');
    }
}
