<!DOCTYPE html>
<html lang="ja">
<!-- topページならばwebsite それ以外ならarticleを返す-->
<?php $attribute = (is_home() || is_front_page()) ? 'website' : 'article'; ?> 
<!-- ogpを使用することのの宣言を条件分岐で記述 -->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo $attribute; ?>: http://ogp.me/ns/<?php echo $attribute; ?>#">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="プラグイン無しでogpのmetaタグを挿入するものです" />
  <?php wp_head();?>
</head>