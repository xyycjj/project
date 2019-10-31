<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'Home'],function (){
    Route::group(['prefix'=>'/Index'],function(){
    Route::get('/register','IndexController@indexregister');
    Route::post('/registerAction','IndexController@registerAction');
    });
});
Route::group(['prefix'=>'/animal'],function (){
    Route::get('/dog','DogController@add');
    Route::post('/mat','MatController@add');
});
Route::group(['prefix'=>'/Product'],function (){
    Route::get('/check','ProductController@check');
    Route::get('/product','ProductController@add');
});
Route::post('/ajaxAction','AjaxController@ajax');
//上面是无用代码


//后台
Route::group(['prefix'=>'Admin'],function (){
    //后台首页(蒋磊磊)
    Route::group(['prefix'=>'/Index'],function (){
        Route::get('/index',['uses'=>'Admin\IndexController@index']);
        //头部
        Route::get('/top',['uses'=>'Admin\IndexController@top']);
        //左侧
        Route::get('/left',['uses'=>'Admin\IndexController@left']);
        //右侧主体
        Route::get('/main',['uses'=>'Admin\IndexController@main']);
        //尾部
        Route::get('/footer',['uses'=>'Admin\IndexController@footer']);
        //登录页面
        Route::get('/login',['uses'=>'Admin\IndexController@login']);
    });
    //会员管理（陈建均）
    Route::group(['prefix'=>'/Member'],function (){
        //会员列表
        Route::any('/Mlist',['uses'=>'Admin\MemberController@listAdd']);
        //会员列表单独删除
        Route::get('/Mmove',['uses'=>'Admin\MemberController@Mmove']);
        //会员编辑界面
        Route::get('/Medit',['uses'=>'Admin\MemberController@Medit']);
        //会员编辑
        Route::get('/MeditAdd',['uses'=>'Admin\MemberController@MeditAdd']);
        //会员添加中会员查询
        Route::any('/Madd',['uses'=>'Admin\MemberController@Madd']);
        //会员添加中会员添加
        Route::get('/MaddLookAdd',['uses'=>'Admin\MemberController@MaddLookAdd']);
        //会员列表全部删除
        Route::get('/Malldel',['uses'=>'Admin\MemberController@Malldel']);
    });
    Route::group(['prefix'=>'/Cart'],function (){
        //订单列表
        Route::any('/CList',['uses'=>'Admin\CartController@CList']);
        //订单列表单独删除
        Route::get('/Cmove',['uses'=>'Admin\CartController@Cmove']);
//        //订单编辑界面
//        Route::get('/Cedit',['uses'=>'Admin\CartController@Cedit']);
        //订单编辑
        Route::post('/CeditAdd',['uses'=>'Admin\CartController@CeditAdd']);
        //订单列表全部删除
        Route::get('/Calldel',['uses'=>'Admin\CartController@Calldel']);
        //订单编辑界面
        Route::get('/Cedit',['uses'=>'Admin\CartController@Cedit']);
    });
});
//qq第三方登录和短信验证和邮箱发送（陈建均）
Route::group(['prefix'=>'/Index'],function (){
    //登录或是注册界面
    Route::get('/qqactive',['uses'=>'QQlogin\ActiveController@qqactive']);
    //qq登录处理，拿到OpenID
    Route::get('/callback',['uses'=>'QQlogin\ActiveController@callback']);
    //短信验证界面
    Route::get('/mail',['uses'=>'Admin\MailController@mails']);
    //短信验证处理，验证，保存session
    Route::any('/manger',['uses'=>'Admin\MailController@sendSms']);
    //邮箱发送界面
    Route::get('/email',['uses'=>'QQlogin\EmailController@email']);
    //邮箱发送处理
    Route::post('/emailSend',['uses'=>'QQlogin\EmailController@send']);
    //用户点击激活时获取code
    Route::any('/activeMember',['uses'=>'QQlogin\EmailController@activeMember']);
});
//(刘兵)
//商品首页 lb
use function foo\func;
Route::get('/',['uses'=>'Home\IndexController@index']);
//前台
Route::group(['prefix'=>'Home'],function (){
    //主页
    Route::group(['prefix'=>'Index'],function (){
        //首页(赵海东开始)
//        Route::get('/index', ['uses' => 'Home\IndexController@index']);
        //登录
        Route::get('/login', ['uses' => 'Home\IndexController@login']);
        //验证登录
        Route::post('/loginAction', ['uses' => 'Home\IndexController@loginAction']);
        Route::get('/captcha', ['uses' => 'Home\IndexController@captchae']);
        //生成验证码
        Route::get('/add', ['uses' => 'Home\IndexController@add']);
        //商家登录
        Route::get('/storeLogin',['uses'=>'Home\IndexController@storeLogin']);
    //(赵海东结束)
        //注册
        Route::get('/register',['uses'=>'Home\Index\RegisterController@register']);
        Route::get('/sendSms',['uses'=>'Home\Index\RegisterController@sendSms']);
        //生成验证码
        Route::get('/code',['uses'=>'Home\Index\RegisterController@code']);
        //检验验证码
        Route::any('/checkCode',['uses'=>'Home\Index\RegisterController@checkCode']);
        //检测用户是否已存在
        Route::any('/checkName',['uses'=>'Home\Index\RegisterController@checkName']);
        //注册用户
        Route::any('/reAction',['uses'=>'Home\Index\RegisterController@reAction']);
        //忘记密码界面
        Route::get('/forgetpass',['uses'=>'Home\Index\RegisterController@forgetpass']);
        //手机验证处理
        Route::get('/phonepass',['uses'=>'Home\Index\RegisterController@phonepass']);
        //密保答案验证
        Route::get('/answer',['uses'=>'Home\Index\RegisterController@answer']);
        //验证验证码
        Route::get('/phonecode',['uses'=>'Home\Index\RegisterController@phonecode']);
        //重置密码
        Route::get('/repass',['uses'=>'Home\Index\RegisterController@repass']);
        //邮箱找回界面
        Route::get('/emailpass',['uses'=>'Home\Index\RegisterController@emailpass']);
    });
    //用户组
    Route::group(['prefix'=>'User'],function (){
        //账户余额---我的小充
        Route::get('/balance',['uses'=>'Home\User\UserController@balance']);
        //产品预定
        Route::get('/newGoods',['uses'=>'Home\User\UserController@newGoods']);
        //我的订单
        Route::get('/myOrder',['uses'=>'Home\User\UserController@myOrder']);
        //我的订单定向查询
        Route::get('/myOrderselect',['uses'=>'Home\User\UserController@myOrderselect']);
        //我的订单单个删除
        Route::get('/myOrderonlydel',['uses'=>'Home\User\UserController@myOrderonlydel']);
        //我的订单批量删除
        Route::get('/myOrderdel',['uses'=>'Home\User\UserController@myOrderdel']);
        //我的分销
        Route::get('/mySale',['uses'=>'Home\User\UserController@mySale']);
        //分销详情
        Route::get('/saleDetail',['uses'=>'Home\User\UserController@saleDetail']);
        //收货地址列表
        Route::get('/addlist',['uses'=>'Home\User\UserController@addlist']);
        //收货地址
        Route::get('/profile',['uses'=>'Home\User\UserController@profile']);
        //收货地址删除
        Route::get('/adddel',['uses'=>'Home\User\UserController@adddel']);
        //用户传过来的地址
        Route::get('/userprofile',['uses'=>'Home\User\UserController@userprofile']);
        //消费记录
        Route::get('/cost',['uses'=>'Home\User\UserController@cost']);
        //用户信息
        Route::get('/',['userinfo'=>'Home\User\UserController@userinfo']);
        //购物车
        Route::get('/cat',['uses'=>'Home\User\UserController@cat']);
        //申请提现
        Route::get('/withdraw',['uses'=>'Home\User\UserController@withdraw']);
    });
    //消息中心
    Route::group(['prefix'=>'Information'],function (){
        Route::get('/information',['uses'=>'Home\Information\InformationController@information']);
    });
    //前台公共引入
    Route::group(['prefix'=>'Common'],function (){
        //头部
        Route::get('/header',['uses'=>'Home\Common\CommonController@header']);
        //脚部
        Route::get('/footer',['uses'=>'Home\Common\CommonController@footer']);
        Route::group(['prefix'=>'User'],function(){
            Route::get('header',['uses'=>'Home\Common\User\UserController@header']);
        });
        Route::group(['prefix'=>'Goods'],function(){
            Route::get('header',['uses'=>'Home\Common\Goods\GoodsController@header']);
        });
    });
    //商品管理
    Route::group(['prefix'=>'Goods'],function(){
        //商品列表
        Route::get('/goodsList',['uses'=>'Home\GoodsController@goodsList']);
        Route::get('/goodsListAction',['uses'=>'Home\GoodsController@goodsListAction']);
        Route::get('/goodsClass/{tid}',['uses'=>'Home\GoodsController@goodsClass']);
       //产品详情
        Route::get('/goodsDetails',['uses'=>'Home\GoodsController@goodsDetails']);
        //产品详情中的评价
        Route::post('/appraise',['uses'=>'Home\GoodsController@appraise']);
        //购物车
        Route::get('/cart',['uses'=>'Home\GoodsController@cart']);
        //添加购物车/
        Route::any('/cartAdd',['uses'=>'Home\GoodsController@cartAdd']);
        //添加收藏
        Route::get('/collectAdd',['uses'=>'Home\GoodsController@collectAdd']);
        //商品专区
        Route::get('/oem',['uses'=>'Home\Goods\GoodsController@oem']);
        //发布商品
        Route::get('/postTrade',['uses'=>'Home\Goods\GoodsController@postTrade']);
        //评价管理
        Route::get('/feedback',['uses'=>'Home\Goods\GoodsController@feedback']);
        //店铺专区
        Route::get('/storeZone',['uses'=>'Home\Goods\GoodsController@storeZone']);
        //添加店铺
        Route::get('/addStore',['uses'=>'Home\Goods\GoodsController@addStore']);
        //订单专区
        Route::get('/orderZone',['uses'=>'Home\Goods\GoodsController@orderZone']);
        //发货管理
        Route::get('/shipment',['uses'=>'Home\Goods\GoodsController@shipment']);
        //运费模板
        Route::get('/freight',['uses'=>'Home\Goods\GoodsController@freight']);
        //收款账户
        Route::get('/yollon',['uses'=>'Home\Goods\GoodsController@yollon']);
        //我的报表
        Route::get('/reportss',['uses'=>'Home\Goods\GoodsController@reportss']);
    });
    //首页产品列表,预售列表......
    Route::group(['prefix'=>'Product'],function(){
        //商品分类
        Route::get('/goodsSort',['uses'=>'Home\Product\ProductController@goodsSort']);
        //产品列表
        Route::get('/goodsList',['uses'=>'Home\Product\ProductController@goodsList']);
        //产品详情
        Route::get('/goodsDetail',['uses'=>'Home\Product\ProductController@goodsDetail']);
        //预售产品
        Route::get('/presell',['uses'=>'Home\Product\ProductController@presell']);
        //预售详情
        Route::get('/presellDetail',['uses'=>'Home\Product\ProductController@presellDetail']);
        //半小时
        Route::get('/halfhour',['uses'=>'Home\Product\ProductController@halfhour']);
        //购物车
        Route::get('/cart',['uses'=>'Home\Product\ProductController@cart']);
        //购物车单选
        Route::get('/cartdelg',['uses'=>'Home\Product\ProductController@cartdelg']);
        //购物车批量删除
        Route::get('/cartdelall',['uses'=>'Home\Product\ProductController@cartdelall']);
        //购物车数量增加
        Route::get('/cartadd',['uses'=>'Home\Product\ProductController@cartadd']);
        //购物车数量减少
        Route::get('/cartdel',['uses'=>'Home\Product\ProductController@cartdel']);
        //购物车订单提交
        Route::get('/cartbuy',['uses'=>'Home\Product\ProductController@cartbuy']);
    });
});










Route::get('/laravel',['uses'=>'LaravelController@laravel']);
Route::get('/connect',['uses'=>'LaravelController@connect']);
