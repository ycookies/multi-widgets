<?php

namespace Dcat\Admin\MultiWidgets\Http\Controllers;

use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\MultiWidgets\Widgets\CoverCard;
use Dcat\Admin\MultiWidgets\Widgets\Functional;
use Dcat\Admin\MultiWidgets\Widgets\MediaList;
use Dcat\Admin\MultiWidgets\Widgets\PricingCard;
use Dcat\Admin\MultiWidgets\Widgets\Timeline;
use Dcat\Admin\MultiWidgets\Widgets\Linkbox;
use Dcat\Admin\MultiWidgets\Widgets\Carousel;
use Dcat\Admin\MultiWidgets\Widgets\Collapse;
use Dcat\Admin\MultiWidgets\Widgets\CardWidget;
use Dcat\Admin\MultiWidgets\Widgets\Remark;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\MultiWidgets\Widgets\GoodsCard;
use Dcat\Admin\MultiWidgets\Widgets\Specialities;
use Illuminate\Routing\Controller;


class MultiWidgetsController extends Controller {
    public function index(Content $content) {
        Admin::style(<<<CSS
    .card-box-title {
        font-size: 1.3rem;
        font-weight: bold;
    }
CSS            );

        return $content
            ->title('页面组件示例演示')
            ->description('直观感受 快速使用')
            ->row(Card::make('CardWidget 页面组件', $this->cardWidget())->withHeaderBorder())
            ->row(Card::make('CoverCard 页面组件', $this->coverCard())->withHeaderBorder())
            ->row(Card::make('列表折叠 页面组件', $this->collapse())->withHeaderBorder())
            ->row(Card::make('轮播图 页面组件', $this->carousel())->withHeaderBorder())
            ->row(Card::make('linkbox 页面组件', $this->linkBox())->withHeaderBorder())
            ->row(Card::make('媒体列表 页面组件', $this->mediaList())->withHeaderBorder())
            ->row(Card::make('订价卡 页面组件', $this->pricingCard())->withHeaderBorder())
            ->row(Card::make('时间轴 页面组件', $this->timeline())->withHeaderBorder())
            ->row(Card::make('Functional 页面组件', $this->functional())->withHeaderBorder())
            ->row(Card::make('Remark 页面组件', $this->wei_popover())->withHeaderBorder())
            ->row(Card::make('goods_card 页面组件', $this->goods_card())->withHeaderBorder())
            ->row(Card::make('specialities 页面组件', $this->specialities())->withHeaderBorder());

        //->row($functional);
    }

    // functional
    public function functional() {
        $functional = Functional::make()->boxcolor();
        $conents    = <<<HTML
<div class="description-item"><span class="bold">多视角路线图：</span>列表化管理工单，支持工单与客户关联、自定义工单类型
                                    </div>
                                    <div class="description-item"><span class="bold">关联客户需求：</span>建立工单池，产品经理可将工单判定为需求或缺陷
                                    </div>
                                    <div class="description-item"><span class="bold">路线图实时同步：</span>整合工单需求与产品规划需求于一处，构建清晰且统一的需求池
                                    </div>
HTML;

        $functional->add('以客户为中心的产品路线图', $conents, 'https://jikeadmin.saishiyun.net/img/requirements-clean.4929604.svg')
            ->bgcolor('#ffffff')
            ->round()
            ->shadow()
            ->btn('免费试用', 'https://jikeadmin.saishiyun.net/admin');

        $conent2 = <<<HTML
<div class="description-item"><span class="bold">工单管理：</span>列表化管理工单，支持工单与客户关联、自定义工单类型
                                    </div>
                                    <div class="description-item"><span class="bold">工单清洗：</span>建立工单池，产品经理可将工单判定为需求或缺陷
                                    </div>
                                    <div class="description-item"><span class="bold">需求汇总：</span>整合工单需求与产品规划需求于一处，构建清晰且统一的需求池
                                    </div>
                                    <div class="description-item"><span class="bold">需求管理：</span>对需求进行富化、清洗、归档等，支持需求与客户、与工单关联
                                    </div>
HTML;

        $functional->add('工单及需求清洗', $conent2, 'https://jikeadmin.saishiyun.net/img/requirements-clean.4929604.svg')
            ->bgcolor('#FFFFFF')
            ->btn('立即体验', 'https://jikeadmin.saishiyun.net/admin')
            ->round()
            ->shadow()
            ->rsort();

        return $functional->render();
    }

