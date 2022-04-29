<?php

return [
    // UnDeliverd画面で使う定数
    'Sex' => [
        '男性' => 0,
        '女性' => 1,
        'CONSTRUCTION' => 2,
    ],

    // ユーザ登録で使う定数
    'Skill' => [
        'EMPLOYEE' => 0,//社員
        'CUSTOMER' => 1,//顧客
    ],
    // 工程表で使う定数
    'PDFKbn' => [
        'CUSTOMER' => 0,
        'WORKER' => 1,
    ],
    // 定価非表示粗利率
    'ErrArari' => 25,
    // 工事登録モード
    'ConstructionMode' => [
        'EDIT' => 1,			//修正
        'REQUEST' => 2,			//依頼
        'HOLIDAY' => 6,		    //休み
        'REGIST' => 5,		    //承認
        'UNDECIDED' => 3,		//未決定
        'DECIDED' => 4,			//決定
    ],
    //ユーザーランク
    'UserRank' => [
    	'MASTER' => 0,
    	'USER' => 1,
    	'DISPLAY' => 2,
    	'DISABLED' => 3,
    ],
    //工事部部門コード
    'KoujiBumonCD' => '071',

    //お問い合わせのstatusカラム
    'CONTACT_STATUS' => [
        'FIRST_SEND' => 1,
        'ANSWERED' => 2,
        'REPLY_FROM_ADMIN' => 3,
    ],

    //配送ルート行数
    'RouteListRow' => 20,

    //案内情報の重要度
    'Information_Important' => [
        'NORMAL' => 0,//通常
        'IMPORTANT' => 1,//重要
        'VERY_IMPORTANT' => 2,//最重要
    ],
    //メニューのカテゴリの分類
    'Menu_Category' => [
        'LEFT_SIDE_NAVI_MENU' => 1,//左サイドナビメニュー
        'BUKKEN_TAB_MENU' => 2,//物件タブメニュー
        'ADMIN_MENU' => 3,//管理メニュー
        'PRICE_DISPLAY' => 4,//金額表示
        'HOME_TAB_MENU' => 5,//ホーム画面のタブメニュー
        'PROFILE_MENU' => 6,//プロフィールメニュー
        'DELIVERY_MENU' => 7,//物流メニュー
    ],
    //案内の権限
    'InformationPermission' => [
        'ALL_USER' => 0,//全て
        'ONLY_OFFICE_USER' => 1,//社員のみ
    ],
    //権限者一覧
    'Role' => [
        'システム管理者' => 1,//システム管理者
        '支社長' => 2,//支社長
        '支店長' => 3,//支店長
        '内勤' => 4,//内勤
        '営業' => 5,//営業
        '物流' => 6,//物流
        'BASIC(金額あり)' => 7,//BASIC(金額あり)
        'BASIC(金額なし)' => 8,//BASIC(金額なし)
        'STANDARD(金額あり)' => 9,//STANDARD(金額あり)
        'STANDARD(金額なし)' => 10,//STANDARD(金額なし)
        '工事' => 11,//工事
        '本社部門' => 12,//本社部門
    ],
    //現在のバージョン情報
    'Version' => [
        'NUMBER' => '1.0.2',//現在のバージョン情報
    ],
    //会社コード
    '会社コード' => [
        '三富' => 'E0',
        '北陸' => 'E1',
    ],
    //荒川支社長など特定ユーザーIDを持つ定数
    'IndividualId' => [
        '荒川支社長' => 63,
    ],

    '案内共有権限' => [
        '非公開' => null,
        '全て' => 0,
        '社内' => 1,
    ],
];
