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
                    ['image' => '/images/minicourse.png', 'title' => '课程', 'subtitle' => '通过课程开始你的区块链开发者职业生涯', 'link' => '/courses'],
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
