<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | 以下の言語行はバリデタークラスにより使用されるデフォルトのエラー
    | メッセージです。サイズルールのようにいくつかのバリデーションを
    | 持っているものもあります。メッセージはご自由に調整してください。
    |
    */

    'active_url' => ':attributeが有効なURLではありません',
    'after' => '予約は明日以降の日付にしてください',
    'current_password' => 'パスワードが正しくありません',
    'email' => ':attributeには、有効なメールアドレスを指定してください',
    'max' => [
        'numeric' => ':attributeには、:max以下の数字を指定してください',
        'string' => ':attributeは:max文字以下で入力してください',
        'array' => ':attributeは:max個以下指定してください',
    ],
    'min' => [
        'numeric' => ':attributeには、:min以上の数字を指定してください',
        'string' => ':attributeは、:min文字以上で指定してください',
        'array' => ':attributeは:min個以上指定してください',
    ],
    'password' => '正しいパスワードを指定してください',
    'required' => ':attributeは必ず入力してください',
    'string' => ':attributeは文字列を指定してください',
    'unique' => ':attributeは既に存在しています',

    /*
    |--------------------------------------------------------------------------
    | Custom バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | "属性.ルール"の規約でキーを指定することでカスタムバリデーション
    | メッセージを定義できます。指定した属性ルールに対する特定の
    | カスタム言語行を手早く指定できます。
    |
    */

    'custom' => [
        'time' => ['required' => '時間を選択してください'],
        'number' => ['required' => '人数を選択してください'],
        'day' => [
            'required' => '日にちを選択してください',
            'after:today' => '予約は明日以降にしてください',
            'date' => '日付型で入力してください',
        ],
        'star' => ['required' => '星は1つ以上選択してください'],
        'reserve_id' => [
            'unique' => '既に評価しています',
            'after:today' => '評価は明日以降にしてください',
        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性名
    |--------------------------------------------------------------------------
    |
    | 以下の言語行は、例えば"email"の代わりに「メールアドレス」のように、
    | 読み手にフレンドリーな表現でプレースホルダーを置き換えるために指定する
    | 言語行です。これはメッセージをよりきれいに表示するために役に立ちます。
    |
    */

    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'day' => '今日',
        'time' => '時間',
        'number' => '人数',
        'comment' => 'コメント',
        'star' => '星',
        'reserve_id' => '予約履歴',
    ],


];
