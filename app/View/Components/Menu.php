<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Repositories\CategoryRepository;
class Menu extends Component
{
    public $menuItems;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $categories = CategoryRepository::getAllByType('course');
        $categoryMenu = array_map(function($n) {
            return [
                'image' => '',
                'title' => $n->title,
                'subtitle' => '',
                'link' => '/courses/' . $n->slug
            ];
        }, $categories->all());
        $this->menuItems = [
            [
                'label' => '学习',
                'subMenu' => $categoryMenu
            ],
            [
                'label' => '社区',
                'subMenu' => [
                    ['image' => '/images/minicourse.png', 'title' => 'Telegram', 'subtitle' => '加入社区 Telegram 获取帮助并与其他学生聊天', 'link' => '/telegram'],
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