    // 定价卡
    public function pricingCard() {
        $pricing_card  = PricingCard::make()->columns(3)->isCenter();
        $user_id       = Admin::user()->id;
        $paysurlqrcode = 'https://cgai.saishiyun.net/wxpay/?price_code=squThzt4vP&user_code=' . urlencode(base64_encode($user_id));

        $urls = 'https://modstart.saishiyun.net/api/aigc_tools/getVerPayQrcode?pay_url_qrcode=' . urlencode($paysurlqrcode);
        $pricing_card->btnClick($urls); // 点击事件 获取支付二维码

        $pricing_card->add('免费', '0')
            ->li(['常用功能-12' => true, '常用功能-13' => false, '常用功能-14' => false, '常用功能-15' => false, '常用功能-16' => false])
            ->head('3人坐席');

        $pricing_card->add('会员版', 89)
            ->li(['常用功能-12' => true, '常用功能-13' => true, '常用功能-14' => false, '常用功能-15' => false, '常用功能-16' => false])
            ->head('10人坐席')
            ->footer("<span class='text-danger'>超级优惠，快速订阅</span>")
            ->active()
            ->btnTxt('订购 (超优惠)');

        $pricing_card->add('企业版', 289)
            ->li(['常用功能-12' => true, '常用功能-13' => true, '常用功能-14' => true, '常用功能-15' => true, '常用功能-16' => false])
            ->head('100人坐席');

        $pricing_card->add('专业版', 589)
            ->li(['常用功能-12' => true, '常用功能-13' => true, '常用功能-14' => true, '常用功能-15' => true, '常用功能-16' => true])
            ->head('1000人坐席');
        return $pricing_card->render();
    }

    // 时间轴
    public function timeline() {
        $datalist = [
            [
                'title'    => 'v2.2.2-beta',
                'content'  => '修复 Grid 表格当字段值为0时无法显示问题',
                'time'     => '09:34',
                'date_label' => '2022-06-27',
                'link'     => '',
            ],
            [
                //'time_label' => '2024.07.02',

                'title'   => 'v2.2.0-beta',
                'content' => "新增功能: <br/>1.增加对Laravel9.x版本的支持 <br/>2.支持在hasMany以及array表单中使用table表单",
                'time'     => '08:32',
                'date_label' => '2022-02-22',
                'link'    => '',
            ]
        ];
        $timeline = Timeline::make()->startDate('2022-09-27')->endDate('2020-10-20');
        foreach ($datalist as $key => $items) {
            $timeline->add( $items['title'], $items['content'],$items['time'],$items['date_label']);
        }
        return $timeline->render();
    }

