<?php
//ogpタグ挿入
function my_meta_ogp() {
  if (is_front_page() || is_home() || is_singular() || is_archive() || is_category()) {
    global $post;
    $ogp_title = '';
    $ogp_description = '';
    $ogp_url = '';
    $ogp_image = '';
    $insert = '';

    if (is_front_page() || is_home()) {//topページまたはインデックスページの場合
      $ogp_title = get_bloginfo('name');//ブログの名前を取得
      $ogp_description = get_bloginfo('description');//ブログのキャッチフレーズを取得
      $ogp_url = home_url();//ページのurlを取得
    } elseif (is_singular()) {//投稿ページか固定ページの場合
      setup_postdata($post);//投稿データをセットアップする
      $ogp_title = $post->post_title . ' | ' . get_bloginfo('name');//投稿のタイトルを取得
      $ogp_description = mb_substr(get_the_excerpt(), 0, 100);//現在の投稿の抜粋文を0文字目から100文字目まで取り出す
      $ogp_url = get_permalink();//現在のurlを取得
      wp_reset_postdata();//$postをリセット
    }
    else if(is_category()) {
    $current_category = get_queried_object(); // カテゴリーの情報を取得
    $ogp_title = single_cat_title('', false) . 'の記事一覧 | ' . get_bloginfo('name');
    $ogp_description = get_bloginfo('description');
    $ogp_url = get_category_link($current_category);
    }

    $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';//トップページorフロントページの場合はwebsite、そうでない場合はarticle

    if (is_singular() && has_post_thumbnail()) {//固定ページか投稿ページかつサムネイルがある場合
      $ps_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');//サムネイルのIDを取得して画像のURLと幅と高さを取得
      $ogp_image = $ps_thumbnail[0];//画像のURLを挿入
    } else {
      $ogp_image = 'サムネイルがない場合の画像のURL';
    }
    $insert .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
    $insert .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
    $insert .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
    $insert .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
    $insert .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP">' . "\n";
    $insert .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
    $insert .= '<meta property="twitter:description" content="' . esc_attr($ogp_description) . '">' . "\n";
    echo $insert;
  }
}

add_action('wp_head','my_meta_ogp');