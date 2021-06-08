<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員登録フォーム</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="contact.js"></script>
</head>

<body>
    <div>
        <h1>株式会社 G's ACADEMY-FUKUOKA-</h1>
    </div>
    <div>
        <h2>会員登録フォーム</h2>
    </div>
    <div>
        <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
            <fieldset>
                <h1 class="contact-title">会員登録 内容入力</h1>
                <p>会員登録内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
                <div>
                    <div>
                        <label>お名前<span>必須</span></label>
                        <input type="text" name="name" placeholder="例）山田太郎" value="">
                    </div>
                    <div>
                        <label>ふりがな<span>必須</span></label>
                        <input type="text" name="furigana" placeholder="例）やまだたろう" value="">
                    </div>
                    <div>
                        <label>メールアドレス<span>必須</span></label>
                        <input type="text" name="email" placeholder="例）guest@example.com" value="">
                    </div>
                    <div>
                        <label>電話番号<span>必須</span></label>
                        <input type="text" name="tel" placeholder="例）123456789" value="">
                    </div>
                    <div>
                        <label>性別<span>必須</span></label>
                        <input type="radio" name="sex" value="男性" checked> 男性
                        <input type="radio" name="sex" value="女性"> 女性
                    </div>
                    <div>
                        <label>好きな👟ブランド<span>必須</span></label>
                        <select name="item">
                            <option value="">項目を選択してください</option>
                            <option value="NIKE">NIKE</option>
                            <option value="addidas">addidas</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    <div>
                        <label>理由<span>必須</span></label>
                        <textarea name="content" rows="15" placeholder="内容を入力"></textarea>
                    </div>
                </div>
                <button type="submit">確認画面へ</button>
            </fieldset>
        </form>
    </div>
</body>

</html>