    // 媒体列表
    public function mediaList() {
        $media_list = MediaList::make()->imgCenter(true)->imgMaxWidth('200px')->rowNum(4);
        $datalist   = [
            [
                'title'     => '拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成',
                'content'   => '拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成.拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成.拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成.拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成.拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成.拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一单十人助成',
                'media_img' => 'https://g-search3.alicdn.com/img/bao/uploaded/i4/i1/1698300612/O1CN01AXcDdy1GOLBapFKgQ_!!1698300612.jpg_460x460q90.jpg',
                'link'      => 'https://item.taobao.com/item.htm?spm=a21n57.1.item.3.292d3296QUdish&priceTId=2147803217198867233631501e8b91&utparam=%7B%22aplus_abtest%22:%22d7258a6c6dd5973cd59f4666ad9d216a%22%7D&id=809526386726&ns=1&abbucket=12',
            ],
            [
                'title'     => '一分钱壁纸0.01元自动发货养号秒发秒评手机图片可爱萌萌哒壁纸',
                'content'   => '一分钱壁纸0.01元自动发货养号秒发秒评手机图片可爱萌萌哒壁纸一分钱壁纸0.01元自动发货养号秒发秒评手机图片可爱萌萌哒壁纸一分钱壁纸0.01元自动发货养号秒发秒评手机图片可爱萌萌哒壁纸一分钱壁纸0.01元自动发货养号秒发秒评手机图片可爱萌萌哒壁纸',
                'media_img' => 'https://g-search1.alicdn.com/img/bao/uploaded/i4/i1/2217906880198/O1CN01SLfRkR1DKjOBs05sx_!!2217906880198.jpg_460x460q90.jpg',
                'link'      => '',
            ]
        ];
        foreach ($datalist as $key => $items) {
            $media_list->add($items['title'], $items['content'], $items['media_img'], $items['link']);
        }

        return $media_list->render();
    }
    public function linkBox(){
        $link_group = [
            [
                'icon'      => 'feather icon-chevrons-down',
                'title'     => 'Collapse',
                'sub_title' => '列表信息折叠',
                'link'      => '#',
                'bg_value'  => 'bg-info',
                'hot'       => false,
            ], [
                'icon'      => 'fa fa-fw fa-th-list',
                'title'     => 'List-group',
                'sub_title' => '列表组',
                'link'      => '#',
                'bg_value'  => 'bg-success',
                'hot'       => false,
            ], [
                'icon'      => 'feather icon-shield',
                'title'     => 'Btn-group',
                'sub_title' => '按钮组',
                'link'      => '#',
                'bg_value'  => 'bg-warning',
                'hot'       => false,
            ], [
                'icon'      => 'feather icon-film',
                'title'     => 'Media-list',
                'sub_title' => '媒体列表',
                'link'      => '#',
                'bg_value'  => 'bg-danger',
                'hot'       => true,
            ]
        ];

        $linkbox = new Linkbox();
        $linkbox->groupTitle('新增组件 <span class="text-danger f14">('.count($link_group).' 种)</span>');
        //$linkbox->target('_blank');

        foreach ($link_group as $key => $itemk) {
            $linkbox->add($itemk['icon'], $itemk['title'], $itemk['sub_title'], $itemk['link'], $itemk['bg_value'])->hot($itemk['hot']);
        }

        return $linkbox->render();
    }

    // 轮播图
    public function carousel(){
        $carousel = Carousel::make();
        $datalist   = [
            [
                'img_src' => 'https://rails365.oss-cn-shenzhen.aliyuncs.com/uploads/slide/image/3/2021/9f98b4ccd2643b22ea9cd67829b934e7.png',
                'title'     => '拼多多助新老用户力瓶多多砍',
                'content'   => '多多砍一刀xi推金币现金大转盘一单十人助成拼多多助新老用户力瓶多多砍一刀xi推金币现金大转盘一',
                'link'      => 'https://item.taobao.com/item.htm?spm=a21n57.1.item.3.292d3296QUdish&priceTId=2147803217198867233631501e8b91&utparam=%7B%22aplus_abtest%22:%22d7258a6c6dd5973cd59f4666ad9d216a%22%7D&id=809526386726&ns=1&abbucket=12',
            ],
            [
                'img_src' => 'https://rails365.oss-cn-shenzhen.aliyuncs.com/uploads/slide/image/4/2021/007596a025ecf51207c13eda90d04508.png',
                'title'     => '自动发货养号秒发秒评手机图片可爱萌萌哒壁纸',
                'content'   => '可爱萌萌哒壁纸一分钱壁纸0.01元自动发货养号秒发秒评手机图片',
                'link'      => '',
            ]
        ];
        foreach ($datalist as $key => $items) {
            $carousel->add($items['img_src'],$items['title'], $items['content'], $items['link']);
        }

        return $carousel->render();
    }

    public function collapse(){
        $collapse = Collapse::make();
        $collapse->add('前端控制台 JS 报错？', "如果发现这个问题，绝大部分都是因为静态资源文件有问题引起的（比如升级步骤不正确），请先重新发布资源并清理浏览器缓存：<br/><code lang='php'>php artisan admin:publish --assets --force</code> <br/> 如果还是报错，请到此处进行反馈：wx:Q3664839");
        $collapse->add('如何设置语言为简体中文？', '打开配置文件 config/app.php，设置 locale 参数的值为 zh_CN');
        $collapse->add('Laravel7 时间显示为 UTC 格式', '这个是 Laravel7 升级后带来的坑，原因请参考日期序列化');
        $collapse->add('表单保存时报错 Array to string conversion', '出现这个问题是因为表单提交的值最后转换成了 array 类型，而 MySQL 是不支持直接存储 array 类型数据的，在 dcat-admin 中可以用以下方式对数据格式进行转换');
        $collapse->add('如何从 laravel-admin 迁移到 dcat-admin？', "<a href='https://learnku.com/articles/44235' target='_blank'>Dcat Admin 教程 - 如何从 Laravel admin 迁移到 dcat admin？</a>");
        return $collapse->render();
    }

