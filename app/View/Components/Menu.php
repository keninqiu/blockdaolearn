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
        $courseCategories = CategoryRepository::getAllByType('course');
        $courseCategoryMenu = array_map(function($n) {
            return [
                'image' => '',
                'title' => $n->title,
                'subtitle' => '',
                'link' => '/courses/' . $n->slug
            ];
        }, $courseCategories->all());

        $postCategories = CategoryRepository::getAllByType('post');
        $postCategoryMenu = array_map(function($n) {
            return [
                'image' => '',
                'title' => $n->title,
                'subtitle' => '',
                'link' => '/posts/' . $n->slug
            ];
        }, $postCategories->all());

        $this->menuItems = [
            [
                'label' => '学习',
                'subMenu' => $courseCategoryMenu
            ],
            [
                'label' => '新闻',
                'subMenu' => $postCategoryMenu
            ],            
            [
                'label' => '社区',
                'subMenu' => [
                    ['image' => '/images/telegram.png', 'title' => 'Telegram', 'subtitle' => '加入社区 Telegram 获取帮助并与其他学生聊天', 'link' => '/telegram'],
                    ['image' => '/images/youtube.png', 'title' => 'Youtube', 'subtitle' => '加入社区 Youtube 频道获取更多视频', 'link' => '/youtube'],
                ]
            ],
            [
                'label' => '资源',
                'subMenu' => [
                    ['image' => '/images/faucet.jpg', 'title' => '测试网水龙头', 'subtitle' => '获得免费的测试网代币空投到您的钱包以快速构建', 'link' => '/faucets']
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
