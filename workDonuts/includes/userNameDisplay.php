<div class="space userName">
    <?php
        // ゲストorユーザー名表示
        if (isset($_SESSION['customers'])) {
            echo '<p>ようこそ　', htmlspecialchars($_SESSION['customers']['name'], ENT_QUOTES, 'UTF-8'), '　様</p>';
        } else {
            echo '<p>ようこそ　ゲスト様</p>';
        };
    ?>
</div>