    // 标图卡片
    public function coverCard(){
        $row  = new Row();
        $cover_card = CoverCard::make()->add('开源公众号', '关注公众号 随时了解更新动态')
            ->bg('https://dcat-plus.saishiyun.net/img/card-bg1.jpeg')->shadow('shadow-none')
            ->avatar('https://dcat-plus.saishiyun.net/img/wxgzh_qrcode.jpg');
        $cover_card1 = CoverCard::make()->add('赞助捐助开源', '鼓励作者持续更新')
            ->bg('https://dcat-plus.saishiyun.net/img/card-bg2.jpeg')->shadow('shadow-sm')
            ->avatar('https://dcat-plus.saishiyun.net/img/weixinpay.jpg');
        $cover_card2 = CoverCard::make()->add('开源公众号', '关注公众号 随时了解更新动态')
            ->bg('https://dcat-plus.saishiyun.net/img/card-bg1.jpeg')->shadow()
            ->avatar('https://dcat-plus.saishiyun.net/img/wxgzh_qrcode.jpg');
        $cover_card3 = CoverCard::make()->add('赞助捐助开源', '鼓励作者持续更新')
            ->bg('https://dcat-plus.saishiyun.net/img/card-bg2.jpeg')->shadow('shadow-lg')
            ->avatar('https://dcat-plus.saishiyun.net/img/weixinpay.jpg');

        $row->column(3, $cover_card->render());
        $row->column(3, $cover_card1->render());
        $row->column(3, $cover_card2->render());
        $row->column(3, $cover_card3->render());
        return $row;
    }

    // 卡片挂件
    public function cardWidget(){

        $user_widget = CardWidget::make()->boxStyle(1);
        $navItem = [
            [
                'name' => '项目',
                'num'=> 12,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '任务',
                'num'=> 8,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '产品',
                'num'=> 20,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '博客',
                'num'=> 345,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '头条',
                'num'=> 13,
                //'bg' => 'bg-info',
            ],
        ];
        $user_widget->add('杨光-退伍程序员','https://m.saishiyun.net/imgpic/work-photo.png','速码邦总设计师')->navItem($navItem);

        $navItem1 = [
            [
                'name' => '关注',
                'num'=> 32,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '粉丝',
                'num'=> 898,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '视频',
                'num'=> 35,
                //'bg' => 'bg-info',
            ],
        ];
        $user_widget1 = CardWidget::make()->boxStyle(2);
        $user_widget1->add('杨光-退伍程序员','https://m.saishiyun.net/imgpic/work-photo.png','速码邦总设计师')->navItem($navItem1);

        $navItem2 = [
            [
                'name' => '项目',
                'num'=> 12,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '任务',
                'num'=> 8,
                //'bg' => 'bg-info',
            ],
            [
                'name' => '产品',
                'num'=> 20,
                //'bg' => 'bg-info',
            ],
        ];
        $user_widget2 = CardWidget::make()->boxStyle(3);
        $user_widget2->add('杨光-退伍程序员','https://m.saishiyun.net/imgpic/work-photo.png','速码邦总设计师','https://jikeadmin.saishiyun.net/img/card-bg1.png')->navItem($navItem2);

        $row  = new Row();
        $row->column(4, $user_widget->render());
        $row->column(4, $user_widget1->render());
        $row->column(4, $user_widget2->render());
        return $row;
    }

    public function wei_popover(){
        $popover = Remark::make('这是一个提示','标题')->placement()->icon();
        return $popover->render();
    }

    public function goods_card(){
        $goods_card = GoodsCard::make('这是一个提示','标题');
        return $goods_card->render();
    }

    public function specialities(){
        $goods_card = Specialities::make('这是一个提示','标题');
        return $goods_card->render();
    }
}